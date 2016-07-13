
@extends('layouts.app')
@section('content')
<script>


     function upvote(value) {
	var id = value.id.split(' ')[1];
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			//console.log(value.id);
            var data=JSON.parse(xhttp.response);
            document.getElementById('comment '+id).innerHTML = data['points'];
            if(data['points']==1){
                document.getElementById('up '+id).childNodes[0].src = "/iskomsai-final/public/images/up-toggle.png";
            }else{
                document.getElementById('up '+id).childNodes[0].src = "/iskomsai-final/public/images/up.png";
                document.getElementById('down '+id).childNodes[0].src = "/iskomsai-final/public/images/down.png";
            }
		}
	}

	xhttp.open("GET", id+"/upvote", true);
	xhttp.send();
    }

     function downvote(value) {
	var id = value.id.split(' ')[1];
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			//console.log(value.id);
            var data=JSON.parse(xhttp.response);
            document.getElementById('comment '+id).innerHTML = data['points'];
            if(data['points']==-1){
                document.getElementById('down '+id).childNodes[0].src = "/iskomsai-final/public/images/down-toggle.png";
            }else{
                document.getElementById('up '+id).childNodes[0].src = "/iskomsai-final/public/images/up.png";
                document.getElementById('down '+id).childNodes[0].src = "/iskomsai-final/public/images/down.png";
            }
		}
	}

	xhttp.open("GET", id+"/downvote", true);
	xhttp.send();
    }

    function postUpvote(value) {
	var id = value.id.split(' ')[1];
        console.log(id)
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			//console.log(value.id);
            var data=JSON.parse(xhttp.response);
            document.getElementById('post_point '+id).innerHTML = data['points'];
            if(data['points']==1){
                document.getElementById('postup '+id).childNodes[0].src = "/iskomsai-final/public/images/up-toggle.png";
            }else{
                document.getElementById('postup '+id).childNodes[0].src = "/iskomsai-final/public/images/up.png";
                document.getElementById('postdown '+id).childNodes[0].src = "/iskomsai-final/public/images/down.png";
            }
		}
	}

	xhttp.open("GET", id+"/postupvote", true);
	xhttp.send();
    }

    function postDownvote(value) {

	var id = value.id.split(' ')[1];
	var xhttp2 = new XMLHttpRequest();
	xhttp2.onreadystatechange = function() {
		if(xhttp2.readyState == 4 && xhttp2.status == 200) {

            var data=JSON.parse(xhttp2.response);
            document.getElementById('post_point '+id).innerHTML = data['points'];
            if(data['points']==-1){
                document.getElementById('postdown '+id).childNodes[0].src = "/iskomsai-final/public/images/down-toggle.png";
            }else{
                document.getElementById('postup '+id).childNodes[0].src = "/iskomsai-final/public/images/up.png";
                document.getElementById('postdown '+id).childNodes[0].src = "/iskomsai-final/public/images/down.png";
            }
		}
	}
    console.log(id);
	xhttp2.open("GET", id+"/postdownvote", true);
	xhttp2.send();
    }

    function deleteComment(value) {
        var id = value.id.split(' ')[2];
        var post_id = value.id.split(' ')[1];
        var element = document.getElementById(""+id);
        element.parentNode.removeChild(element);
        var xhttp2 = new XMLHttpRequest();
        console.log(post_id+"-"+id);

        xhttp2.open("GET", post_id+"/delete_comment/"+id, true);
        xhttp2.send();
    }

    function deletePost(value){
        location.href = value+"/delete_post";
    }


