<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\ForumPostComment;
use App\CommentVote;
use App\ForumPost;
use App\User;
use App\PostVote;
use App\Http\Controllers\Controller;
use Redirect;
use DB;
use App\Category;
use DateTime;

class ForumPostController extends Controller
{

    public function comment(Request $data){
        $currentUserId = Auth::user()->id;
        $user_id = $currentUserId;
        $post_id = $data->input('post_id');
        $forum_post_comment = new ForumPostComment;
        $forum_post_comment->content = $data->input('content');
        $forum_post_comment->user_id = $user_id;
        $forum_post_comment->post_id = $post_id;
        $forum_post_comment->save();

        ForumPost::where('post_id','=',$post_id)->increment('reply_count');

        return Redirect::to('/forum/'.$post_id);
    }

    public function showCategories(){
        $categories = Category::all();
        $data = array(
        'categories' => $categories
        );
        return view('forum.new_post', $data);

    }

    public function newPost(Request $data){
        $currentUserId = Auth::user()->id;
        $user_id = $currentUserId;
        $forum_post = new ForumPost;
        $forum_post->post_title = $data->input('title');
        $forum_post->post_content = $data->input('content');
        $forum_post->category = $data->input('tag');
        $forum_post->submitter_id = $user_id;
        $forum_post->save();
        return Redirect::to('/forum');

    }

    public function upvote($id){
        $currentUserId = Auth::User()->id;
        $user_id = $currentUserId;
        $vote = CommentVote::where('comment_id','=',$id)->where('user_id','=',$user_id)->first();

        if($vote != null){
            if($vote->vote != 1){
                CommentVote::where('comment_id','=',$id)->where('user_id','=',$user_id)->increment('vote');
                ForumPostComment::where('id','=',$id)->increment('points');
                //DB::table('forum-post-comments')->increment('points', 1, ['id' => $id]);
            }
        }else{
            $comment_vote = new CommentVote;
            $comment_vote->comment_id = $id;
            $comment_vote->user_id = $user_id;
            $comment_vote->vote = 1;
            $comment_vote->save();
            ForumPostComment::where('id','=',$id)->increment('points');
            //DB::table('forum-post-comments')->increment('points', 1, ['id' => '$id']);
        }
        $comment = ForumPostComment::where('id','=',$id)->first();
        $vote = CommentVote::where('comment_id','=',$id)->where('user_id','=',$user_id)->first();
        $comment->user_vote = $vote->vote;
        return json_encode($comment);
    }

    public function postUpvote($id){
        $currentUserId = Auth::User()->id;
        $user_id = $currentUserId;
        $vote = PostVote::where('post_id','=',$id)->where('user_id','=',$user_id)->first();
        //$p = PostVote::all();
        if($vote != null){
            if($vote->vote != 1){
                PostVote::where('id','=',$vote->id)->increment('vote');
                ForumPost::where('post_id','=',$id)->increment('points');
            }
        }else{
            $post_vote = new PostVote;
            $post_vote->post_id = $id;
            $post_vote->user_id = $user_id;
            $post_vote->vote = 1;
            $post_vote->save();
            ForumPost::where('post_id','=',$id)->increment('points');
        }
        $post = ForumPost::where('post_id','=',$id)->first();
        $vote = PostVote::where('post_id','=',$id)->where('user_id','=',$user_id)->first();
        $post->user_vote = $vote->vote;
        return json_encode($post);
        //print $vote;
    }

    public function postDownvote($id){
        $currentUserId = Auth::User()->id;
        $user_id = $currentUserId;
        $vote = PostVote::where('post_id','=',$id)->where('user_id','=',$user_id)->first();
        //$p = PostVote::all();
        if($vote != null){
            if($vote->vote != (-1)){
                PostVote::where('id','=',$vote->id)->decrement('vote');
                ForumPost::where('post_id','=',$id)->decrement('points');
            }
        }else{
            $user_vote = -1;
            $post_vote = new PostVote;
            $post_vote->post_id = $id;
            $post_vote->user_id = $user_id;
            $post_vote->vote = (-1);
            $post_vote->save();
            ForumPost::where('post_id','=',$id)->decrement('points');
        }

        $post = ForumPost::where('post_id','=',$id)->first();
        $vote = PostVote::where('post_id','=',$id)->where('user_id','=',$user_id)->first();
        $post->user_vote = $vote->vote;
        //print $post->points;
        return json_encode($post);
    }

    public function downvote($id){
        $currentUserId = Auth::User()->id;
        $user_id = $currentUserId;
        $vote = CommentVote::where('comment_id','=',$id)->where('user_id','=',$user_id)->first();
        if($vote != null){
            if($vote->vote != (-1)){
                CommentVote::where('comment_id','=',$id)->where('user_id','=',$user_id)->decrement('vote');
                ForumPostComment::where('id','=',$id)->decrement('points');
                //DB::table('forum-post-comments')->increment('points', 1, ['id' => $id]);
            }
        }else{
            $comment_vote = new CommentVote;
            $comment_vote->comment_id = $id;
            $comment_vote->user_id = $user_id;
            $comment_vote->vote = -1;
            $comment_vote->save();
            ForumPostComment::where('id','=',$id)->decrement('points');
            //DB::table('forum-post-comments')->increment('points', 1, ['id' => '$id']);
        }
        $comment = ForumPostComment::where('id','=',$id)->first();
        $vote = CommentVote::where('comment_id','=',$id)->where('user_id','=',$user_id)->first();
        $comment->user_vote = $vote->vote;
        return json_encode($comment);
    }

