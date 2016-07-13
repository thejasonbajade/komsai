@extends('layouts.app') 
    @section('content')

<form action="{{ url('/forum/submit_post')}}" method="POST">
{!! csrf_field() !!}
<div class="col-xs-9" style="margin-top: 80px">
    <div class="panel panel-default">
        <div id="title" class="panel-heading" style="background-color: #008080;">
            <h4 style="color:white;"><b>Title</b><small><span style="color: red;">(*required)</span></small></h4>
        </div>
        <div class="panel-body">
            <input type="text" name="title" class="form-control"/>
        </div>
    </div>

    <div class="panel panel-default">
        <div id="des" class="panel-heading" style="background-color: #008080;">
            <h4 style="color:white;"><b>Content</b> <small><span style="color:red">(*required)</span></small></h4>
        </div>
        <div class="panel-body">
            <textarea class="textinput form-control" name="content"> </textarea>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #008080;">
            <h4 style="color:white;"><b>Category</b></h4>
        </div>
        <div class="panel-body">
            <div class="input-group">
<!--                <input type="text" autocomplete="on" class="form-control" placeholder="OJT, Bla Bla Bla, etc." />-->
                <select name="tag">
                    <option disabled>Category</option>
                    @foreach($categories as $c)
                    <option value="{{$c->id}}">{{$c->category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>


@endsection