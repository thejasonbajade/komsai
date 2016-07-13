@extends('profile')
@section('rightPanel')	
<div class="col-md-12 col-xs-12 col-xs-offset-0 remove-padding" id="rightPanel">
	<div class="col-md-12" id="rightPanelContent">
		<div class="col-md-8 col-xs-12 remove-padding">
			<h1 id="classTitle">Update Profile</h1>
			<form role="form" class="col-md-10 col-md-offset-1">
				<div class="form-group">
					<label for="profilepic">Change Profile Picture:</label>
					<input type="file" id="profilepic">
				</div>
				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" id="email">
				</div>
				<div class="form-group">
					<label for="contactnum">Contact Number:</label>
					<input type="text" class="form-control" id="contactnum">
				</div>
				<div class="form-group">
					<label for="email">Current Address:</label>
					<input type="text" class="form-control" id="miagaoaddress">
				</div>
				<button type="submit" class="btn btn-default">Update</button>
			</form>
		</div>
	</div>
</div>
@endsection