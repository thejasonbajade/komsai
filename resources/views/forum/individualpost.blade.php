@extends('layouts.app')
@section('content')
<script type="text/javascript" src="{{ url('js/forum.js') }}"></script>
<div class="container" style="margin-top: 60px">

  <div class="row" style="margin-top: 20px">
    <div class="col-md-10">

      <div class="post-container">
        <div class="post" style="padding-bottom: 15px">
          <div class="media">
            <div class="media-left" style="padding-right: 25px">
              <div style="display: block; text-align: center">
                <a href="#" id="upvotePost">
                  <img src="{{ url('images/up.png') }}" alt="" width="30" height="30"/>
                </a>

                <p style="margin-bottom: 0px;" id="post-points">11</p>

                <a href="#" id="downvotePost">
                  <img src="{{ url('images/down.png') }}" alt="" width="30" height="30"/>
                </a>

              </div>
            </div>
            <div class="media-body" style="margin-left: 120px">
              <h3 class="media-heading" style="margin-top: 10px">
                <a href="#">What do you mean Justn Banober</a>
                <span style="font-size: small; color: #888">
                  <a href="#" style="background-color: rgba(43,42,62,0.13); border-radius: 3px; color: rgba(43,42,62,0.8) !important; padding: 2px">Category
                  </a>
                </span>
              </h3>
              <h5>submitted by: <a href="#">username</a> on <a href="#">May 15</a></h5>
              <p id="post-content" data-target="1" class="post-content" style="background-color: #E3E3E6; padding: 5px; border-radius: 2px; margin-top: 10px; height: 75px; overflow: hidden">
                Content Content COntent
              </p>
              <a href="#">Delete Func? here</a>
              <div style="margin-top: 5px;border-bottom: 2px #D4D4D8 solid !important"></div>

              <div class="comment-on-post" style="margin-top: 20px">
                <form>
                  <div class="form-group">
                    <textarea class="form-control" style="height: 75px;"></textarea>
                  </div>
                    <div class="col-md-6" style="padding-left: 0px">
                      <h4>16 Replies</h4>
                    </div>
                    <div class="col-md-6" style="margin-top: -10px;padding-right: 0px">
                      <button type="button" class="btn btn-primary pull-right">Primary</button>
                    </div>
                </form>
                <div class="individual-comments" style="margin-top: 50px">
                  <div class="comment-1" style="width: inherit; display: flex; margin-top: 30px">
                    <div class="arrows" style="text-align: center; width: 35px;">
                      <a href="#" id="upvotePost">
                        <img src="{{ url('images/up.png') }}" alt="" width="30" height="30"/>
                      </a>
                      <a href="#" id="downvotePost">
                        <img src="{{ url('images/down.png') }}" alt="" width="30" height="30"/>
                      </a>
                    </div>
                    <div class="comment-reply" style="width: inherit; margin-left: 20px; margin-top: 10px">
                      <h5>
                        <a href="#">
                          aasd
                        </a>
                        <span style="font-size: small; color: rgb(168, 168, 168)">15 Points</span>
                        <span style="font-size: x-small; color: rgb(168, 168, 168)">May 15</span>
                      </h5>
                      <p>
                        conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content conten content
                      </p>
                      <a href="#">Delete</a>
                    </div>
                  </div>
                  <div class="comment-1" style="width: inherit; display: flex; margin-top: 30px">
                    <div class="arrows" style="text-align: center; width: 35px;">
                      <a href="#" id="upvotePost">
                        <img src="{{ url('images/up.png') }}" alt="" width="30" height="30"/>
                      </a>
                      <a href="#" id="downvotePost">
                        <img src="{{ url('images/down.png') }}" alt="" width="30" height="30"/>
                      </a>
                    </div>
                    <div class="comment-reply" style="width: inherit; margin-left: 20px; margin-top: 10px">
                      <h5>
                        <a href="#">
                          aasd
                        </a>
                        <span style="font-size: small; color: rgb(168, 168, 168)">15 Points</span>
                        <span style="font-size: x-small; color: rgb(168, 168, 168)">May 15</span>
                      </h5>
                      <p>
                        conten content conten content conten content conten content conten content conten content conten content conten
                      </p>
                    </div>
                  </div>
                  <div class="comment-1" style="width: inherit; display: flex; margin-top: 30px">
                    <div class="arrows" style="text-align: center; width: 35px;">
                      <a href="#" id="upvotePost">
                        <img src="{{ url('images/up.png') }}" alt="" width="30" height="30"/>
                      </a>
                      <a href="#" id="downvotePost">
                        <img src="{{ url('images/down.png') }}" alt="" width="30" height="30"/>
                      </a>
                    </div>
                    <div class="comment-reply" style="width: inherit; margin-left: 20px; margin-top: 10px">
                      <h5>
                        <a href="#">
                          aasd
                        </a>
                        <span style="font-size: small; color: rgb(168, 168, 168)">15 Points</span>
                        <span style="font-size: x-small; color: rgb(168, 168, 168)">May 15</span>
                      </h5>
                      <p>
                        content content content content content content content content
                      </p>
                      <a href="#">Delete</a>
                    </div>
                  </div>
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
      </div>
    </div>
  </div>
</div>
@endsection
