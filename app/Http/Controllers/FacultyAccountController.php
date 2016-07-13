<?php

namespace App\Http\Controllers;

use Redirect;
use DB;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class facultyAccountController extends Controller
{
    //
    public function reply(Request $data){
    	$comment_id = $data->input('comment_id');
    	$user_id =1;//Auth::user()->id;
    	$reply = $data->input('reply');
    	DB::insert(DB::raw("INSERT INTO replies (comment_id,user_id,content) VALUES ('$comment_id','$user_id','$reply')"));
      return Redirect::to('facultyAccount');
    }

    public function comment(Request $data){
    	$post_id = $data->input('post_id');
    	$user_id =1;//Auth::user()->id;
    	$comment = $data->input('comment');
    	DB::insert(DB::raw("INSERT INTO comments (post_id,user_id,content) VALUES ('$post_id','$user_id','$comment')"));
      return Redirect::to('facultyAccount');
    }


    public function index()
  {
  	$announcements = DB::select(DB::raw("SELECT * FROM announcements"));
    $comments_array = array();
    $index=0;
    foreach ($announcements as $announcement) {
      $post_id = $announcement->announcement_id;
      $comments = DB::select(DB::raw("SELECT * FROM comments WHERE post_id='$post_id'"));
      $comments_array[$index] = $comments;
      $index++;
    }
  	
  	$replies = array();
    $comments = array();
    $index=0;
    // foreach ($comments as $comment) {
    //   $comment_id = $comment->comment_id;
    //   $replies = DB::select(DB::raw("SELECT * FROM replies WHERE comment_id = '$comment_id'"));
    //   $replies_array[$index] = $replies;
    //   $index++;
    // }
    // $announcements = DB::select(DB::raw("SELECT * FROM announcements"));
    $comments = DB::select(DB::raw("SELECT * FROM comments"));
    $replies = DB::select(DB::raw("SELECT * FROM replies"));
    $data = array(
      'announcements'=>$announcements,
      'comments'=>$comments,
      'replies'=>$replies
      );

    return view('facultyAccount',$data);
  }
}