</script>

    <div class="col-md-9" style="margin-top: 80px;display: flex">
        <div style="display: block;margin-top:20px">
                                <div style="display: block;">
                                <div class="btn-group-vertical ">
                                <button onclick="postUpvote(this)" id="postup {{$post->post_id}}" style="background-color:Transparent;border:none;cursor:pointer;outline:none"><img <?php if($post->vote==1){ echo "src=".URL::asset("images/up-toggle.png");}else{ echo "src=".URL::asset("images/up.png");} ?>  alt="up" width="30" height="30" /></button>
                                <p style="text-align:center;margin-bottom: 0px;" id="post_point {{$post->post_id}}"> {{$post->points}} </p>
                                <button onclick="postDownvote(this)" id="postdown {{$post->post_id}}" style="background-color:Transparent;border:none;cursor:pointer;outline:none"><img <?php if($post->vote==-1){ echo "src=".URL::asset("images/down-toggle.png");}else{ echo "src=".URL::asset("images/down.png");} ?>  alt="up" width="30" height="30" /></button></div>
                            </div>
                            </div>
        <div style="padding-left:10px">
        <h1>{{$post->post_title}}</h1>
        <h3>{{$post->post_content}}</h3>

            @if($post->submitter_id == 1)
            	<div class="container">
  <!-- Trigger the modal with a button -->

  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Delete</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p class="text-center">Are you sure to delete this post?</p>
		  <div class="text-center">
		  <button class="btn btn-default" data-dismiss="modal" onclick="deletePost({{$post->post_id}})"> Yes </button>
		  <button class="btn btn-default" data-dismiss="modal"> No</button>
		  </div>
        </div>

      </div>

    </div>

  </div>

</div>
@endif
        <div style="margin-top: 10px;">
        <form  role="search" action="{{ url('/comment')}}" method="post">
                    {!! csrf_field() !!}
                    <textarea class="form-control" placeholder="Reply"name="content" style="width: 100%;resize: vertical;"></textarea>

                    <input type="hidden" value="{{$post->post_id}}" name="post_id"/>

                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
		</form>
	</div>
        </div>
    </div>

	<div  class="col-md-9">
    <div>
        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-md-1">Points </th>
                        <th class="col-md-8">Replies </th>
                    </tr>
                </thead>
                <tbody>

				@foreach ($comments as $comment)

                    <tr id ='{{$comment->id}}'>
                        <td>
                            <div style="display: block;">
                                <div class="btn-group-vertical ">
                                <button onclick="upvote(this)" id="up {{$comment->id}}" style="background-color:Transparent;border:none;cursor:pointer;outline:none"><img <?php if($comment->vote==1){ echo "src=".URL::asset("images/up-toggle.png");}else{ echo "src=".URL::asset("images/up.png");} ?>  alt="up" width="30" height="30" /></button>
                                <p style="text-align:center;margin-bottom: 0px;" id="comment {{$comment->id}}"> {{$comment->points}} aaaaaaa</p>
                                <button onclick="downvote(this)" id="down {{$comment->id}}" style="background-color:Transparent;border:none;cursor:pointer;outline:none"><img <?php if($comment->vote==-1){ echo "src=".URL::asset("images/down-toggle.png");}else{ echo "src=".URL::asset("images/down.png");} ?>  alt="up" width="30" height="30" /></button></div>
                            </div>
                        </td>
                        <td>
                            <p>
								{{$comment->content}}
                            </p>
                            <p>{{$comment->username}} submitted {{$comment->elapsed}}</p>
                            @if($comment->user_id == 1)
                            <div class="container">
  <!-- Trigger the modal with a button -->

  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{$comment->id}}">Delete</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal{{$comment->id}}" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p class="text-center">Are you sure to delete this comment?</p>
		  <div class="text-center">
		  <button class="btn btn-default" data-dismiss="modal" onclick="deleteComment(this)" id="delete {{$post->post_id}} {{$comment->id}}">Yes</button>
		  <button class="btn btn-default" data-dismiss="modal"> No</button>
		  </div>
        </div>

      </div>

    </div>
  </div>

</div> @endif
                        </td>
                    </tr>
				@endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
<div class="col-sm-offset-9 col-sm-3" style="margin-top:80px;position:fixed;float:right">
    <button class="btn btn-primary btn-block"><a href="{{ url('/forum')}}">Home</a></button>
    <button class="btn btn-primary btn-block"><a href="{{ url('/forum/new_post')}}">New Post</a></button>
</div>

@endsection
