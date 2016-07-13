<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\File;
use Auth;
use Redirect;
use App\AddClasses;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Storage;

class ClassSiteController extends Controller
{
	
	
  public function studentProfileContent(Request $data) {
		date_default_timezone_set('Asia/Manila');
		$user = Auth::user();
		if($user->usertype_id == 1) {
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, status, section FROM class_offerings 
																			JOIN (SELECT class_id, status FROM classes_student WHERE user_id = $user->id) AS students 
																				USING(class_id)) AS class USING(subject_id)"));

		} else if($user->usertype_id == 2) {
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings 
																				JOIN (SELECT class_id, subject_id, section FROM class_offerings WHERE user_id = $user->id) AS class USING(subject_id)"));

		}  else if($user->usertype_id == 3) {
			//return Redirect::to('alumniProfile');
		}

		$file_name = DB::select(DB::raw("SELECT filename FROM users WHERE id = $user->id"));
		$file_type = DB::select(DB::raw("SELECT filetype FROM users WHERE id = $user->id"));
		$type = "filetype";
		$file = $file_name[0]->filename . "." . $file_type[0]->$type;
		if($file == "."){
			$file = "profilePic.png";
		}
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
		$classId = $_GET['class_id'];
		$nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));
		$data = array(
					'results' => $results,
					'name' => strtoupper($name),
					'nameUrl' => $nameUrl,
					'filename' => $file
		);
		$classDetails =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN class_offerings USING(subject_id) WHERE user_id=$user->id AND class_id=$classId"));
		$studentUploads = DB::select( DB::raw("SELECT class_files.filename, date_uploaded, firstname, lastname FROM class_files JOIN users USING(id) WHERE user_type=1 AND class_id=$classId ORDER BY date_uploaded DESC"));
		$facultyUploads;
		if($user->usertype_id==2) {
			$facultyUploads = DB::select( DB::raw("SELECT class_files.filename, date_uploaded, firstname, lastname FROM class_files JOIN users USING(id) WHERE user_type=2 AND users.id=$user->id AND class_id=$classId ORDER BY date_uploaded DESC"));
		} else if($user->usertype_id==1) {
			$facultyUploads = DB::select( DB::raw("SELECT class_files.filename, date_uploaded, firstname, lastname FROM class_files JOIN users USING(id) WHERE user_type=2 AND class_id=$classId ORDER BY date_uploaded DESC"));
		}
		
		//echo count($uploads);
		$data['classDetails'] = $classDetails;
		$data['studentUploads'] = $studentUploads;
		$data['facultyUploads'] = $facultyUploads;
		$data['classId'] = $classId;
		return $data;
	}
	
	public function getClassInfo(Request $data){
		
		date_default_timezone_set('Asia/Manila');
		$user = Auth::user();
		$classId = $_GET['class_id'];
		$classInfo;
		if($user->usertype_id == 1) {
			$classInfo =  DB::select( DB::raw("SELECT * FROM classes_student JOIN class_offerings USING(class_id) JOIN subject_offerings USING(subject_id) WHERE class_id = $classId"));	
		} else if($user->usertype_id == 2) {
			$classInfo =  DB::select( DB::raw("SELECT * FROM class_offerings JOIN subject_offerings USING(subject_id) WHERE class_id = $classId"));	
		}
		
		$announcements = DB::select(DB::raw("SELECT a.*, u.firstname, u.middlename, u.lastname, u.filename, u.filetype FROM announcements a JOIN users u ON u.id = a.user_id WHERE class_id = $classId ORDER BY a.created_at DESC"));
    $comments_array = array();
    $index=0;

		$comments = DB::select(DB::raw("SELECT * FROM comments c JOIN users u ON c.user_id = u.id"));
    $replies = DB::select(DB::raw("SELECT * FROM replies r JOIN users u ON r.user_id = u.id"));
		
		
		$data = $this->studentProfileContent($data);
		$data['classId'] = $classId;
		$data['classInfo'] = $classInfo;
		$data['announcements'] = $announcements;
		$data['comments'] = $comments;
		$data['replies'] = $replies;
		return $data;
	}
	
	public function viewClass(Request $data) {
		$user = Auth::user();
		$classId = $_GET['class_id'];
		$pending = 0; 
		$data = $this->getClassInfo($data);
		
		if($user->usertype_id == 1) {
			$student = DB::select(DB::raw("SELECT user_id FROM classes_student WHERE user_id = $user->id AND class_id = $classId"));
			if(count($student)==1) {
				return view('faculty.classSite', $data);	
			}
		}else if($user->usertype_id == 2) {
			$faculty =  DB::select(DB::raw("SELECT user_id FROM class_offerings WHERE user_id = $user->id AND class_id = $classId"));
			if(count($faculty) == 1) {
				$classRequests = DB::select( DB::raw("SELECT class_id FROM classes_student JOIN class_offerings USING(class_id) WHERE class_id = $classId AND status = $pending AND class_offerings.user_id = $user->id"));			
				$data['classRequests'] = $classRequests;
				return view('faculty.classSite', $data);
			}
		}
		return Redirect::to($data['nameUrl']);
		
	}
	
	public function viewRequest(Request $data) {
		$user = Auth::user();
		$classId = $data->input('class_id');
		$studentId = $data->input('studentId');
		if($data->input('accept') != null) {
			echo "hahaha";
			DB::update(DB::raw("UPDATE classes_student SET status=1 WHERE user_id = $studentId AND class_id = $classId"));
		} else if($data->input('decline') != null) {
			DB::delete(DB::raw("DELETE FROM classes_student WHERE user_id = $studentId AND class_id = $classId"));
		}
		
		$classRequests = DB::select(DB::raw("SELECT id, firstname, middlename, lastname, user_number FROM classes_student 
																						JOIN users ON user_id = id WHERE class_id = $classId AND status=0"));
		$data = $this->getClassInfo($data);
		$data['classRequests'] = $classRequests;
		return view('faculty.classRequests', $data);
	}
	
	public function comment(Request $data){
		
		date_default_timezone_set('Asia/Manila');
		$post_id = $data->input('post_id');
		$user_id = Auth::user()->id;
		$comment = $data->input('comment');
		
		DB::insert(DB::raw("INSERT INTO comments (post_id,user_id,content) VALUES ('$post_id','$user_id','$comment')"));
		return $this->viewClass($data);	
	}
	
 	public function reply(Request $data){
		
		date_default_timezone_set('Asia/Manila');
		$comment_id = $data->input('comment_id');
		$user_id = Auth::user()->id;
		$reply = $data->input('reply');
		$classId = $_GET['class_id'];
	
		DB::insert(DB::raw("INSERT INTO replies (comment_id,user_id,content) VALUES ('$comment_id','$user_id','$reply')"));
		return $this->viewClass($data);	
	}
	
	public function uploadFile(Request $data){
		$user = Auth::user();
		
    if($data->hasFile('file')){
      $file = $data->file('file');
      $fileName = $file->getClientOriginalName();
      $destinationPath = config('app.fileDestinationPath').'/'.$fileName;
      $class_id = $data->input('classId');
      $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

      if($uploaded){
        File::create([
        	'class_id'=> $class_id,
          'filename' => $fileName,
        	'id' => $user->id,
        	'user_type' => $user->usertype_id
        ]);
      }
    }

    $class_id = $data->input('classId');
    $_GET['class_id'] = $class_id;
		$data = $this->getClassInfo($data);	
    $data['classRequests'] = DB::select( DB::raw("SELECT class_id FROM classes_student JOIN class_offerings USING(class_id) WHERE class_id = $class_id AND status = 0 AND class_offerings.user_id = $user->id"));
    return view('faculty.classSite', $data);
  }

}
