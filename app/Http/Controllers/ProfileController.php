<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Redirect;
use App\Http\Requests;

class ProfileController extends Controller {	
		
	public function profileContent() {
			
		$user = Auth::user();
		

		if($user->usertype_id == 1) {
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, status, section FROM class_offerings 
																			JOIN (SELECT class_id, status FROM classes_student WHERE user_id = $user->id) AS students 
																				USING(class_id)) AS class USING(subject_id)"));

		} else if($user->usertype_id == 2) {
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings 
																				JOIN (SELECT class_id, subject_id, section FROM class_offerings WHERE user_id = $user->id) AS class USING(subject_id)"));

		}  else if($user->usertype_id == 3) {
			$results =  DB::select( DB::raw("SELECT * FROM users WHERE id = $user->id "));

		}
		
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
		$nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));
		$data = array(
					'results' => $results,
					'name' => strtoupper($name),
					'nameUrl' => $nameUrl
		);

		$url = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));
		return view('profile', $data);
		
	}
}
