@extends('student.studentProfile')

@section('rightPanel')

<div class="col-md-12 col-xs-12 col-xs-offset-0 remove-padding" id="rightPanel">
	<div class="col-md-12" id="rightPanelContent">
		<div class="col-md-8 col-xs-12 remove-padding">
			<h1 id="classTitle">Assignments</h1>

			@foreach($results as $result)
			@if($result->status == 1)
			<div class="panel panel-default">
				<div class="panel-heading">
					<span>{{ $result->subject_name }}</span> 
					<span> (Section{{ $result->section }})</span><br/>
				</div>
				<div class="panel-body">
				@foreach($class_assignments[$result->class_id] as $assignment)
					<div class="col-md-12 remove-padding">
							{!! csrf_field() !!}
						<div class="col-md-12 remove-padding">
							<div class="col-md-5">
								<span> {{ $assignment->assignment_title }} <span><br/>
								<span>(Deadline: {{ date('F d, Y; h:i a', strtotime($assignment->due_date)) }})</span><br/>
								<span> {{ $assignment->assignment_description }} </span><br/>
								<span><a href="../{{config('app.fileDestinationPath').'/'.$assignment->filename}}"> {{ $assignment->filename }} </a></span>
							</div>
							<div class="col-md-6">                    		
							@if( count($file_submitted[$result->class_id][$assignment->assignment_id]) == 0 )
							{!! Form::open(array('url' => '/studentProfile/assignments/handleUpload', 'files' => true)) !!}
								<div class="form-group">
                  <div class="col-md-10">
                    <input type="file" class="form-control" name="file" />
                    <input type="hidden" name="assignment_id" value="{{ $assignment->assignment_id }}" />
                	</div>
                	<div class="col-md-2">     
                  	<input type="submit" class="btn btn-primary" value="Submit"/>
                  	<input type="hidden" name="file_id" value="" />
                	</div>
                </div>
							{!! Form::close() !!}
              @else
              {{ Form::open(array('url' => '/studentProfile/assignments/update', 'files' => true)) }}
								<div class="form-group">
                  <div class="col-md-10">
                    <input type="file" class="form-control" name="file" />
                    <input type="hidden" name="assignment_id" value="{{ $assignment->assignment_id }}" />
                    <input type="hidden" name="file_id" value="{{ $file_submitted[$result->class_id][$assignment->assignment_id][0]->file_id }}" />
                    <input type="hidden" name="filename" value="{{ $file_submitted[$result->class_id][$assignment->assignment_id][0]->filename }}" />
                	</div>
                	<div class="col-md-2">     
                  	<input type="submit" class="btn btn-primary" value="Update"/>
                	</div>
                	<div class="col-md-12">
                		<br/><span>
                			<a href="../{{config('app.fileDestinationPath').'/'.$file_submitted[$result->class_id][$assignment->assignment_id][0]->filename}}">
                				{{ $file_submitted[$result->class_id][$assignment->assignment_id][0]->filename }} 
                			</a>
                		</span><br/>
                		<span>Date Submitted: {{ date('F d, Y; h:i a', strtotime($file_submitted[$result->class_id][$assignment->assignment_id][0]->created_at)) }}</span>
                	</div>
                </div>
							{!! Form::close() !!}
              @endif
              </div>
						</div>
					</div>	
				@endforeach
				@if(count($class_assignments[$result->class_id]) == 0)
					No Assignments
				@endif
				</div>
			</div>
			@endif
			@endforeach
		</div>
	</div>
</div>
@endsection
