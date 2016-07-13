@extends('layouts.app')
@section('content')
	<style type="text/css">
		.fixer{
			margin-top:10%;
		}
		body{
			background:#004D40;	
			color:white;
		}
	</style>	
	<div class="col-md-8 col-md-offset-2 fixer" >
		<form action="{{ url('') }}/{{ strtolower(str_replace(" ", "",Auth::user()->firstname.Auth::user()->middlename.Auth::user()->lastname)) }}/facultyFeedback" accept-charset="UTF-8" method="post" role="form">
			{!! csrf_field() !!}
			<input type="hidden" name="receiver" value="8">
			<div class="col-md-12">
			</div>
			<div class="col-md-12">
				<br />
				<input type="text" class="form-control" name="subject" placeholder="Subject" style="background:white;color:#004D40;">
			</div>
			<div class="col-md-12">
				<br />
				<textarea class="form-control" name="message" placeholder="Message" style="color:#004D40;height:200px;"></textarea>
			</div>
			<div class="col-md-3" style="margin-left:38%;">
				<br />
				<input type="submit" value="SEND FEEDBACK" class="form-control btn btn-default" style="background:#004D40;color:white;">
			</div>
		</form>
	</div>
@endsection