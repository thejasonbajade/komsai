<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use DB;
use App\Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UpdateProfileController extends Controller
{	
	public function uploadPicture(Request $data){
		$user = Auth::user();
		if($user->usertype_id == 1){
			$table_name = "students";
		}
		else if($user->usertype_id == 2){
			$table_name = "faculty";
		}
		$firstname = DB::select(DB::raw("SELECT firstname from users WHERE id = $user->id"));
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;		
		$nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));
		$message = "";					
		$first_name = $firstname[0]->firstname;
		$destination = "images";
		if($data->file('image') != NULL) {
			$extension = $data->file('image')->getClientOriginalExtension();
			$fileName = $first_name .'_'. $user->id;
			$fileNameExtension = $fileName.".".$extension;
			$data->file('image')->move($destination, $fileNameExtension);
			DB::update(DB::raw("UPDATE users SET filename='$fileName', filetype='$extension' WHERE id = $user->id"));
		}
		
		$url = $nameUrl . "/updateProfile";
		$submit = $data->input('submit');
		if($submit != null){
			$contact_number = $data->input('contact_number');
			$email_address = $data->input('email_address');
			$upv_address = $data->input('upv_address');
			$home_address = $data->input('home_address');
			$number = DB::select(DB::raw("SELECT contact_number FROM contact_numbers WHERE user_id = $user->id"));
			$faculty = DB::select(DB::raw("SELECT user_id FROM $table_name WHERE user_id=$user->id"));
		
		if(count($number)==0){
			DB::insert(DB::raw("INSERT INTO contact_numbers (user_id, contact_number) VALUES ($user->id, '$contact_number')"));
		}
		else{
			$contact_number = $data->input('contact_number');
			DB::update(DB::raw("UPDATE contact_numbers SET contact_number='$contact_number'"));
		}
		if(count($faculty)==0){
			DB::insert(DB::raw("INSERT INTO $table_name (user_id, upv_address, home_address) VALUES ($user->id, '$upv_address', '$home_address')"));
		}
			DB::update(DB::raw("UPDATE users SET email='$email_address' where id= $user->id"));
			DB::update(DB::raw("UPDATE $table_name SET upv_address='$upv_address', home_address='$home_address'"));
		}	
		return Redirect::to($url);
}
	public function updateProfile(Request $data){
		$user = Auth::user();
		$file_name = DB::select(DB::raw("SELECT filename FROM users WHERE id = $user->id"));
		$file_type = DB::select(DB::raw("SELECT filetype FROM users WHERE id = $user->id"));
		$type = "filetype";
		$file = $file_name[0]->filename . "." . $file_type[0]->$type;	
		if($file == "."){
			$file = "profilePic.png";
		}		
		if($user->usertype_id == 1){
			$table_name = "students";
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, status, section FROM class_offerings 
																			JOIN (SELECT class_id, status FROM classes_student WHERE user_id = $user->id) AS students 
																				USING(class_id)) AS class USING(subject_id)"));

		} else if($user->usertype_id == 2) {
			$table_name = "faculty";
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, section FROM class_offerings WHERE user_id = $user->id) AS class USING(subject_id)"));
		} else if($user->usertype_id == 3) {
			//return Redirect::to('alumniProfile');
		}
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
		$nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));
		$message = "";		
		$number = DB::select(DB::raw("SELECT contact_number FROM contact_numbers WHERE user_id = $user->id"));
		$email = DB::select(DB::raw("SELECT email FROM users WHERE id = $user->id"));
		$upv = DB::select(DB::raw("SELECT upv_address FROM $table_name WHERE user_id = $user->id"));
		$home = DB::select(DB::raw("SELECT home_address FROM $table_name WHERE user_id =$user->id"));
		$faculty = DB::select(DB::raw("SELECT user_id FROM $table_name WHERE user_id=$user->id"));
		$email_address = $email[0]->email;
		if(count($home)){
			$home_address = $home[0]->home_address;
		}
		else{
			$home_address = $data->input('home_address');
		}
		if(count($upv)!=0){
			$upv_address = $upv[0]->upv_address;
		}
		else{
			$upv_address = $data->input('upv_address');
		}
		if(count($number)!=0){
			$contact_number = $number[0]->contact_number;
		}
		else{
			$contact_number = $data->input('contact_number');
		}
		$data = array(
					'results' => $results,
					'filename' => $file,
					'name' => strtoupper($name),
					'message' => $message,
					'nameUrl' => $nameUrl,
					'contact_number' => $contact_number,
					'email_address' => $email_address,
					'upv_address' => $upv_address,
					'home_address' => $home_address
		);		
			return view('student.updateProfile', $data);	
	}
}