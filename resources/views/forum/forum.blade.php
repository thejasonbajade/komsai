@extends('layouts.app')
@section('content')
<script type="text/javascript" src="{{ url('js/forum.js') }}"></script>
<div class="container" style="margin-top: 60px">

  <div class="row">
    <div class="col-md-10">

      <ul class="nav nav-pills">
        <li role="presentation" class="active"><a href="#">Hot</a></li>
        <li role="presentation"><a href="#">New</a></li>
        <li role="presentation"><a href="#">Top</a></li>
        <li role="presentation" class="dropdown pull-right">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Category <span class="caret"></span> </a>

          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>

      <div class="post-container" style="margin-top: 20px">

        @foreach ($posts as $post)
        <div class="post" id="post-id-{{ $post->post_id }}" style="border-bottom: 1px solid rgba(43,42,62,0.2); padding-bottom: 15px">
          <div class="media">
            <div class="media-left" style="padding-right: 25px">
              <div style="display: block; text-align: center">
                <a href="#" id="upvotePost" data-target="{{ $post->post_id }}">
                  <img src="{{ url('images/up.png') }}" alt="" width="30" height="30"/>
                </a>

                <p style="margin-bottom: 0px;" id="post-points">{{ $post->points }}</p>

                <a href="#" id="downvotePost">
                  <img src="{{ url('images/down.png') }}" alt="" width="30" height="30"/>
                </a>

              </div>
            </div>
            <div class="media-body" style="margin-left: 120px">
              <h4 class="media-heading" style="margin-top: 10px">{{ $post->post_title }}<span style="font-size: medium; background-color: {{$post->category_color}}; border-radius: 3px; color: rgb(255, 255, 255) !important; margin-left: 10px; padding: 5px">{{$post->category_name}}</span>
              </h4>
              <h5>submitted by: <a href="#">{{ $post->submitter_id }}</a> on <a href="#">May 15</a></h5>
              <p id="post-content" data-target="1" class="post-content" style="background-color: #E3E3E6; padding: 5px; border-radius: 2px; margin-top: 10px; height: 75px; overflow: hidden">
                {{ $post->post_content }}
              </p>
              <a id="expandContent" data-target="1" href="#" style="position: relative; z-index: 9999; top: -10px; left: 1px; background-color: white; border-radius: 3px; padding-left: 10px; box-shadow: 0 0 0.5em #55547A;"> <span class="glyphicon glyphicon-plus"> click to see more</span></a>
              <br/>
              <a href="#">{{ $post->reply_count }} replies</a>
              <a href="#">Delete Func? here</a>
            </div>
          </div>
        </div>
        @endforeach

      </div>

      <nav>
        <ul class="pager">
          <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
          <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
        </ul>
      </nav>

    </div>

    <div class="col-md-2">
      <div class="forum-options">
        <div class="input-group" style="margin-top: 10px">
          <input class="form-control" aria-label="Text input with multiple buttons" type="text">
            <div class="input-group-btn">
              <button type="button" class="btn btn-default" aria-label="Help">
                <span class="glyphicon glyphicon-serch" style="color: black"></span>
              </button>
            </div>
        </div>
        <br/>
        <a class="btn btn-primary btn-group-justified" href="#" role="button" style="color: white">Home</a>
        <br/>
        <a class="btn btn-primary btn-group-justified" href="#" role="button" style="color: white">New Post</a>
        <br/>
        <h4>Results for: asdasdasd asd asdas asdasd</h4>
      </div>
    </div>
  </div>
</div>
@endsection
