@extends('profile')
@section('rightPanel')	
<div class="col-md-12 col-xs-12 col-xs-offset-0 remove-padding" id="rightPanel">
	<div class="col-md-12" id="rightPanelContent">
		<h1 id="classTitle"> Feedback from Students</h1>
		<div class="col-md-10 col-md-offset-1 remove-padding">
			<table class = "table table-bordered">
				<thead>
					<th>Message Subject</th>
					<th>Date and Time</th>
				</thead>
				<tbody>
					<?php $id=1;?>
					@foreach($messages as $message)
					<tr>
						<td style="width: 50%"><a href="" data-toggle="modal" data-target="<?php echo '#message'.$id?>">{{$message->feedback_subject}}</a></td>
						<td style="width: 30%">{{ date("M d, Y h:i A", strtotime($message->timestamp)) }}</td>
						<div id="<?php echo 'message'.$id?>" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">{{$message->feedback_subject}}</h4>
									</div>
									<div class="modal-body">
										<p>{{$message->feedback_content}}</p>
									</div>
									<div class="modal-footer">
										<form action="<?php $_SELF ?>" method="GET">
											<input type="hidden" name="feedback_id" value="{{$message->feedback_id}}"/>
											<input type="submit" role="button" class="btn btn-default" name="submit" value="Delete"/>
										</form>
									</div>
								</div>
							</div>
						</div>
					</tr>
					<?php $id++;?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@foreach($messages as $message)
@endforeach
@endsection