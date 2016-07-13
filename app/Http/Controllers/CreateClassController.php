<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;
use App\AddClasses;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreateClassController extends Controller{
	public function createClass(Request $data){
		$user = Auth::user();
		$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, section FROM class_offerings WHERE user_id = $user->id) AS class USING(subject_id)"));
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
		$nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));

		//INPUTS FROM USER
		$schoolYear = $data->input('schoolYear');
		$subject = $data->input('subject');
		$day = $data->input('day');
		$time = $data->input('time');
		$semester = $data->input('semester');
		$section = $data->input('section');
		$roomAssignment = $data->input('roomAssignment');
		$submit = $data->input('submit');
		$data = array(
					'results' => $results,
					'name' => strtoupper($name),
					'nameUrl' => $nameUrl,
					'schoolYear'=>$schoolYear,
					'subject'=>$subject,
					'day' => $day,
					'time' => $time,
					'semester' => $semester,
					'section' => $section,
					'roomAssignment' => $roomAssignment
		);
		$securityKey = rand(0,9).''.rand(0,9).''.rand(0,9).''.rand(0,9).''.rand(0,9).''.rand(0,9).''.chr(rand(97,122)).''.chr(rand(65,90));
		if($submit!=null){
			DB::insert(DB::raw("INSERT INTO class_offerings(year, semester, room_assignment, section, user_id, subject_id, security_key, day, time)
													VALUES('$schoolYear','$semester', '$roomAssignment', '$section', $user->id, $subject, '$securityKey', '$day', '$time')"));
			$subjectName = DB::select(DB::raw("SELECT class_id, subject_name, section FROM subject_offerings
					JOIN class_offerings ON subject_offerings.subject_id=class_offerings.subject_id WHERE user_id=$user->id AND class_offerings.section='$section' AND  class_offerings.subject_id = $subject"));
			return Redirect::to($nameUrl.'/'.$subjectName[0]->subject_name.' '.$subjectName[0]->section.'?class_id='.$subjectName[0]->class_id);
		}
		$listOfSubjects = DB::select( DB::raw("SELECT subject_id, subject_name, subject_title FROM subject_offerings"));
		$data['listOfSubjects'] = $listOfSubjects;
		return view('faculty.createClass', $data);
	}
}
