<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;

class StudyPlanController extends Controller{
  public function seeSubjects(){
    $user_id = Auth::user()->id;
    $user = Auth::user();

    $results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, status, section FROM class_offerings 
                                                                            JOIN (SELECT class_id, status FROM classes_student WHERE user_id = $user->id) AS students 
                                                                                USING(class_id)) AS class USING(subject_id)"));
   
		$file_name = DB::select(DB::raw("SELECT filename FROM users WHERE id = $user->id"));
		$file_type = DB::select(DB::raw("SELECT filetype FROM users WHERE id = $user->id"));
		$type = "filetype";
		$file = $file_name[0]->filename . "." . $file_type[0]->$type;
		if($file == "."){
			$file = "profilePic.png";
		}
		$name = $user->lastname.", ".$user->firstname." ".$user->middlename;
    $nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));

    $subject_data = array(56);
    $exiting_slots=array();
    $i=0;
    $major_subjects = DB::select(DB::raw("SELECT g.grades, o.subject_name, o.slot_id FROM student_grades g JOIN subject_offerings o ON o.subject_id = g.subject_id WHERE student_number = $user_id"));
    foreach ($major_subjects as $subject) {
        $index = $subject->slot_id;
        $subject_data[$index] = $subject;
        $exiting_slots[$i]=$index;
        $i++;
    }

    $ge_subjects = DB::select(DB::raw("SELECT slot_id, grade AS grades, subject AS subject_name FROM ge_subjects WHERE student_id = $user_id"));
    foreach ($ge_subjects as $subject) {
        $index = $subject->slot_id;
        $subject_data[$index] = $subject;
        $exiting_slots[$i]=$index;
        $i++;
    }

    
    $data = array('subjects' => $subject_data,
                  'results' => $results,
                  'name' => strtoupper($name),
                  'nameUrl' => $nameUrl,
                  'slots' => $exiting_slots,
									'filename' => $file
     );

    return view('studyplan', $data);
  }

  public function updateStudyPlan(Request $data){
    $user_id = Auth::user()->id;
    $ges = array(0,1,2,3,4,6,7,8,9,10,11,14,15,16,17,18,22,23,24,25,26,27,30,31,36,42,45,55,43,44,50,51,52,53);
    // $maj = array(5,12,13,20,21,28,29,32,33,34,35,37,38,39,40,41,46,47,48,49,54);

    for ($i=0; $i < 56 ; $i++) { 
        $name = $data->input($i.'');
        $grade = $data->input(''.$i.'grades');
        if ($name !='' && $grade !='') {
            if ((array_search($i,$ges,true)) != False){
                $existing_in_ge = DB::select(DB::raw("SELECT * FROM ge_subjects WHERE student_id = $user_id and slot_id=$i and subject='$name'"));
                // print_r($existing_in_ge);
                //echo empty($existing_in_ge);
                if (empty($existing_in_ge) != 1) {
                    DB::update(DB::raw("UPDATE ge_subjects SET subject='$name', grade='$grade' WHERE student_id = $user_id AND slot_id=$i"));
                    //echo "Yes";
                }
                else{
                    DB::insert(DB::raw("INSERT INTO ge_subjects (student_id, slot_id, grade, subject) VALUES($user_id, $i, '$grade', '$name')"));
                    //echo "Yes ELSE";
                }
            }
        } 
    }

    $user = Auth::user();

    $results =  DB::select( DB::raw("SELECT * FROM subject_offerings JOIN (SELECT class_id, subject_id, status, section FROM class_offerings 
                                                                            JOIN (SELECT class_id, status FROM classes_student WHERE user_id = $user->id) AS students 
                                                                                USING(class_id)) AS class USING(subject_id)"));
    $name = $user->lastname.", ".$user->firstname." ".$user->middlename;
    $nameUrl = strtolower(str_replace(" ", "", ($user->firstname.$user->middlename.$user->lastname)));

    $subject_data = array(56);
    $exiting_slots=array();
    $i=0;
    $major_subjects = DB::select(DB::raw("SELECT g.grades, o.subject_name, o.slot_id FROM student_grades g JOIN subject_offerings o ON o.subject_id = g.subject_id WHERE student_number = $user_id"));
    foreach ($major_subjects as $subject) {
        $index = $subject->slot_id;
        $subject_data[$index] = $subject;
        $exiting_slots[$i]=$index;
        $i++;
    }

    $ge_subjects = DB::select(DB::raw("SELECT slot_id, grade AS grades, subject AS subject_name FROM ge_subjects WHERE student_id = $user_id"));
    foreach ($ge_subjects as $subject) {
        $index = $subject->slot_id;
        $subject_data[$index] = $subject;
        $exiting_slots[$i]=$index;
        $i++;
    }

    
    $data = array('subjects' => $subject_data,
                  'results' => $results,
                  'name' => strtoupper($name),
                  'nameUrl' => $nameUrl,
                  'slots' => $exiting_slots
     );
    //return view('studyPlan',$data);
    return Redirect::to($nameUrl.'/studyPlan');
  }

}
