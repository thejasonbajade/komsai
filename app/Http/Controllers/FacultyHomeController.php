<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Image;
use App\Http\Requests;

class FacultyHomeController extends Controller
{
  public function facultyhome() {
		$users =  DB::select( DB::raw("SELECT * FROM users WHERE usertype_id=2"));
		$schedule = DB::select( DB::raw("SELECT * FROM class_offerings JOIN users ON class_offerings.user_id=users.id JOIN subject_offerings ON class_offerings.subject_id=subject_offerings.subject_id"));
		$data = array(
			'users'=>$users,
			'schedule'=>$schedule
			);
		return view('faculty.facultyhome', $data);

		
	}
}
