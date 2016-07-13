@extends('layouts.app')

@section('content')	
	<div class="jumbotron" style="margin:0px">
		<h1 class="header">ISKOMSAI</h1>
	</div>
	<div class="container-fluid" style="background-color:white;">
		<div class="row">
		<h1 class="header"><b>About the Website</b></h1>
		<br/>
		<p class="header fontSize">A system that unites faculty, alumni, and students.<br/>Assignments, laboratory exercises, ppts, machine problems, you name it, can be downloaded with a single click. Forums provided to arouse curiosity, learn new things, and enlighten minds. We believe that communication can be fostered with the help not only of technology, but with the brilliant minds of future computer scientists.
		</p>
		<br/>
		<h1 class="header"><b>About Us</b></h1>
		<br/>
		<p class="header fontSize">Known as Iskolar ng Bayan from <b><em>"Isko"</em>,</b>Computer Science from <b><em>"Komsai"</em>,</b> and
		<br/>armed with <b>perseverance</b> and <b>cups of coffee</b>, students of batch 2013 motivated to graduate on time teamed up together to face the harsh long exams, sleepless nights, and endless projects.
		</p>
		<br/>
		<h1 class="header"><b>The Team</b></h1>
		<div class="images">
			<div class="wrapper col-md-5 col-md-offset-4" id="chrevic">
				<div class="main filldiv">
					<img alt="picture" src="{{ url('') }}/images/chrevic.jpg" class="fillpic">
				</div>
			</div>
			<div class="container">
				<div class="col-md-8 col-md-offset-4">
					<h1>Chrevic Dangan</h1>
					<h4>Adviser</h4>
				</div>
			</div>
			<div class="wrapper col-md-4 col-xs-4 col-lg-4">
				<div class="main filldiv">
					<img alt="picture" src="{{ url('') }}/images/eiman.jpg" class="fillpic">
				</div>
			</div>
			<div class="wrapper col-md-4 col-xs-4 col-lg-4">
				<div class="main filldiv">
					<img alt="picture" src="{{ url('') }}/images/fernee.jpg" class="fillpic">
				</div>
			</div>
			<div class="wrapper col-md-4 col-xs-4 col-lg-4">
				<div class="main filldiv">
					<img alt="picture" src="{{ url('') }}/images/jason.jpg" class="fillpic">
				</div>
			</div>
				<div class="col-md-4 col-xs-4 eiman">
					<h2>Eiman Mission</h2>
					<h4>Faculty Module</h4>
				</div>
				<div class="col-md-4 col-xs-4 anfernee">
					<h2>Anfernee Sodusta</h2>
					<h4>Alumni Module</h4>
				</div>
				<div class="col-md-4 col-xs-4 jason">
					<h2>Jason Bajade</h2>
					<h4>Student Module</h4>
				</div>
			
		</div>
		</div>
	</div>
	<br/>
	<br/>
@endsection
