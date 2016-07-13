@extends('layouts.app')
@section('content')
<script>
    function upvote(value) {
        var id = value.id.split(' ')[1];
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                //console.log(value.id);
                var data = JSON.parse(xhttp.response);
                document.getElementById('comment ' + id).innerHTML = data['points'];
                if (data['user_vote'] == 1) {
                    document.getElementById('up ' + id).childNodes[0].src = "{{ url('/images/up-toggle.png') }}";
                } else {
                    document.getElementById('up ' + id).childNodes[0].src = "{{ url('/images/up.png') }}";
                    document.getElementById('down ' + id).childNodes[0].src = "{{ url('/images/down.png') }}";
                }
            }
        }

        xhttp.open("GET", id + "/upvote", true);
        xhttp.send();
    }

    function downvote(value) {
        var id = value.id.split(' ')[1];
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var data = JSON.parse(xhttp.response);
                document.getElementById('comment ' + id).innerHTML = data['points'];
                if (data['user_vote'] == -1) {
                    document.getElementById('down ' + id).childNodes[0].src = "{{ url('/images/down-toggle.png') }}";
                } else {
                    document.getElementById('up ' + id).childNodes[0].src = "{{ url('/images/up.png') }}";
                    document.getElementById('down ' + id).childNodes[0].src = "{{ url('/images/down.png') }}";
                }
            }
        }

        xhttp.open("GET", id + "/downvote", true);
        xhttp.send();
    }

    function postUpvote(value) {
        var id = value.id.split(' ')[1];
        console.log(id)
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                //console.log(value.id);
                var data = JSON.parse(xhttp.response);
                document.getElementById('post_point ' + id).innerHTML = data['points'];
                if (data['user_vote'] == 1) {
                    document.getElementById('upimg' + id).src = "{{ url('/images/up-toggle.png') }}";
                    document.getElementById('downimg' + id).src = "{{ url('/images/down.png') }}";
                } else {
                  document.getElementById('upimg' + id).src = "{{ url('/images/up.png') }}";
                  document.getElementById('downimg' + id).src = "{{ url('/images/down.png') }}";
                }
            }
        }

        xhttp.open("GET", id + "/postupvote", true);
        xhttp.send();
    }

    function postDownvote(value) {

        var id = value.id.split(' ')[1];
        var xhttp2 = new XMLHttpRequest();
        xhttp2.onreadystatechange = function() {
            if (xhttp2.readyState == 4 && xhttp2.status == 200) {

                var data = JSON.parse(xhttp2.response);
                document.getElementById('post_point ' + id).innerHTML = data['points'];
                if (data['user_vote'] == -1) {
                    document.getElementById('downimg' + id).src = "{{ url('/images/down-toggle.png') }}";
                    document.getElementById('upimg' + id).src = "{{ url('/images/up.png') }}";
                } else {
                    document.getElementById('upimg' + id).src = "{{ url('/images/up.png') }}";
                    document.getElementById('downimg' + id).src = "{{ url('/images/down.png') }}";
                }
            }
        }
        console.log(id);
        xhttp2.open("GET", id + "/postdownvote", true);
        xhttp2.send();
    }

    function deleteComment(value) {
        var id = value.id.split(' ')[2];
        var post_id = value.id.split(' ')[1];
        var element = document.getElementById("" + id);
        element.parentNode.removeChild(element);
        var xhttp2 = new XMLHttpRequest();
        console.log(post_id + "-" + id);

        xhttp2.open("GET", post_id + "/delete_comment/" + id, true);
        xhttp2.send();
    }

    function deletePost(value) {
        location.href = value + "/delete_post";
    }
</script>

