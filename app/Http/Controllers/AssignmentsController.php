<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Redirect;
use \Storage;
use App\AddClasses;
use App\SubmittedAssignment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AssignmentsController extends Controller {
	function showClassList(Request $data) {

		$user = Auth::user();
		$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, status, section FROM class_offerings 
																			JOIN (SELECT class_id, status FROM classes_student WHERE user_id = $user->id) AS students 
																			USING(class_id)) AS class USING(subject_id)"));

		foreach ($results as $result) {
		    $class_id = $result->class_id;
		    $class_assignments[$class_id] =  DB::select( DB::raw("SELECT * FROM assignments JOIN (SELECT class_id, assignment_id FROM class_assignments 
																							JOIN (SELECT class_id, status FROM classes_student WHERE user_id = $user->id) AS students 
																							USING(class_id) WHERE class_id = $class_id) AS class USING(assignment_id)"));

		    foreach ($class_assignments[$class_id] as $assignment) {
			    $assignment_id = $assignment->assignment_id;
			    $file_submitted[$class_id][$assignment_id] = DB::select( DB::raw("SELECT * FROM assignment_submissions JOIN (SELECT class_id, assignment_id FROM class_assignments
			    																				JOIN (SELECT class_id, status FROM classes_student WHERE user_id = $user->id) AS students
			    																				USING(class_id) WHERE class_id = $class_id) AS class USING(assignment_id) WHERE assignment_id = $assignment_id")); 
			  }

		}
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;

		$data = array(
					'results' => $results,
					'class_assignments' => $class_assignments,
					'file_submitted' => $file_submitted,
					'name' => strtoupper($name)
		);

		return view('student.assignments', $data);	
	}

	public function update(Request $data){
    	$user = Auth::user();

      if($data->hasFile('file')){
    		$file_id = $data->input('file_id');
    		$filename = $data->input('filename');
    		Storage::delete(config('app.fileDestinationPath').'/'.$filename);
    		DB::delete( DB::raw("DELETE FROM assignment_submissions WHERE file_id = $file_id"));
      	
      	$file = $data->file('file');
        $fileName = $file->getClientOriginalName();
        $destinationPath = config('app.fileDestinationPath').'/'.$fileName;
        $assignment_id = $data->input('assignment_id');
        $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

        if($uploaded){
          SubmittedAssignment::create([
          	'user_id' => $user->id,
          	'assignment_id' => $assignment_id,
            'filename' => $fileName
          ]);
        }
      }

      return redirect()->to('/studentProfile/assignments');
    }

    public function handleUpload(Request $data){
			$user = Auth::user();

      if($data->hasFile('file')){
        $file = $data->file('file');
        $fileName = $file->getClientOriginalName();
        $destinationPath = config('app.fileDestinationPath').'/'.$fileName;
        $assignment_id = $data->input('assignment_id');
        $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

        if($uploaded){
          SubmittedAssignment::create([
          	'user_id' => $user->id,
          	'assignment_id' => $assignment_id,
            'filename' => $fileName
          ]);
        }
      }

      return redirect()->to('/studentProfile/assignments');
    }

    public function upload(Request $data){
			$user = Auth::user();

      if($data->hasFile('file')){
        $file = $data->file('file');
        $fileName = $file->getClientOriginalName();
        $destinationPath = config('app.fileDestinationPath').'/'.$fileName;
        $class_id = $data->input('class_id');
        $assignment_title = $data->input('assignment_title');
        $assignment_description = $data->input('assignment_description');
        $date = $data->input('date');
        $time = $data->input('time');
        $due_date = $date." ".$time;
        $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

        if($uploaded){
          Assignment::create([
          	'class_id' => $class_id,
          	'assignment_title' => $assignment_title,
          	'assignment_description' => $assignment_description,
          	'due_date' => $due_date,
            'filename' => $fileName
          ]);
        }
      }

      return redirect()->to('/facultyProfile/rightPanel');
    }

}