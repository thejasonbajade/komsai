@extends('layouts.app')
@section('content')

<script>
    function validateTitle() {
        var titleInput, inputNeeded;
        titleInput = document.getElementById("titleInput").value;
        if (titleInput.length == 0) {
            document.getElementById("titleStatus").innerHTML = "&nbsp;&nbsp;&nbsp;*Required Field";
            document.getElementById("titleStatus").style.color = "red";
            return false;
        }
        else if(titleInput.length < 10) {
            inputNeeded = 10;
            inputNeeded = inputNeeded - titleInput.length;
            document.getElementById("titleStatus").innerHTML = "&nbsp;&nbsp;" + inputNeeded + "&nbsp;more needed.";
            document.getElementById("titleStatus").style.color = "red";
            return false;
        }
        else {
            document.getElementById("titleStatus").innerHTML = "&nbsp;&nbsp;&nbsp;Valid";
            document.getElementById("titleStatus").style.color = "yellow";
            return true;
        }
    }
    
    function validateContent() {
        var contentInput, inputNeeded;
        contentInput = document.getElementById("contentInput").value;
        if (contentInput.length == 0) {
            document.getElementById("contentStatus").innerHTML = "&nbsp;&nbsp;&nbsp;*Required Field";
            document.getElementById("contentStatus").style.color = "red";
            return false;
        }
        else if(contentInput.length < 20) {
            inputNeeded = 20;
            inputNeeded = inputNeeded - contentInput.length;
            document.getElementById("contentStatus").innerHTML = "&nbsp;&nbsp;" + inputNeeded + "&nbsp;more needed.";
            document.getElementById("contentStatus").style.color = "red";
            return false;
        }
        else {
            document.getElementById("contentStatus").innerHTML = "&nbsp;&nbsp;&nbsp;Valid";
            document.getElementById("contentStatus").style.color = "yellow";
            return true;
        }
    }
    
    function validateCategory() {
        var select, choice;
        select = document.getElementById("categoryInput");
        
        choice = select.options[select.selectedIndex].text;
        if (choice == "Category") {
            document.getElementById("categoryStatus").innerHTML = "&nbsp;&nbsp;&nbsp;*Must select a category";
            document.getElementById("categoryStatus").style.color = "red";
            return false;
        }
        else {
            document.getElementById("categoryStatus").innerHTML = "&nbsp;&nbsp;Valid";
            document.getElementById("categoryStatus").style.color = "yellow";
            return true;
        }
    }
    
    function validateForm() {
        if (validateContent() == true && validateTitle() == true && validateCategory()) {
            alert("Submit Successful");
        }
        else {
            validateContent();
            validateTitle();
            validateCategory();
            return false;
        }
    }
    
    window.onload = function () {
        var form;
        
        document.getElementById("titleStatus").innerHTML = "";
        document.getElementById("contentStatus").innerHTML = "";
        document.getElementById("categoryStatus").innerHTML = "";
        
        document.getElementById("titleInput").onkeyup = validateTitle;
        document.getElementById("contentInput").onkeyup = validateContent;
        document.getElementById("categoryInput").onchange = validateCategory;
        
        form = document.getElementsByName("Form");
        form[0].onsubmit = validateForm;
    }
    
</script>

<div class="container">
<form action="{{ url('/forum/submit_post')}}" method="POST" name="Form">
{!! csrf_field() !!}


<div class="col-xs-9" style="margin-top: 60px">
    <div class="panel panel-default">
       <div id="title" class="panel-heading" style="background-color: #008080;">
            <h4 style="color:white;"><b>Title</b><small><span id="titleStatus"></span></small></h4>
        </div>
        <div class="panel-body">
            <input type="text" id="titleInput" name="title" class="form-control" placeholder="at least 10 characters"/>
        </div>            
    </div>

    <div class="panel panel-default">
        <div id="des" class="panel-heading" style="background-color: #008080;">
            <h4 style="color:white;"><b>Content</b> <small><span id="contentStatus"></span></small></h4>
        </div>
        <div class="panel-body">
            <textarea placeholder="at least 20 characters" id="contentInput" class="textinput form-control" name="content"></textarea>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #008080;">
            <h4><b style="color:white;">Category</b><small><span id="categoryStatus"></span></small></h4>
        </div>
        <div class="panel-body">
            <div class="input-group">
<!--                <input type="text" autocomplete="on" class="form-control" placeholder="OJT, Bla Bla Bla, etc." />-->
                <select name="tag" id="categoryInput">
                    <option value="" disabled selected>Category</option>
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
</div>
@endsection
