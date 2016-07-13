
@extends('layouts.app')
@section('content')
<script type="text/javascript">
    window.onload = function (){
      document.getElementById("uploads").style="display:none;";
      document.getElementById("showUpload").onclick=function(){
        document.getElementById("panel1").style="display:none;";
        document.getElementById("uploads").style="display:block;";
      }
    }
  </script>
<!-- start templatemo team -->
  <section id="team" class="text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <h2 id = "header">KOMSAI FACULTY</h2>
          <p id = "year">A.Y. 2015-2016</p>
        </div>
        @foreach($users as $user)
        <div class="modal fade" id="{{$user->firstname}}" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">
                  {{$user->firstname}}
                  {{$user->lastname}}
                </h3>
                <p>Instructor I</p>
              </div>
              <div class="modal-body">
                <table class = table table-bordered>
                  <h3>Schedule</h3>
                  <thead>
                    <tr>
                      <th style="text-align:center">Subject</th>
                      <th style="text-align:center">Day</th>
                      <th style="text-align:center">Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($schedule as $sched)
                      @if($user->id == $sched->user_id)
                        <tr>
                          <td>{{ $sched->subject_name }}</td>
                          <td>{{ $sched->day }}</td>
                          <td>{{ $sched->time }}</td>
                        </tr>  
                      @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                @if(Auth::user()->usertype_id == 1)
                <a href="{{  url('studentProfile/facultyFeedback') }}"><button type="button" class="btn btn-default">Give Feedback</button></a>
                @endif
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div class="col-md-12">
        @foreach ($users as $user)
        <div class="col-sm-6 col-md-3">
          <img src="{{url('')}}/images/{{ $user->firstname }}.jpg" class="img-responsive" alt="Profile Picture" data-toggle="modal" data-target="#{{$user->firstname}}">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#{{$user->firstname}}">
              {{ $user->firstname }}
              {{ $user->lastname }}
          </button>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- end templatemo team -->
  <!-- start back to top -->
  <a href="#top" class="go-top"><i class="fa fa-chevron-up fa-1x"></i></a>
  <!-- end back to top -->
  
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/smoothscroll.js"></script>
  <script src="js/jquery.flexslider.js"></script>

  <!-- start templatemo back to top js -->
  <script>
    $(document).ready(function() {
      // FlexSlider 
        $('.flexslider').flexslider({
          animation: "fade",
          directionNav: false
        });

      // Show or hide the sticky footer button
      $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
          $('.go-top').fadeIn(200);
        } else {
          $('.go-top').fadeOut(200);
        }
      });   
      // Animate the scroll to top
      $('.go-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 300);
      })
    });
  </script>
  <!-- end templatemo back to top js -->

@endsection