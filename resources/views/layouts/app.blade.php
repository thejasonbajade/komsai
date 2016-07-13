<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Iskomsai</title>
		<link rel="shortcut icon" href="{{ url('') }}/images/komsaiLogo.png" type="image/jpg"/>

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='html/css'>

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
	
		<link href="{{ url('/font-awesome/css/font-awesome.min.css') }}" rel='stylesheet'>	
		<link href="{{ url('/bootstrap/css/bootstrap.min.css') }}" rel='stylesheet'/>
		<link href="{{ url('/css/komsai.css') }}" rel='stylesheet'/>
		<link href="{{ url('/css/faculty.css') }}" rel='stylesheet'/>
		<link href="{{ url('/css/about.css') }}" rel='stylesheet'/>
		<script src="{{ url('/js/komsai.js') }}"></script>
    <style>
			body {
				font-family: 'Lato';
			}
			.fa-btn {
				margin-right: 6px;
			}	
    </style>
		@if(Auth::guest()) 
			<style>
				#body {
					background: url('{{ url('') }}/images/background.jpg') #000 no-repeat;
					-webkit-background-size: cover;
					background-size: cover;
				}
				#bodyDark {
					background: 
						linear-gradient(
							rgba(0, 0, 0, 0.7), 
							rgba(0, 0, 0, 0.7)
						),
						url('{{ url('') }}/images/background.jpg') #000 no-repeat;
					-webkit-background-size: cover;
					background-size: cover;
				}
			</style>
		@else
			<style>
				body {
					margin-top: 50px;
					background-color: #FFF;
				}
			</style>
		@endif
</head>
<body id="body">
	
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href=" {{ url('/') }}" id="navImageA">
						<img src="{{ url('') }}/images/komsaiLogo.png"  class="img-responsive" alt="Komsai.Org Logo" id="navImage"/>
						ISKOMSAI
					</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav">
						<li><a href="{{ url('') }}/about"> ABOUT </a></li>
					</ul>
				
					<ul class="nav navbar-nav navbar-right">
						@if(!Auth::guest())
							<li><a href="{{ url('') }}/forum"> FORUM </a></li>
							<li><a href="{{ url('') }}/{{ strtolower(str_replace(" ", "",Auth::user()->firstname.Auth::user()->middlename.Auth::user()->lastname)) }}/faculty" title="Profile"> FACULTY </a></li>
							<li>
								<a href="{{ url('/')}}" id="navImageA">
									<div id="navImage">
										<img src="{{ url('images') }}/{{Auth::user()->filename}}.{{Auth::user()->filetype}}" class="img-responsive img-rounded"/>
										</div>
								</a>
							</li>
							<li><a href="{{ url('/logout') }}" role="button" data-toggle="tooltip" title="Logout" data-placement="bottom"> <i class="fa fa-btn fa-sign-out"></i> </a><li>			
						@else 
						<li>
						<form class="navbar-form" role="form" action="{{ url('/login') }}" method="post" id="formPanel">
							{!! csrf_field() !!}
							<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}" style="margin-right:10px">
								<div class="input-group">   
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail Address">
								</div>
								@if($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-right:10px">
								<div class="input-group">                                           
									<input type="password" class="form-control" name="password" placeholder="Password">
									<span class="input-group-addon"><a role="button" title="Forgot password?"><i class="fa fa-question" aria-hidden="true"></i></a></span>
								</div>
								@if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Login</button>
							</div>	
						</form>
					</li>
					@endif
					</ul> 				
				</div>
			</div>
		</nav>
	
	
  @yield('content')
	
	<script src="{{ url('js/jquery.min.js') }}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
