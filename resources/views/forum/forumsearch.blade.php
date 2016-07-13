@extends('layouts.app')
@section('content')


			<div class="col-md-8">
					<h4>search</h4>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
			</div>

    <div class="col-md-8">
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-6" style="display: flex;">
			<h4> posts </h4>
			</div>
            <div class="col-md-6">
                <h4 class="pull-right">
                    <a href="#">relevance
                        <span class="caret"></span>
                    </a>
                </h4>
				<h4 class="pull-right">
					sort by:&nbsp
				</h4>
			</div>


		</div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-md-1">Points </th>
                        <th class="col-md-8">Topic </th>
                        <th class="col-md-1" style="text-align: center">Replies </th>
                        <th class="col-md-2" style="text-align: center">Date Submitted </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div style="display: block;">
                                <img src="up.png" alt="" width="30" height="30"/>
                                <p style="margin-left: 7px; margin-bottom: 0px;"> 15 </p>
                                <img src="down.png" alt="" width="30" height="30"/>
                            </div>
                        </td>
                        <td>
                            <h3 style="display: flex">Awesome CSS tutorial made by our alumni!
                                <span style="font-size: medium; background-color: #560154; border-radius: 3px; color: rgb(255, 255, 255) !important; margin-left: 10px; padding: 5px">Tutorial</span>
                            </h3>

                            <p>
                                Lorem ipsum keme keme keme 48 years conalei nang tanders at nang nang nang effem na krang-krang na ang wiz kasi at nang chapter sa keme keme , at neuro bakit ano ano pinkalou kasi ang conalei shala waz cheapangga shonga-shonga conalei urky jowabelles
                                lulu nang <a href="#">more..</a>
                            </p>
                        </td>
                        <td style="text-align: center"> 15 </td>
                        <td style="text-align: center"> Feb 14 </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display: block;">
                                <img src="up.png" alt="" width="30" height="30"/>
                                <p style="margin-left: 7px; margin-bottom: 0px;"> 15 </p>
                                <img src="down.png" alt="" width="30" height="30"/>
                            </div>
                        </td>
                        <td>
                            <h3 style="display: flex">Computer Science OJT TOP Companies
                                <span style="font-size: medium; background-color: #2EBD59; border-radius: 3px; color: rgb(255, 255, 255) !important; margin-left: 10px; padding: 5px">OJT</span>
                                <span style="font-size: medium; background-color: #0181F2; border-radius: 3px; color: rgb(255, 255, 255) !important; margin-left: 10px; padding: 5px">Discussion</span>
                            </h3>

                            <p>
                                Lorem ipsum keme keme keme 48 years conalei nang tanders at nang nang nang effem na krang-krang na ang wiz kasi at nang chapter sa keme keme , at neuro bakit ano ano pinkalou kasi ang conalei shala waz cheapangga shonga-shonga conalei urky jowabelles
                                lulu nang <a href="#">more..</a>
                            </p>
                        </td>
                        <td style="text-align: center"> 15 </td>
                        <td style="text-align: center"> Feb 14 </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
	<div class="col-md-1">
	</div>
	<div class="col-md-2">
				<p>use the following search parameters to narrow your results:
				subreddit:subreddit
				find submissions in "subreddit"
				author:username
				find submissions by "username"
				site:example.com
				find submissions from "example.com"
				url:text
				search for "text" in url
				selftext:text
				search for "text" in self post contents
				self:yes (or self:no)
				include (or exclude) self posts
				nsfw:yes (or nsfw:no)
				include (or exclude) results marked as NSFW
				e.g. subreddit:aww site:imgur.com dog
			</p>
	</div>
@endsection
