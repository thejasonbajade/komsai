@extends('profile')
@section('rightPanel')
<div class="col-md-12 col-xs-12 col-xs-offset-0 remove-padding" id="rightPanel">
	<div class="col-md-12" id="rightPanelContent">
		<h1 id="classTitle">{{ $classDetails[0]->subject_name }} (Section {{ $classDetails[0]->section }}) - Class Requests</h1>
		<div class="col-md-12 remove-padding">
			
			<table class = "table table-bordered">
					<th>Student Number</th>
					<th>Name</th>
					<th>Action</th>
					@foreach($classRequests as $classRequest)
						<form method="get" action="{{ url('') }}/{{ $nameUrl }}/{{ $classInfo[0]->subject_name }} {{$classInfo[0]->section }}/classRequests">
							<input type="hidden" name="class_id" value="{{ $classId }}">
							<input type="hidden" name="studentId" value="{{ $classRequest->id }}">
							<tr>
								<td>{{ $classRequest->user_number }}</td>
								<td>{{ $classRequest->firstname }} {{ $classRequest->middlename }} {{ $classRequest->lastname }}</td>
								<td><button class="btn btn-primary" role="button" name="accept" value="1" style="margin-right: 4px">Accept</button><button class="btn btn-primary" role="button" name="decline" value="0">Decline</button></td>
							</tr>
						</form>
					@endforeach
			</table>
			<a href="{{ url('') }}/{{ $nameUrl }}/{{ $classInfo[0]->subject_name }} {{$classInfo[0]->section}}?class_id={{ $classId }}" class="btn btn-primary" role="button" style="color: white;">Back to Class</a>
		</div>
	</div>
</div>
@endsection