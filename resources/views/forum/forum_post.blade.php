<style>
    #forum-title {
        background-color: #fff;
        border-radius: 5px;
        padding: 0;
        display: block;
        width: 900px;
        margin: 0 auto;
        margin-top: 50px;
        background-color: #ECEFF5;
    }
    
    .forum-title-header {
/*        text-align: left;*/
        margin-left: 20px;
        font-weight: 700;
        font-size: 1.5em;
        color: #008080;
;
    }
    
    .title-container {
        border-bottom: 1px solid rgba(43, 42, 62, 0.2);
        margin: 0;
        display: inline-flex;
    }
    
    .comment-container {
        border-bottom: 1px solid rgba(43, 42, 62, 0.2);
        margin: 0;
        padding-right: 26px;
        display: inline-flex;
        background-color: #ECEFF5;
        width: 100%;
    }
    
    .tag {
        background-color: #FFAC00;
        border-radius: 3px;
        color: rgba(43, 42, 62, 0.8) !important;
        font-weight: 400;
        display: inline-table;
        height: 25px;
        letter-spacing: 1px !important;
        line-height: 25px;
        padding: 0 5px;
        position: relative;
        top: 6px;
        vertical-align: baseline;
        font-size: x-small;
        color: rgba(43, 42, 62, 0.8);
        margin-left: 5px;
    }
    
    .details {
/*        text-align: left;*/
        margin-left: 20px
    }
    
    .comment-details {
/*        text-align: left;*/
        margin-left: 20px
    }
    
    #comments-container {
        background-color: #fff;
        border-radius: 5px;
        margin: 13px 339px 0 26px;
        padding: 0;
        display: block;
        width: 900px;
        margin: 0 auto;
        margin-top: 20px;
    }
    
    .comment-title {
/*        text-align: left;*/
        margin-left: 20px;
        font-weight: 700;
        font-size: 1.25em;
        color: #00CCBF
    }
    
    .comment-text {
        margin-left: 20px;
/*        text-align: left;*/
        font-size: 1em
    }
    
    .comment-user {
        display: flex;
    }
    
    .buttons-container {
        background-color: black;
        color: white;
        display: flex;
/*        background-color: white;*/
    }
    
    .buttons-container button {
        background-color: black;
        justify-content: center;
        border: none;
    }
    
    .comment {
        padding: 26 0;
    }
    
    .buttons {
        height: inherit;
        display: flex;
        flex-direction: column;
        
        
    }
    
    .buttons p {
        text-align: center;
    }
    
    .title {
        padding: 26px 0;
    }
    
    #add-comment-container {
        background-color: #fff;
        border-radius: 5px;
        margin: 13px 339px 0 26px;
        padding: 0;
        display: block;
        width: 900px;
        margin: 0 auto;
        margin-top: 20px;   
    }
    
    #add-comment-container textarea{
        width: 100%;
        resize: vertical;
        height: 
    }
    
    .comment-button{
        border: none;
        color: white;
        background-color: black;
        width: 100%;
    }
    
    .comment-button:active {
        border: none;
        color: black;
        background-color: white;
        width: 100%;
    }

</style>

<script>

    
    function upvote(value) {
	var id = value.id.split(' ')[1];
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			//document.getElementById("display").innerHTML = xhttp.responseText;
            document.getElementById(''+id).innerHTML = xhttp.responseText;
            console.log(xhttp.responseText + " " + id);
            
		}
	}
	
	xhttp.open("GET", id+"/upvote", true);
	xhttp.send();
    }
    
    function downvote(value) {
    
	var id = value.id.split(' ')[1];
	var xhttp2 = new XMLHttpRequest();
	xhttp2.onreadystatechange = function() {
		if(xhttp2.readyState == 4 && xhttp2.status == 200) {
            console.log("down");
            console.log(xhttp2.responseText + " " + id);
            document.getElementById(''+id).innerHTML = xhttp2.responseText;
            
		}
	}
    console.log(id);
	xhttp2.open("GET", id+"/downvote", true);
	xhttp2.send();
    }


</script>


@extends('layouts.app')

@section('content')

<section id="features" class="features">
    <div id="forum-title">
        <div class="title-container">
            <div class="buttons-container">
                <div class="buttons">
                    <button><img src="{{URL::asset('images/up.png')}}" alt="" width="30" height="30" /></button>
                    <p style="margin-bottom: 0px;"> 15 </p>
                    <button><img src="{{URL::asset('images/down.png')}}" alt="" width="30" height="30" /></button>
                </div>
            </div>
            <div id="sample"> </div>
            <div class="title">
            <div style="display: flex">
                <h4 class="forum-title-header">{{$post->post_title}}</h4>
                <span class="tag"><a href="#">{{$post->category}}</a> </span>
            </div>
            <div>
                <p class="details">submitted {{$post->created_ay}} by {{$post->username}}</p>
            </div>
            <div style="margin-left: 20px">
                <p style="text-align:left; font-size:1.25em">&#09;{{$post->post_content}}</p>
            </div>
                </div>
        </div>

    </div>
    
    <div id="add-comment-container">
        <form action="{{ url('/comment')}}" method="POST">
            {!! csrf_field() !!}
            <textarea name="content"></textarea>
            <input type="hidden" value="{{$post->post_id}}" name="post_id"/>
            <input type="submit" class="comment-button"/>
        </form>
    </div>
    
    <div id="comments-container">

        
        @foreach($commentss as $c)
            <div class="comment-container">
                <div class="buttons-container">
                    <div class="buttons">
                        <button onclick="upvote(this)" id="up {{$c->id}}"><img src="{{URL::asset('images/up.png')}}" alt="up" width="30" height="30" /></button>
                        <p style="margin-bottom: 0px;" id="{{$c->id}}">{{$c->points}}</p>
                        <button onclick="downvote(this)" id="down {{$c->id}}"><img src="{{URL::asset('images/down.png')}}" alt="down" width="30" height="30" /></button>
                    </div>
                </div>
                <div class="comment">
                    <div class="comment-title">
                        <a href="#"><h4>{{$c->username}}</h4></a>
                    </div>
                    <div class="comment-details">
                        <p>submitted {{$c->elapsed}}</p>
                    </div>
                    <div class="comment-text">
                        <p>&#09; {{$c->content}}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>
@endsection
