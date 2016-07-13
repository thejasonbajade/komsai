@extends('profile')
@section('rightPanel')	
<h1 id="classTitle">{{ $classDetails[0]->subject_name }} (Section{{ $classDetails[0]->section }}) - File Uploads from Students</h1>
<table class = "table table-bordered">
	<thead>
		<th>File</th>
		<th>Uploader</th>
		<th>Date Uploaded</th>
	</thead>
	<tbody>
		@foreach($uploads as $upload)
			<tr>
				<td><a href="{{url('')}}/files/{{ $upload->filename }}" target="_blank">{{ $upload->filename }}</a></td>
				<td>{{ $upload->firstname }} {{ $upload->lastname }}</td>
				<td>{{ $upload->date_uploaded }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<a href="{{ url('') }}/{{ $nameUrl }}/{{ $classDetails[0]->subject_name }} {{ $classDetails[0]->section }}?class_id={{$classId}}">Back...</a>
@endsection