    public function showComments($post_id){
        $currentUserId = Auth::User()->id;
        $user_id = $currentUserId;
        $comments = ForumPostComment::where('post_id','=',$post_id)->get();
        $post = ForumPost::where('post_id','=',$post_id)->first();
        $user = User::where('id','=',$post->submitter_id)->first();
        $post_vote = PostVote::where('post_id','=',$post_id)->where('user_id','=',$user_id)->first();
        $post_category = Category::where('id','=',$post->category)->first();
        $post->username = $user->name;
        $post->category_name = $post_category->category_name;
        $post->category_color = $post_category->category_color;

        if($post_vote != null){
            $post->vote = $post_vote->vote;
        }else{
            $post->vote = 0;
        }

        //adding comment vote and username
        foreach ($comments as $comment){
            //query for getting username
            $user = User::where('id','=',$comment->user_id)->first();
            $vote = CommentVote::where('comment_id','=',$comment->id)->where('user_id','=',$user_id)->first();
            if($vote != null){
                $comment->vote = $vote->vote;
            }else{
                $comment->vote = 0;
            }
            $comment->username = strtolower($user->firstname.$user->middlename.$user->lastname);
        }
        $dt = new DateTime(date('Y-m-d H:i:s'));
        //adding elapsed time
        foreach ( $comments as $c ){
            $create_date=$c->created_at;
            $difference = $dt->diff($create_date);
            //$elapsed = 0;
            if($difference->d>0){
                $elapsed=$difference->d." "."days ago";
            }
            else if($difference->h>0){
                $elapsed=$difference->h." "."hrs ago";
            }
            else if($difference->i>0){
                $elapsed=$difference->i." "."mins ago";
            }
            else if($difference->s>0){
                $elapsed=$difference->s." "."seconds ago";
            }else if($difference->s<=0){
                $elapsed = "just now";
            }
            $c->elapsed = $elapsed;
        }
        $data = array(
        'comments' => $comments,'post'=>$post
        );
        return view('forum.comments', $data);
    }


    public function search(Request $data){
    	$keyword = $data->input('srch-term');
    	$orderby = $data->input('orderby');
      $category = $data->input('category');
      $currentUserId = Auth::user()->id;
      $user_id = $currentUserId;

      if($orderby==""){
		    $orderby = "created_at"; //or timestamp
	    }

      if(strcmp($category,"All")==0 or $category==null){
          $category= "All";
          $posts = ForumPost::where('post_title','LIKE', "%$keyword%")
                  ->orwhere('post_content','LIKE',"%$keyword%")
                  ->orderBy("$orderby", 'desc')
                  ->get();
      }else{
          $category_id = Category::where('category_name','=',$category)->first();
          $posts = ForumPost::where('category','=',$category_id->id)
                  ->where(function ($q) use ($keyword){
                  $q->where('post_title','LIKE', "%$keyword%")
                      ->orwhere('post_content','LIKE',"%$keyword%");})
                  ->orderBy("$orderby", 'desc')
                  ->get();
      }

      $categories = Category::all();

      foreach($posts as $p){
          $user = User::where('id','=',$p->submitter_id)->first();
          $vote = PostVote::where('post_id','=',$p->post_id)->where('user_id','=',$user_id)->first();
          $post_category = Category::where('id','=',$p->category)->first();
          if($vote != null){
                  $p->vote = $vote->vote;
          }else{
              $p->vote = 0;
          }
          $p->username = strtolower($user->firstname.$user->middlename.$user->lastname);

          $p->category_name = $post_category->category_name;
          $p->category_color = $post_category->category_color;
      }

  	  $header = "Results for $keyword";

      if(strcmp($keyword,"")==0){
          $header = "";
      }elseif (count($posts)==0) {
  		$header = "No results for $keyword";
	}

	$data = array(
		'posts' => $posts,
		'keyword' => $keyword,
		'header' => $header,
		'orderby' => $orderby,
        'categories' => $categories,
        'category' => $category
		);
	return view('forum.forum_search',$data);
	}

    public function deleteComment($post_id,$id){
        ForumPostComment::where('id','=',$id)->delete();
        CommentVote::where('comment_id','=',$id)->delete();
        ForumPost::where('post_id','=',$post_id)->decrement('reply_count');
    }
    //
    public function deletePost($post_id){
        ForumPost::where('post_id','=',$post_id)->delete();
        ForumPostComment::where('post_id','=',$post_id)->delete();
        PostVote::where('post_id','=',$post_id)->delete();
        return Redirect::to('/forum');
    }

}
