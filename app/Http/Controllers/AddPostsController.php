<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddPostsController extends Controller
{
	
	public function postUpdate(Request $data) {
		$user = Auth::user();
		$class_id = $data->input('classId');
		$content = $data->input('content');
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
		$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, section FROM class_offerings WHERE user_id = $user->id) AS class USING(subject_id)"));
		$classInfo =  DB::select( DB::raw("SELECT * FROM class_offerings JOIN subject_offerings USING(subject_id) WHERE class_id = $class_id"));
		$classRequests = DB::select( DB::raw("SELECT class_id FROM classes_student JOIN class_offerings USING(class_id) WHERE class_id = $class_id AND class_offerings.user_id = $user->id"));				
		$nameUrl = strtolower(str_replace(" ", "",Auth::user()->firstname.Auth::user()->middlename.Auth::user()->lastname));
		if($content != null ) {	
			DB::insert(DB::raw("INSERT INTO announcements(user_id, class_id, content) VALUES( '$user->id', '$class_id', '$content')"));
			
		}
		$data = array(
			'results' => $results,
			'classInfo' => $classInfo,
			'nameUrl' => $nameUrl,
			'classId' =>$class_id,
			'name' => $name,
			'classRequests' => $classRequests);
		return Redirect::to($nameUrl.'/'.$classInfo[0]->subject_name.' '.$classInfo[0]->section.'?class_id='.$class_id);
		
	}
}
