<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use Auth;
use App\Http\Requests;

class InboxController extends Controller
{
	function inbox(Request $data){
		$user = Auth::user();
		$messages = DB::select( DB::raw("SELECT * FROM feedback WHERE receiver_id = $user->id ORDER BY `timestamp` DESC"));
		$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, section FROM class_offerings WHERE user_id = $user->id) AS class USING(subject_id)"));

		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
		$nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));
		$feedback_id = $data->input('feedback_id');
		$submit = $data->input('submit');
		$data = array(
			'results' => $results,
			'name' => strtoupper($name),
			'nameUrl' => $nameUrl,
			'feedback_id' => $feedback_id,
		);
		$data['messages']=$messages;
		if($submit!=null){
			DB::delete(DB::raw("DELETE FROM feedback WHERE feedback_id=$feedback_id"));
			return Redirect::to($nameUrl.'/inbox');
		}
		return view('faculty.inbox', $data);
	}
		
    
}
