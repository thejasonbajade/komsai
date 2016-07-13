<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Http\Requests;


class IndexController extends Controller
{
    public function setIndex() {
			if(!Auth::guest()) {
				$nameUrl = strtolower(str_replace(" ", "",(Auth::user()->firstname.Auth::user()->middlename.Auth::user()->lastname)));
				return Redirect::to($nameUrl);
			} else {
				return view('welcome');
			}
		}
}
