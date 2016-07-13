<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use App\AddClasses;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GradeController extends Controller{
	public function index(){
		return view('uploadGrades');
	}
	public function uploadGrades(Request $data){
		$user = Auth::user();
		$grades = $data->input('grades');
		$student_number = $data->input('student_number');
		$class_id = $data->input('class_id');
		for($i=0;$i<count($student_number);$i++){
			$grade = $grades[$i];
			$number = $student_number[$i]; 
			DB::update(DB::raw("UPDATE classes_student SET grade = '$grade' WHERE user_id = $number AND class_id=$class_id"));
		}
		if($user->usertype_id == 2) {
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, section FROM class_offerings WHERE user_id = $user->id) AS class USING(subject_id)"));
		}
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
		
		$nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));
		$data = array(
					'results' => $results,
					'name' => strtoupper($name),
					'nameUrl' => $nameUrl
		);
		$classDetails =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN class_offerings USING(subject_id) WHERE user_id=$user->id AND class_id=$class_id"));
		$data['classDetails'] = $classDetails;

		return Redirect::to($nameUrl.'/'.$classDetails[0]->subject_name.' '.$classDetails[0]->section.'/uploadGrades?class_id='.$class_id);
	}

    public function viewUploadGrades(){
		$user = Auth::user();
		$classId = $_GET['class_id'];
		if($user->usertype_id == 2) {
			$results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, section FROM class_offerings WHERE user_id = $user->id) AS class USING(subject_id)"));
		}
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
		
		$nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));
		$data = array(
					'results' => $results,
					'name' => strtoupper($name),
					'nameUrl' => $nameUrl
		);
		$classDetails =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN class_offerings USING(subject_id) WHERE user_id=$user->id AND class_id=$classId"));
		$data['classDetails'] = $classDetails;
		$grades = DB::select(DB::raw("SELECT * FROM classes_student c JOIN users u ON c.user_id = u.id WHERE class_id = $classId"));
		/*$grades = DB::select(DB::raw("SELECT DISTINCT student_grades.class_id, student_grades.student_number, users.firstname, users.lastname, student_grades.grades 
																		FROM students JOIN student_grades ON students.student_number=student_grades.student_number JOIN users ON users.id=students.user_id 
																			JOIN classes_student ON classes_student.class_id=student_grades.class_id WHERE student_grades.class_id=$classId"));*/
		$data['grades'] = $grades;
		$data['classId'] = $classId;
		return view('faculty.uploadGrades', $data);
    }
}
?>