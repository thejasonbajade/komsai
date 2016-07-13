<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Redirect;
use App\AddClasses;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddClassesController extends Controller {
	
	public function studentProfileContent(Request $data) {
		$user = Auth::user();
		$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, status, section FROM class_offerings 
																			JOIN (SELECT class_id, status FROM classes_student WHERE user_id = $user->id) AS students 
																				USING(class_id)) AS class USING(subject_id)"));

		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
		$nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));
		
		$data = array(
					'results' => $results,
					'name' => strtoupper($name),
					'nameUrl' => $nameUrl,
		);
		return $data;
	}
	
	function addClass(Request $data) {
		$message = "";
		
		$nameUrl = strtolower(Auth::user()->firstname.Auth::user()->middlename.Auth::user()->lastname);
		$data = $this->studentProfileContent($data);
		
		$data['message'] = $message;
		return view('student.addClass', $data);
	}
	
	function showClassList(Request $data) {
		$user = Auth::user();

		$subjectName = $data->input('subjectName');
		$year = $data->input('year');
		$semester = $data->input('semester');

		if($semester == null || $year == null) {
			$year = 0;
			$semester = 0;
		}

		$classes = DB::select( DB::raw("SELECT * FROM class_offerings 
																			JOIN (SELECT * FROM subject_offerings WHERE subject_name LIKE '%$subjectName%') AS subject 
																				USING(subject_id) WHERE semester = '$semester' AND year = '$year' AND class_id NOT IN (SELECT class_id FROM classes_student WHERE user_id = $user->id)"));

		$message = "Your search returned 0 results.";
		if(count($classes) != 0) {
			$message = "Results for ".$subjectName;
		}
		$data = $this->studentProfileContent($data); 
		$data['classes'] = $classes;
		$data['message'] = $message;
		
		return view('student.classList', $data);	
	}
	
	function checkSecurityKey(Request $data) {
		$user = Auth::user();

		$securityKey = $data->input('securityKey');
		$classId = $data->input('classId'); 
		$pending = 0; 

		$classes = DB::select( DB::raw("SELECT * FROM class_offerings WHERE security_key = '$securityKey' AND class_id = $classId "));

		$message = "";
		$data = $this->studentProfileContent($data); 
		$data['classes'] = $classes;
		
		if(count($classes)==1) {
			DB::insert(DB::raw("INSERT INTO classes_student(class_id, user_id, status) VALUES ($classId, $user->id, $pending)"));
			$message = "Request sent";

			
		
			$data['message'] = $message;

			return Redirect::to('/studentProfile/addClass');
		} 
		$message = "Security key mismatch.";
		$data['message'] = $message;
		
		return view('student.classList', $data);	
			
		//return Redirect::to('/studentProfile/addClass/classList');
	}
}