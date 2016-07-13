<?php

namespace App\Http\Controllers;

use Auth;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\User;
use App\Post;
use App\PostComment;
use App\Category;

use DB;

class ForumController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
      $start = Input::get('start', 10);
      $posts = DB::table('forum_post')->limit($start)->get();
      $data = array(
        'posts' => $posts,
        'start' => $start,
      );
      return view('forum.forum', $data);
    }

    public function newPost(){
      $categories = Category::all();
      $data = array(
        'categories' => $categories
      );
      return view('forum.newpost', $data);
    }

    public function submitPost(Request $data){
        $currentUserId = Auth::user()->id;
        $user_id = $currentUserId;
        $forum_post = new Post;
        $forum_post->post_title = $data->input('title');
        $forum_post->post_content = $data->input('content');
        $forum_post->category = $data->input('tag');
        $forum_post->submitter_id = $user_id;
        $forum_post->save();
        echo "OK!";
        //return Redirect::to('/forum');
    }

    public function search($searchstring){
        return view('forum.forumsearch');
    }

    public function post($postid){
      return view('forum.forumpost');
    }
    /*
    public function upvotePost($postid){
      DB::table('forum_post')->where('post_id', $postid)->increment('points');
      $query = DB::table('forum_post')->where('post_id', $postid)->value('points');
      return $query;
    }
    */
}
