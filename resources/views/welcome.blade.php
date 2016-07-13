@extends('layouts.app')

@section('content')
<div class="container" id="index">
    <div class="row">  
			<div class="col-md-6 col-xs-12">
			<div class="col-md-9 col-xs-12 col-md-offset-3" id="welcomeMessage" style="color:black">
				<h1> Welcome to Iskomsai.</h1>
				<p><b>
						A system that unites faculty, alumni, and students.
Assignments, laboratory exercises, ppts, machine problems, you name it, can be downloaded with a single click. Forums provided to arouse curiosity, learn new things, and enlighten minds. We believe that communication can be fostered with the help not only of technology, but with the brilliant minds of future computer scientists.

					</b></p>
			</div>
			</div>
			<div class="col-md-6 col-xs-12">  
			<div class="col-md-9 col-md-offset-2">
				<div class="panel panel-default" id="formPanel2" >
					<div class="panel-body formPanel">
						 <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
								{!! csrf_field() !!}

								<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									<div class="col-md-12">
										<input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" placeholder="Firstname"/>

										@if ($errors->has('firstname'))
											<span class="help-block">
												<strong>{{ $errors->first('firstname') }}</strong>
											</span>
										@endif
									</div>
								</div>

								 <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
									<div class="col-md-12">
										<input type="text" class="form-control" name="middlename" value="{{ old('middlename') }}" placeholder="Middle Name">
										@if ($errors->has('middlename'))
											<span class="help-block">
												<strong>{{ $errors->first('middlename') }}</strong>
											</span>
										@endif
									</div>
								</div>

								 <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
										<div class="col-md-12">
											<input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" placeholder="Lastname">

											@if ($errors->has('lastname'))
												<span class="help-block">
													<strong>{{ $errors->first('lastname') }}</strong>
												</span>
											@endif
									</div>
									</div>

									<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
										<div class="col-md-12">
											<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail Address">

											@if ($errors->has('email'))
												<span class="help-block">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
										<div class="col-md-12">
											<input type="password" class="form-control" name="password" placeholder="Password">

											@if ($errors->has('password'))
												<span class="help-block">
													<strong>{{ $errors->first('password') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
										<div class="col-md-12">
											<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">

											@if ($errors->has('password_confirmation'))
												<span class="help-block">
													<strong>{{ $errors->firs=t('password_confirmation') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-5">
											<select name="usertype_id" class="form-control" id="usertype_id" required>
												<option value="" selected disabled> User Type </option>
												<option value="1"> Student </option>
												<option value="2"> Faculty </option>
												<option value="3"> Alumni </option>
											</select>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" name="user_number" id="user_number" required>
										</div>
									</div>							 				
									<div class="form-group">
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary form-control">
												<i class="fa fa-btn fa-user"></i>Register
											</button>
										</div>
									</div>
						</form>
					</div>
				</div>
			</div>
    </div>
</div>
@endsection