<script type="text/javascript" src="{{ url('js/forum.js') }}"></script>
<div class="container" style="margin-top: 60px">
  <div class="row" style="margin-top: 20px">
    <div class="col-md-10">

      <div class="post-container" >
        <div class="post" style="padding-bottom: 15px">
          <div class="media">
            <div class="media-left" style="padding-right: 25px" >
              <div style="display: block; text-align: center">
                <!-- upvote and downvote -->
                  <div style="display: block;">
                    <div class="btn-group-vertical ">
                      <button onclick="postUpvote(this)" id="postup {{$post->post_id}}" style="background-color:Transparent;border:none;cursor:pointer;outline:none"><img <?php if($post->vote==1){ echo "src=".URL::asset("images/up-toggle.png");}else{ echo "src=".URL::asset("images/up.png");} ?>  alt="up" width="30" height="30" id="upimg{{$post->post_id}}"/></button>
                      <p style="text-align:center;margin-bottom: 0px;" id="post_point {{$post->post_id}}"> {{$post->points}} </p>
                      <button onclick="postDownvote(this)" id="postdown {{$post->post_id}}" style="background-color:Transparent;border:none;cursor:pointer;outline:none"><img <?php if($post->vote==-1){ echo "src=".URL::asset("images/down-toggle.png");}else{ echo "src=".URL::asset("images/down.png");} ?>  alt="down" width="30" height="30" id="downimg{{$post->post_id}}" /></button>
                    </div>
                  </div>
              </div>
            </div>
            <div class="media-body" style="">
              <h3 class="media-heading" style="margin-top: 10px">
                <a href="#">{{$post->post_title}}</a>
                <span style="font-size: small; color: #888">
                  <span style="font-size: medium; background-color: {{$post->category_color}}; border-radius: 3px; color: rgb(255, 255, 255) !important; margin-left: 10px; padding: 5px">{{$post->category_name}}</span>
                </span>
              </h3>
              <h5>submitted by: <a href="#">{{$post->username}}</a> on <a href="#">{{ date("F j", strtotime($post->created_at)) }}</a></h5>
              <p id="post-content" data-target="1" class="post-content" style="background-color: #E3E3E6; padding: 5px; border-radius: 2px; margin-top: 10px; height: 75px; overflow: hidden">
                {{$post->post_content}}
              </p>
              @if($post->submitter_id == Auth::User()->id )
              <!-- Trigger the modal with a button -->
              <a data-toggle="modal" data-target="#postModal" style="cursor:pointer">Delete</a>
                <!-- Modal -->
                <div class="modal fade" id="postModal" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-body">
                        <p class="text-center">Are you sure you want to delete this post?</p>
              		  <div class="text-center">
              		  <button class="btn btn-default" data-dismiss="modal" onclick="deletePost({{$post->post_id}})"> Yes </button>
              		  <button class="btn btn-default" data-dismiss="modal"> No</button>
              		  </div>
                      </div>

                    </div>

                  </div>

              </div>
              @endif
              <div style="margin-top: 5px;border-bottom: 2px #D4D4D8 solid !important"></div>
              <div class="comment-on-post" style="margin-top: 20px">
                <form action="{{ url('/comment')}}" method="post">
                {!! csrf_field() !!}
                  <div class="form-group">
                    <textarea class="form-control" style="height:75px" placeholder="Reply" name="content"></textarea>
                    <input type="hidden" value="{{$post->post_id}}" name="post_id"/>
                  </div>
                    <div class="col-md-6" style="padding-left: 0px">
                      <h4 ><span id="post-replies">{{$post->reply_count}} replies</span></h4>
                    </div>
                    <div class="col-md-6" style="margin-top: -10px;padding-right: 0px">
                      <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
                <div class="individual-comments" style="margin-top: 50px">
                @foreach($comments as $c)
                  <div class="comment-1" style="width: inherit; display: flex; margin-top: 30px" id ='{{$c->id}}'>
                    <!-- upvote and downvote-->
                    <div style="display: block;">
                      <div class="btn-group-vertical ">
                        <button onclick="upvote(this)" id="up {{$c->id}}" style="background-color:Transparent;border:none;cursor:pointer;outline:none"><img <?php if($c->vote==1){ echo "src=".URL::asset("images/up-toggle.png");}else{ echo "src=".URL::asset("images/up.png");} ?>  alt="up" width="30" height="30" /></button>
                          <br />
                        <button onclick="downvote(this)" id="down {{$c->id}}" style="background-color:Transparent;border:none;cursor:pointer;outline:none"><img <?php if($c->vote==-1){ echo "src=".URL::asset("images/down-toggle.png");}else{ echo "src=".URL::asset("images/down.png");} ?>  alt="up" width="30" height="30" /></button></div>
                    </div>
                    <div class="comment-reply" style="width: inherit; margin-left: 20px; margin-top: 10px">
                      <h5>
                        <a href="#">
                          {{$c->username}}
                        </a>
                        <span style="font-size: small; color: rgb(168, 168, 168)" id="comment {{$c->id}}">{{$c->points}}</span><span> points</span>
                        <span style="font-size: x-small; color: rgb(168, 168, 168)">{{$c->elapsed}}</span>
                      </h5>
                      <p>
                        {{$c->content}}
                      </p>
                      @if($c->user_id == Auth::User()->id )
                      <!-- Trigger the modal with a button -->
                      <a data-toggle="modal" data-target="#myModal{{$c->id}}" style="cursor:pointer">Delete</a>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal{{$c->id}}" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-body">
                                  <p class="text-center">Are you sure you want to delete this comment?</p>
                        		  <div class="text-center">
                        		  <button class="btn btn-default" data-dismiss="modal" onclick="deleteComment(this)" id="delete {{$post->post_id}} {{$c->id}}">Yes</button>
                        		  <button class="btn btn-default" data-dismiss="modal"> No</button>
                        		  </div>
                                </div>

                              </div>

                            </div>
                        </div> @endif
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar Do Not Tocuh -->
    <div class="col-md-2">
      <div class="forum-options">
        <div>
          <form  role="search" action="{{ url('/forum') }}" method="post">
    				<div class="input-group">
              {!! csrf_field() !!}
    					<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term"/>
    						<span class="input-group-btn">
    							<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
    						</span>
    				</div>
		      </form>
	      </div>
        <br/>
        <a href="{{ url('/forum')}}"><button class="btn btn-primary btn-block">Home</button></a>
        <br/>
        <a href="{{ url('/forum/new_post')}}"><button class="btn btn-primary btn-block">New Post</button></a>
        <br/>
      </div>
    </div>
  </div>
</div>
@endsection
