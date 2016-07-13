@extends('layouts.app')
@section('content')
<script>
function postUpvote(value) {
    var id = value.id.split(' ')[1];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //console.log(value.id);
            var data = JSON.parse(xhttp.response);
            document.getElementById('post_point ' + id).innerHTML = data['points'];
            if (data['user_vote'] == 1) {
                document.getElementById('upimg ' + id).src = "{{ url('/images/up-toggle.png') }}";
            } else {
              document.getElementById('upimg ' + id).src = "{{ url('/images/up.png') }}";
              document.getElementById('downimg ' + id).src = "{{ url('/images/down.png') }}";
            }
            console.log(data['points']);
        }
    }

    xhttp.open("GET", "forum/" + id + "/postupvote", true);
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
                document.getElementById('downimg ' + id).src = "{{ url('/images/down-toggle.png') }}";
            } else {
                document.getElementById('upimg ' + id).src = "{{ url('/images/up.png') }}";
                document.getElementById('downimg ' + id).src = "{{ url('/images/down.png') }}";
            }

        }
    }
    console.log(id);
    xhttp2.open("GET", "forum/" + id + "/postdownvote", true);
    xhttp2.send();
}

function deletePost(value) {
    var element = document.getElementById("post " + value);
    element.parentNode.removeChild(element);
    var xhttp2 = new XMLHttpRequest();
    console.log(value);

    xhttp2.open("GET", "forum/"+value + "/delete_post", true);
    xhttp2.send();
}
</script>
<script type="text/javascript" src="{{ url('js/forum.js') }}"></script>
<div class="container" style="margin-top: 60px">
  <div class="row">
    <div class="col-md-10">
      <ul class="nav nav-pills">
        <li role="presentation"
            <?php if(strcmp($orderby, "created_at")==0) echo "class='active'"?>>
        <a href="?srch-term={{$keyword}}&orderby=created_at&category={{$category}}">New
        </a>
        </li>
      <li role="presentation"
          <?php if(strcmp($orderby, "points")==0) echo "class='active'"?>>
      <a href="?srch-term={{$keyword}}&orderby=points&category={{$category}}">Top
      </a>
      </li>
    <li role="presentation"
        <?php if(strcmp($orderby, "reply_count")==0) echo "class='active'"?>>
    <a href="?srch-term={{$keyword}}&orderby=reply_count&category={{$category}}">Hot
    </a>
    </li>
  <li role="presentation" class="dropdown pull-right">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Category
      <span class="caret">
      </span>
    </a>
    <ul class="dropdown-menu">
      <li>
        <a href="?srch-term={{$keyword}}&orderby=points&category=All">All
        </a>
      </li>
      @foreach($categories as $c)
      <li>
        <a href="?srch-term={{$keyword}}&orderby=points&category={{$c->category_name}}">{{$c->category_name}}
        </a>
      </li>
      @endforeach
    </ul>
  </li>
  </ul>
<div class="post-container" style="margin-top: 20px">
  @foreach ($posts as $post)
  <div class="post" id="post {{ $post->post_id }}" style="border-bottom: 1px solid rgba(43,42,62,0.2); padding-bottom: 15px">
    <div class="media">
      <div class="media-left" style="padding-right: 25px">
        <div style="display: block;">
          <div class="btn-group-vertical ">
            <button onclick="postUpvote(this)" id="postup {{$post->post_id}}" style="background-color:Transparent;border:none;cursor:pointer;outline:none">
              <img
                   <?php if($post->vote==1){ echo "src=".URL::asset("images/up-toggle.png");}else{ echo "src=".URL::asset("images/up.png");} ?> alt="up" width="30" height="30" id="upimg {{$post->post_id}}"/>
            </button>
            <p style="text-align:center;margin-bottom: 0px;" id="post_point {{$post->post_id}}"> {{$post->points}}
            </p>
            <button onclick="postDownvote(this)" id="postdown {{$post->post_id}}" style="background-color:Transparent;border:none;cursor:pointer;outline:none">
              <img
                   <?php if($post->vote==-1){ echo "src=".URL::asset("images/down-toggle.png");}else{ echo "src=".URL::asset("images/down.png");} ?> alt="up" width="30" height="30" id="downimg {{$post->post_id}}" />
            </button>
          </div>
        </div>
      </div>
      <div class="media-body" style="margin-left: 120px">
        <h3 class="media-heading" style="margin-top: 10px">
          <a href="forum/{{$post->post_id}}">{{$post->post_title}}
          </a>
          <span style="font-size: medium; background-color: {{$post->category_color}}; border-radius: 3px; color: rgb(255, 255, 255) !important; margin-left: 10px; padding: 5px">{{$post->category_name}}
          </span>
        </h3>
        <h5>submitted by:
          <a href="#">{{ $post->username }}
          </a> on
          <a href="#">{{ date("F j", strtotime($post->created_at)) }}
          </a>
        </h5>
        <p id="post-content" data-target="1" class="post-content" style="background-color: #E3E3E6; padding: 10px; border-radius: 2px; margin-top: 10px; height: 75px; overflow: hidden; font-size: 20px">
          {{ $post->post_content }}
        </p>
        <a href="#">{{ $post->reply_count }} replies
        </a> @if($post->submitter_id == Auth::user()->id)
        <!-- Trigger the modal with a button -->
        <a data-toggle="modal" data-target="#postModal{{$post->post_id}}" style="cursor:pointer">Delete
        </a>
        <div class="container">
          <!-- Modal -->
          <div class="modal fade" id="postModal{{$post->post_id}}" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-body">
                  <p class="text-center">Are you sure you want to delete this post?
                  </p>
                  <div class="text-center">
                    <button class="btn btn-default" data-dismiss="modal" onclick="deletePost({{$post->post_id}})">Yes
                    </button>
                    <button class="btn btn-default" data-dismiss="modal"> No
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
<div class="col-md-2">
  <div class="forum-options">
    <div>
      <form role="search" action="{{ url('/forum') }}" method="post">
        <div class="input-group">
          {!! csrf_field() !!}
          <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term" />
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </button>
          </span>
        </div>
      </form>
    </div>
    <br/>
    <a href="{{ url('/forum')}}">
      <button class="btn btn-primary btn-block">Home
      </button>
    </a>
    <br/>
    <a href="{{ url('/forum/new_post')}}">
      <button class="btn btn-primary btn-block">New Post
      </button>
    </a>
    <br/>
    <h4>{{$header}}
    </h4>
  </div>
</div>
</div>
</div>

@endsection
