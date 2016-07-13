@extends('profile')
@section('rightPanel')	
<div class="col-md-12 col-xs-12 col-xs-offset-0 remove-padding" id="rightPanel">
	<div class="col-md-12" id="rightPanelContent">
		<h1 id="classTitle">{{ $classDetails[0]->subject_name }} (Section {{ $classDetails[0]->section }}) - Upload Grades</h1>
		<div class="col-md-10 col-xs-12 col-md-offset-1 remove-padding">
			<form action="{{ url('') }}/{{ $nameUrl }}/{{ $classDetails[0]->subject_name }} {{ $classDetails[0]->section }}/sendGrades?class_id={{$classId}}" method="POST" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<table class="table table-bordered">
					<thead>
						<th>Student Number</th>
						<th>Name</th>
						<th>Final Grade</th>
					</thead>
					<tbody>
						@foreach ($grades as $grade)
						<tr>
							<td>{{$grade->user_number}} <input type="hidden" name="student_number[]" value="{{$grade->user_id}}"/></td>
							<td>{{$grade->lastname}}, {{$grade->firstname}}</td>
							<td>
								<select name="grades[]" class="form-control">
									<option value="---" <?php if($grade->grade=='') echo 'selected' ?> >---</option>
									<option value="1.0" <?php if($grade->grade=='1.0') echo 'selected' ?> >1.0</option>
									<option value="1.25" <?php if($grade->grade=='1.25') echo 'selected' ?>>1.25</option>
									<option value="1.5" <?php if($grade->grade=='1.5') echo 'selected' ?>>1.5</option>
									<option value="1.75" <?php if($grade->grade=='1.75') echo 'selected' ?>>1.75</option>
									<option value="2.0" <?php if($grade->grade=='2.0') echo 'selected' ?>>2.0</option>
									<option value="2.25" <?php if($grade->grade=='2.25') echo 'selected' ?>>2.25</option>
									<option value="2.5" <?php if($grade->grade=='2.5') echo 'selected' ?>>2.5</option>
									<option value="2.75" <?php if($grade->grade=='2.75') echo 'selected' ?>>2.75</option>
									<option value="3.0" <?php if($grade->grade=='3.0') echo 'selected' ?>>3.0</option>
									<option value="4.0" <?php if($grade->grade=='4.0') echo 'selected' ?>>4.0</option>
									<option value="5.0" <?php if($grade->grade=='5.0') echo 'selected' ?>>5.0</option>
									<option value="INC" <?php if($grade->grade=='INC') echo 'selected' ?>>INC</option>
									<option value="DRP" <?php if($grade->grade=='DRP') echo 'selected' ?>>DRP</option>
								</select>
						</tr>
						<input type="hidden" name="class_id" value="{{$grade->class_id}}"/>
						@endforeach
					</tbody>
				</table>

				<a href="{{ url('') }}/{{ $nameUrl }}/{{ $classDetails[0]->subject_name }} {{ $classDetails[0]->section }}?class_id={{$classId}}" class="btn btn-primary" role="button" style="color: white;">Back to Class</a>
				<input type="submit" class="btn btn-primary" role="button"/>
			</form>
		</div>
	</div>
</div>
@endsection