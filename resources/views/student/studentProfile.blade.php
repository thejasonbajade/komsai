@extends('profile')

@section('profile')	
<div class="container-fluid" >
	<div class="row">
		<div class="col-md-3 col-xs-3 remove-padding" id="leftPanel">
			<div class="col-md-12 remove-padding">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default" id="profileDiv">
						<div class="panel-collapse collapse in" role="tabpanel" id="profileInfo">
							<div>
								<div class="col-md-8 col-md-offset-2">
									<img src="{{ url('images/ivanPP.png') }}" class="img-responsive"/>
								</div>
								<a href="{{ url('') }}/{{ $nameUrl }}"><h4 id="username">{{ $name }}</h4></a>
								<table id="infoTable">
									<tr>
										<td>Student ID</td>
										<td>2013-XXXXX</td>
									</tr>
									<tr>
										<td>Year Level</td>
										<td>3</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="panel panel-default vertical-nav active" >
						<div class="panel-heading remove-radius active" role="tab"> 
							<a data-toggle="collapse" data-parent="#accordion" href="#classesList" id="classes">
								<h5><span class="glyphicon glyphicon-list-alt">
									</span> Classes <span class="caret pull-right"></span> <span class="badge pull-right">1</span> 
								</h5>
							</a>
						</div>
						<div class="panel-collapse collapse" role="tabpanel" id="classesList">
							<div>
								@if(Auth::user()->usertype_id == 1) //Student
									 @foreach($results as $result)
											@if($result->status  == 1)
												<a href="{{ url('studentProfile') }}/{{$result->subject_name }} {{$result->section }}" class="list-group-item">{{ $result->subject_name }} (Section{{ $result->section }})</a>
											@else
												<a class="list-group-item">{{ $result->subject_name }} (Section{{ $result->section }}) <small class="pull-right">Pending</small></a>
											@endif
									 @endforeach
										<a href="{{ url('/studentProfile/addClass') }}" class="list-group-item">Add Classes</a>
								@endif
							</div>
						</div>
					</div>
					<div class="panel panel-default vertical-nav">
						<div class="panel-heading remove-radius" role="tab"> 
							<a href="{{ url('studentProfile/studyPlan')}}"><h5><span class="glyphicon glyphicon-book"></span> Study Plan</h5></a> 
						</div>
					</div>
					<div class="panel panel-default vertical-nav">
						<div class="panel-heading" role="tab"> 
							<a href="{{ url('studentProfile/update') }}"><h5><span class="glyphicon glyphicon-user"></span> Update Profile</h5></a> 
						</div>
				</div>
				</div>
			</div>
			</div>
			<button class="btn btn-success" id="left-show-btn"> Show panel </button>
		<div class="col-md-9 col-xs-12 col-md-offset-3 col-xs-offset-0 remove-padding right-panel">
			<div class="col-md-12">
				@yield('rightPanel')
			</div>
		</div>
	</div>
</div>
@endsection