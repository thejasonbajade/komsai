@extends('profile')
@section('rightPanel')
<script type="text/javascript">
</script>
<div class="col-md-12 remove-padding" id="rightPanel">
	<div class="col-md-12" id="rightPanelContent">
		<div class="col-md-8 col-xs-12 remove-padding">
			<h1 id="classTitle">{{ $classInfo[0]->subject_name }} (Section {{ $classInfo[0]->section }})</h1>
			@if(Auth::user()->usertype_id == 2)
				<h5> Security Key : <b>{{ $classInfo[0]->security_key }}</b> </h5>
			@endif
			<br/>
			<div id = "panel1">
				<div class="panel panel-default">
					<ul class="nav nav-tabs">	
						<li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-edit"></span> Announcement </a></li>
						<li><a href="#menu1" data-toggle="tab"><span class="glyphicon glyphicon-picture"></span> Upload a file </a></li>
					</ul>

					<div class="panel-body tab-content"  style="min-height: 80px">
						<div class="tab-pane active" id="home">
							<form action="{{ url('') }}/{{ $nameUrl }}/{{ $classInfo[0]->subject_name }} {{ $classInfo[0]->section }}/sendPost" role="form" method="post">
									{!! csrf_field() !!}
									<input type="hidden" name="classId" value="{{ $classInfo[0]->class_id }}">
									<textarea id="content" name="content" class="form-control"></textarea>
									<div class="panel-footer">
										<button type="submit" class="btn btn-primary">Post</button>
									</div>
								</form>
						</div>
						<div class="tab-pane" id="menu1">
							<form action="{{ url('') }}/{{ $nameUrl }}/{{ $classInfo[0]->subject_name }} {{ $classInfo[0]->section }}/sendFile" role="form" method="post" enctype="multipart/form-data">
								{!! csrf_field() !!}
								<input type="hidden" name="classId" value="{{ $classInfo[0]->class_id }}">
								<input type="file" id="fileContent" name="file" class="form-control"/>
								<div class="panel-footer">
									<button type="submit" class="btn btn-primary">Post</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div id = "panel1">
					@foreach( $announcements as $announcement )
					<?php $announcement_id = $announcement->announcement_id ?>
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-md-2 col-xs-2 paddingRemove">
								<a href="" data-toggle="modal" data-target="#photoPanel">
									<img src="{{ url('') }}/images/{{$announcement->filename}}.{{$announcement->filetype}}" class="img img-thumbnail" alt="Post PP"/>
								</a>
							</div>
							<div class="col-md-10 col-xs-10 toleft">
									<label class="zerbot">{{ $announcement->firstname }} {{ $announcement->middlename }} {{ $announcement->lastname }}</label>
									<p class="text-muted small">{{ date("M j, Y h:i A", strtotime($announcement->created_at)) }}</p>
							</div>
							<div class="col-md-10">
							</div>
							<br/>
							<p class="toright martop">{{ $announcement->content}} </p>
							<div class="col-md-12 col-xs-12 paddingRemove">
								<hr/>
								<ul class="list-inline">
									<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="collapse" data-target="#an{{ $announcement->announcement_id }}" role="button">
										<span class="glyphicon glyphicon-comment"></span> Comment </a></li>
								</ul>
								<div id="an{{ $announcement->announcement_id }}" class="collapse">
									<form action="{{ url('') }}/{{ $nameUrl }}/{{ $classInfo[0]->subject_name }} {{ $classInfo[0]->section }}/comment?class_id={{ $classId }}" method="post">
										{!! csrf_field() !!}
										<input type="hidden" name="post_id" value="{{ $announcement->announcement_id }}">
										<div class="input-group">
											<textarea class="form-control" rows="1" name="comment" placeholder="Write a comment..."></textarea>
											<span class="input-group-btn"><button class="btn btn-primary" id="comment" type="submit">Comment</button></span>
										</div>
									</form>
								</div>
							
							<hr/>
								@foreach ($comments as $comment)
								@if ($comment->post_id==$announcement_id)
									<?php $comment_id = $comment->comment_id ?> 
									<div class="col-md-2 col-xs-2 paddingRemove">
										<img src="{{ url('') }}/images/{{$comment->filename}}.{{$comment->filetype}}" class="img img-thumbnail" alt="Post PP"/>
									</div>
									<div id="comment" class="col-md-10 col-xs-10 tleft" name="comment">
										<div class="col-md-12 col-xs-12 toleft">
												<label class="zerbot">{{ $comment->firstname }} {{ $comment->middlename }} {{ $comment->lastname }}</label>
												<p class="text-muted small">{{ date("M d, Y h:i A", strtotime($comment->created_at)) }}</p>
										</div>
										<div class="col-md-12">
										<p>{{$comment->content}}</p>
										</div>
										<ul class="list-inline"><li><a data-toggle="collapse" data-target="#com{{ $comment->comment_id }}" role="button"> Reply </a></li></ul>
										<div id="com{{ $comment->comment_id }}" class="collapse">
											<form action="{{ url('') }}/{{ $nameUrl }}/{{ $classInfo[0]->subject_name }} {{ $classInfo[0]->section }}/reply?class_id={{ $classId }}" method="post">
												{!! csrf_field() !!}

												<input type="hidden" name="comment_id" value="{{  $comment->comment_id  }}">
												<div class="input-group">
													<textarea class="form-control" rows="1" name="reply" placeholder="Write a reply..."></textarea>
													<span class="input-group-btn"><button class="btn btn-primary" type="submit">Reply</button></span>
												</div>
											</form>
										</div>
									</div>
									<div class="col-md-11 col-md-offset-1">
									@foreach ( $replies as $reply )
										@if ($reply->comment_id==$comment_id)
											
											<div id="comment" name="reply" class="toright">	
												<div class="col-md-2 col-xs-2 paddingRemove">
													<img src="{{ url('') }}/images/{{$reply->filename}}.{{$reply->filetype}}" class="img img-thumbnail" alt="Post PP"/>
												</div>
												<div class="col-md-10 col-xs-10 toleft">
													<label class="zerbot">{{ $reply->firstname }} {{ $reply->middlename }} {{ $reply->lastname }}</label>
													<p class="text-muted small">{{ date("M d, Y h:i A", strtotime($reply->created_at)) }}</p>
													<div class="col-md-12">
														<p>{{$reply->content}}</p>
													</div>
												</div>
												
											</div>
										@endif
									@endforeach
									</div>
								

									<br/>
								@endif
								@endforeach
							</div>  
						</div>
					</div>
					@endforeach
					

					</div>
			</div>
		</div>
		<div class="col-md-4">
			<h1>&nbsp;</h1>
			@if(Auth::user()->usertype_id == 2) 
				<div class="panel panel-default">
					<div class="panel-heading">
						<span> File Uploads from Students </span>		
					</div>
					<div class="panel-body">
							<?php $i=1 ?>
						@foreach($studentUploads as $studentUpload)
						<?php if($i<=3){ ?>
							<p><a href="{{url('')}}/files/{{ $studentUpload->filename }}" target="_blank">{{ $studentUpload->filename }}</a></p>
						<?php $i++; } ?>
						@endforeach
						<a id="showUpload" href="{{ url('') }}/{{ $nameUrl }}/{{ $classInfo[0]->subject_name }} {{ $classInfo[0]->section }}/fileUploadsFromStudents?class_id={{$classId}}">See all...</a>
				</div>
				</div>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">
					<span> General File Uploads </span>		
				</div>
				<div class="panel-body">
						<?php $i=1 ?>
						@foreach($facultyUploads as $facultyUpload)
						<?php if($i<=3){ ?>
							<p><a href="{{url('')}}/files/{{ $facultyUpload->filename }}" target="_blank">{{ $facultyUpload->filename }}</a></p>
						<?php $i++; } ?>
						@endforeach
						<a id="showUpload" href="{{ url('') }}/{{ $nameUrl }}/{{ $classInfo[0]->subject_name }} {{ $classInfo[0]->section }}/myFileUploads?class_id={{$classId}}">See all...</a>
				</div>
			</div>
			@if(Auth::user()->usertype_id == 2) 
				<div class="container" style="margin-top: 10%;">
					<a href="{{ url('') }}/{{ $nameUrl }}/{{ $classInfo[0]->subject_name }} {{$classInfo[0]->section }}/uploadGrades?class_id={{ $classId }}" class="btn btn-primary" role="button" style="color: white; width: 23%">Add Grades</a><br/>
					<a href="{{ url('') }}/{{ $nameUrl }}/{{ $classInfo[0]->subject_name }} {{$classInfo[0]->section }}/classRequests?class_id={{ $classId }}" class="btn btn-primary" role="button" style="color: white; width: 23%; margin-top: 1%;">Class Requests 
						@if(count($classRequests) != 0)
							<span class="badge pull-right">{{ count($classRequests) }}</span> 
						@endif
					</a>	
				</div>
			@endif
		</div>
	</div>
</div>
@endsection