@extends('profile')

@section('profile')	
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 col-xs-3 remove-padding" id="leftPanel">
			<div class="col-md-12 remove-padding">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default" id="profileDiv">
						<div class="panel-collapse collapse in" role="tabpanel" id="profileInfo">
							<div>
								<div class="col-md-8 col-md-offset-2">
									<img src="{{ url('images/ivanPP.png')}}" class="img-responsive"/>
								</div>
								<h4 id="username">DANGAN, CHREVIC JOSEF</h4>
								<table id="infoTable">
									<tr>
										<td>Instructor 1</td>
										<td>2011-XXXXX</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="panel panel-default vertical-nav active" >
						<div class="panel-heading remove-radius active" role="tab"> 
							<a data-toggle="collapse" data-parent="#accordion" href="#classesList" id="classes">
								<h5><span class="glyphicon glyphicon-list-alt">
								</span> Classes <span class="caret pull-right"></span>
							</h5>
						</a>
					</div>
					<div class="panel-collapse collapse" role="tabpanel" id="classesList">
						<div>
							<a href="{{ url('') }}/facultyProfile/CMSC11Section1" class="list-group-item">CMSC 11 (Section 1)</a>
							<a href="" class="list-group-item">CMSC 11 (Section 2)</a>
							<a href="" class="list-group-item">CMSC 198.1 (Section 1)</a>
							<a href="" class="list-group-item">CMSC 198.1 (Section 2)</a>
							<a href="" class="list-group-item">CMSC 127 (Section 1)</a>
							<a href="" class="list-group-item">CMSC 127 (Section 2)</a>
							<a href="" class="list-group-item">CMSC 198.1 (Section 1)</a>
							<a href="" class="list-group-item">CMSC 198.1 (Section 2)</a>
							<a href="" class="list-group-item">CMSC 127 (Section 1)</a>
							<a href="" class="list-group-item">CMSC 127 (Section 2)</a>
							<a href="{{ url('') }}/facultyProfile/addClass" class="list-group-item">Add Class...</a>
						</div>
					</div>
				</div>
				<div class="panel panel-default vertical-nav">
					<div class="panel-heading" role="tab"> 
						<a href="{{ url('') }}/facultyProfile/updateProfile"><h5><span class="glyphicon glyphicon-user"></span> Update Profile</h5></a> 
					</div>
				</div>
				<div class="panel panel-default vertical-nav">
					<div class="panel-heading remove-radius" role="tab"> 
						<a href="{{ url('/facultyProfile/inbox') }}"><h5><span class="glyphicon glyphicon-envelope"></span> Feedback from Students </h5></a> 
					</div>
				</div>
			</div>
		</div>
	</div>
	<button class="btn btn-success" id="left-show-btn"> Show panel </button>
	<div class="col-md-9 col-xs-12 col-md-offset-3 col-xs-offset-0 remove-padding right-panel">
		<div class="col-md-12">
			@yield('rightPanel')
			@yield('uploadGrades')
			@yield('inbox')
			@yield('updateProfile')
			@yield('fileUploadsFromStudents')
			@yield('myFileUploads')
			@yield('addClass')
			@yield('classRequests')
		</div>
	</div>
</div>
</div>
@endsection