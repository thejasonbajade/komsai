@extends('student.addClass')

@section('classList')

<div class="col-md-12">
	<div class="row">
			@foreach($classes as $class)
				<div class="col-md-12" style="padding:0px">
					<a href="#" data-toggle="modal" data-target="#{{ $class->class_id }}">
						<div class="panel panel-default">
							<div class="panel-body">
								<span>{{ $class->subject_name }}</span> 
								<span> ( Section {{ $class->section }} ) </span><br/>
								<small>{{ $class->subject_title }}</small>
							</div>
						</div>
					</a>
				</div>
				<div class="modal fade" id="{{ $class->class_id }}">
					<button type="button" class="close btn-lg" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
					<div class="modal-dialog modal-sm">
						<div class="modal-content">                                            
							<div class="modal-body paddingRemove">
								<form action="{{ url('') }}/{{ $nameUrl }}/addClass/classList/check" method="post">
									{!! csrf_field() !!}
									<h3>{{ $class->subject_name }} ( Section {{ $class->section }} )</h3>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>             
												<input type="text" class="form-control" name="securityKey" placeholder="Security Key" required/>
											</div>
									</div>
									<input type="hidden" class="form-control" name="name" value="{{ $class->subject_name }}"/>
									<input type="hidden" class="form-control" name="year" value="{{ $class->year }}"/>
									<input type="hidden" class="form-control" name="semester" value="{{ $class->semester }}"/>
									<input type="hidden" class="form-control" name="classId" value="{{ $class->class_id }}"/>
									<input type="submit" class="btn btn-primary" id="centerButton" value="Submit"/>
								</form>
							</div>
						</div>
					</div>
				</div>
			@endforeach
	</div>
</div>
@endsection