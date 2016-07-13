@extends('student.studentProfile')
@section('rightPanel')
<div class="col-md-10 col-md-offset-1">		
	<h1 id="updateInline">Update Profile</h1>
	<div class="image">						
  	<img id="profilePic" class="img img-responsive img-circle" src="{{ url('images/')}}/{{ $filename }}" alt="Profile Picture" data-toggle="modal" data-target="#myModal"/>	
	</div>
		<form action="{{url('/')}}/{{$nameUrl}}/updateImage" method="post" id="form" enctype="multipart/form-data">
			{!! csrf_field() !!}
			<span class="btn btn-primary btn-file">Browse<input type="file" name="image" onchange="readURL(this)" /></span>
			<div class="middle">
				<label>Contact Number<br/><span id="errorNumber" class="errorMessage">&nbsp;</span><input id="number" type="number" min="0" class="form-control extend" name="contact_number" value="{{$contact_number}}" placeholder="09123456789" /></label>
				<label>Email Address<br/><span id="errorEmail" class="errorMessage">&nbsp;</span><input id="email" type="email" class="form-control extend" placeholder="jagunap@gmail.com" name="email_address" value="{{$email_address}}"/></label>
				<br/><br/>
				<label>UPV Address<br/><span id="errorUpv" class="errorMessage">&nbsp;</span><input id="upv" type="text" class="form-control extend" placeholder="Balay Kanlaon, Miagao, Iloilo" name="upv_address" value="{{$upv_address}}" /></label>
				<label>Home Address<br/><span id="errorHome" class="errorMessage">&nbsp;</span><input id="home" type="text" class="form-control extend" placeholder="Villa Arevalo, Iloilo" name="home_address" value="{{$home_address}}" /></label>
				<br/>
				<input type="submit" value="Submit" class="btn btn-primary buttonMiddle" name="submit"/>
			</div>
		</form>
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-header">
				<button type="button" class="btn btn-default pull-right" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">		
				<canvas id="panel" width="380" height="380"></canvas>
				<img src="" id="showPic"/>
			</div>
			<div class="modal-footer">
				<button id="save" type="button" class="btn btn-default" data-dismiss="modal">Save</button>
			</div>
		</div>
	</div>	
</div>
@endsection