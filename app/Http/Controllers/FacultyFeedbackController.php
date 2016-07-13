<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Redirect;
use App\Http\Requests;

class FacultyFeedbackController extends Controller {
	public function sendfeedback(Request $data) {
	 //Get all the data and store it inside Store Variable
		$receiver = $data->input('receiver');
		$subject = $data->input('subject');
		$message = $data->input('message');
		if($message != null ) {	
			DB::insert(DB::raw("INSERT INTO feedback(receiver_id, feedback_subject, feedback_content) VALUES( $receiver, '$subject', '$message')"));
			$nameUrl = strtolower(str_replace(" ", "",Auth::user()->firstname.Auth::user()->middlename.Auth::user()->lastname));
			return Redirect::to($nameUrl.'/faculty');
		}
		return view('student.facultyFeedback');
	}
}
