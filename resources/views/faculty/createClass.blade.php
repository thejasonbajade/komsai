@extends('profile')
@section('rightPanel')
<div class="col-md-12 col-xs-12 col-xs-offset-0 remove-padding" id="rightPanel">
	<div class="col-md-12" id="rightPanelContent">
		<div class="col-md-12 col-xs-12 remove-padding">
			<h1 id="classTitle">Add Class</h1>
			<form role="form" action="#" method="GET">
				<div class="col-md-6">
					<div class="form-group">
					<select name="schoolYear" class="form-control">
						<option selected="selected" disabled="disabled">School Year</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
					</select>
				</div>
				<div class="form-group">
					<label for="subject">Subject:</label>
					<select name="subject" class="form-control">
						<option selected="selected" disabled="disabled">Subject</option>
						@foreach($listOfSubjects as $subject)
						<option value="{{$subject->subject_id}}">{{ $subject->subject_name }} - {{ $subject->subject_title }}</option>
					
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="day">Day:</label>
					<input type="text" class="form-control" id="day" name="day" placeholder="MTh">
				</div>

				<div class="form-group">
					<label for="time">Time:</label>
					<input type="text" class="form-control" id="time" name="time" placeholder="7:30-8:00">
				</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					<select name="semester" class="form-control">
						<option selected="selected" disabled="disabled">Semester</option>
						<option value="1">1st</option>
						<option value="2">2nd</option>
					</select>
				</div>

				<div class="form-group">
					<label for="day">Section:</label>
					<input type="text" name="section" class="form-control" placeholder="1">
				</div>

				<div class="form-group">
					<label for="roomAssignment">Room Assignment:</label>
					<input type="text" class="form-control" name="roomAssignment" placeholder="CL 2">
				</div>
				<input type="submit" name="submit" class="btn btn-primary" style="margin-top:25px;" value="Add"/>
				</div>
				

				
			</form>
		</div>
	</div>
</div>
@endsection