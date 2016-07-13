<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;
use App\Http\Requests;

class FileUploadsController extends Controller
{
   	public function studentFileUploads() {
		$user = Auth::user();
		$classId = $_GET['class_id'];
		$results;
		if($user->usertype_id == 2) {
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, section FROM class_offerings WHERE user_id = $user->id) AS class USING(subject_id)"));
		} else if($user->usertype_id == 1) {
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, status, section FROM class_offerings 
																			JOIN (SELECT class_id, status FROM classes_student WHERE user_id = $user->id) AS students 
																				USING(class_id)) AS class USING(subject_id)"));
		}
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
		
		$nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));
		$data = array(
					'results' => $results,
					'name' => strtoupper($name),
					'nameUrl' => $nameUrl
		);
		$classId = $_GET['class_id'];
		//echo $classId;
		$classDetails =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN class_offerings USING(subject_id) WHERE user_id=$user->id AND class_id=$classId"));
		$uploads = DB::select( DB::raw("SELECT class_files.filename, date_uploaded, firstname, lastname FROM class_files JOIN users USING(id) WHERE user_type=1 AND class_id=$classId ORDER BY date_uploaded DESC"));
		//echo count($uploads);
		$data['classDetails'] = $classDetails;
		$data['uploads'] = $uploads;
		$data['classId'] = $classId;
		return view('faculty.fileUploadsFromStudents', $data);
	}
	public function facultyFileUploads() {
		$user = Auth::user();
		$classId = $_GET['class_id'];
		if($user->usertype_id == 2) {
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, section FROM class_offerings WHERE user_id = $user->id) AS class USING(subject_id)"));
		} else if($user->usertype_id == 1) {
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, status, section FROM class_offerings 
																			JOIN (SELECT class_id, status FROM classes_student WHERE user_id = $user->id) AS students 
																				USING(class_id)) AS class USING(subject_id)"));
		}
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
		
		$nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));
		$data = array(
					'results' => $results,
					'name' => strtoupper($name),
					'nameUrl' => $nameUrl
		);
		$classId = $_GET['class_id'];
		//echo $classId;
			$classDetails =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN class_offerings USING(subject_id) WHERE class_id=$classId"));
	
		$uploads = DB::select( DB::raw("SELECT class_files.filename, date_uploaded, firstname, lastname FROM class_files JOIN users USING(id) WHERE user_type=2 AND class_id=$classId ORDER BY date_uploaded DESC"));
		//echo count($uploads);
		$data['classDetails'] = $classDetails;
		$data['uploads'] = $uploads;
		$data['classId'] = $classId;
		return view('faculty.myFileUploads', $data);
	}
}
