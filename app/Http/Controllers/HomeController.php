<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {
	
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = Auth::user();
			
			if($user->usertype_id == 1) {
				return view('studentProfile');
			} else if($user->usertype_id == 2) {
				echo "Faculty";
				return view('facultyProfile');
			}  else if($user->usertype_id == 3) {
				return view('alumniProfile');
			}  
    }

    /*public function test(){
      $currentUser = Auth::user();
      echo $currentUser;
    }*/
}
