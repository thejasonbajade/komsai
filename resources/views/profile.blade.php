@extends('layouts.app')

@section('content')	
<div class="container-fluid" >
	<div class="row">
		<div class="col-md-3 col-xs-3 remove-padding" id="leftPanel">
			<div class="col-md-12 remove-padding">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default" id="profileDiv">
						<div class="panel-collapse collapse in" role="tabpanel" id="profileInfo">
							<div>
								<div class="col-md-8 col-md-offset-2">
									<img src="{{ url('images') }}/{{Auth::user()->filename}}.{{Auth::user()->filetype}}" class="img-responsive img-circle"/>
									<br/>
								</div>
								<a href="{{ url('') }}/{{ $nameUrl }}"><h4 id="username">{{ $name }}</h4></a>
								<table id="infoTable">
									<tr>
										@if(Auth::user()->usertype_id == 1)
											<td> Student Number </td>
										@elseif(Auth::user()->usertype_id == 2)
											<td> Faculty Number </td>
										@elseif(Auth::user()->usertype_id == 3)
											<td> Alumni Number </td>
										@endif
										<td>{{ Auth::user()->user_number }}</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					@if(Auth::user()->usertype_id != 3)
					<div class="panel panel-default vertical-nav active" >
						<div class="panel-heading remove-radius active" role="tab"> 
							<a data-toggle="collapse" data-parent="#accordion" href="#classesList" id="classes">
								<h5><span class="glyphicon glyphicon-list-alt">
									</span> Classes <span class="badge">5</span><span class="caret pull-right"></span>
								</h5>
							</a>
						</div>
						<div class="panel-collapse collapse" role="tabpanel" id="classesList">
							<div>
								@if(Auth::user()->usertype_id == 1)
									 @foreach($results as $result)
											@if($result->status  == 1)
												<a href="{{ url('') }}/{{ $nameUrl }}/{{$result->subject_name }} {{$result->section }}?class_id={{ $result->class_id }}" class="list-group-item">{{ $result->subject_name }} (Section{{ $result->section }})</a>
											@else
												<a class="list-group-item">{{ $result->subject_name }} (Section{{ $result->section }}) <small class="pull-right">Pending</small></a>
											@endif
									 @endforeach
										<a href="{{ url('') }}/{{ $nameUrl }}/addClass" class="list-group-item">Add Class...</a>
								@elseif(Auth::user()->usertype_id == 2)
									@foreach($results as $result)
										<a href="{{ url('') }}/{{ $nameUrl }}/{{$result->subject_name }} {{$result->section }}?class_id={{ $result->class_id }}" class="list-group-item">{{ $result->subject_name }} (Section {{ $result->section }})</a>
									@endforeach
										<a href="{{ url('') }}/{{ $nameUrl }}/createClass" class="list-group-item">Create Class...</a>
								@endif
							</div>
						</div>
					</div>
					<div class="panel panel-default vertical-nav">
						<div class="panel-heading remove-radius" role="tab">
							@if(Auth::user()->usertype_id == 1)
								<a href="{{ url('') }}/{{ $nameUrl }}/studyPlan"><h5><span class="glyphicon glyphicon-book"></span> Study Plan</h5></a> 
							@elseif(Auth::user()->usertype_id == 2)
								<a href="{{ url('') }}/{{ $nameUrl }}/inbox"><h5><span class="glyphicon glyphicon-envelope"></span> Feedback from Students </h5></a> 
							@endif
						</div>
					</div>
					<div class="panel panel-default vertical-nav">
						<div class="panel-heading" role="tab"> 
							@if(Auth::user()->usertype_id == 1)
								<a href="{{ url('') }}/{{ $nameUrl }}/updateProfile"><h5><span class="glyphicon glyphicon-user"></span> Update Profile</h5></a> 
							@elseif(Auth::user()->usertype_id == 2)
								<a href="{{ url('') }}/{{ $nameUrl }}/updateProfile"><h5><span class="glyphicon glyphicon-user"></span> Update Profile</h5></a> 
							@endif
						</div>
				</div>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-9 col-xs-12 col-md-offset-3 col-xs-offset-0 remove-padding right-panel">
			<div class="col-md-12">
				@yield('rightPanel')
			</div>
		</div>
	</div>
</div>
@endsection