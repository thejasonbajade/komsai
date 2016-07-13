@extends('profile')

@section('rightPanel')
<div class="col-md-10 col-md-offset-1">
	<h1>Add Classes</h1>
	<div class="panel panel-default">
		<div class="panel-heading"> Search Classes </div>
		<div class="panel-body">
			<form action="{{ url('') }}/{{ $nameUrl }}/addClass/classList" method="POST">
				<div class="form-group">
					<div class="col-md-12 remove-padding">
							{!! csrf_field() !!}
						<div class="col-md-7 remove-padding">
							<div class="input-group">
								<span class="input-group-addon"><span><i class="glyphicon glyphicon-search"> </i></span></span>                                           
								<input type="text" class="form-control" name="subjectName" value="{{ old('subjectName') }}" placeholder="Subject Name e.g. CMSC 11" required/>
							</div>
						</div>
						<div class="col-md-2 remove-padding">
							<select name="year" class="form-control" required>
								<option value="" disabled selected> Year </option>
								@for($i = date("Y"); $i > date("Y")-10; $i--) 
									<option value="{{ $i }}"> {{ $i }}</option>
								@endfor
							</select>
						</div>
						<div class="col-md-2 remove-padding">
							<select name="semester" class="form-control"required>
								<option value="" disabled selected> Semester </option>
								<option value="1"> 1st </option>
								<option value="2"> 2nd </option>
							</select>
						</div>
						<div class="col-md-1 remove-padding">
							<input type="submit" class="btn btn-primary" value="Search"/>
						</div>
					</div>	
				</div>
			</form>
		</div>
	</div>
	<p> {{ $message }}</p>
	@yield('classList')
</div>
	</div>
</div>

@endsection