 window.onload = function() {
	body = document.getElementsByTagName('body');
	if(document.getElementById('formPanel') != null) {
		document.getElementById('formPanel').onfocusin = darken;
		document.getElementById('formPanel').onfocusout = lighten;
		document.getElementById('formPanel2').onfocusin = darken;
		document.getElementById('formPanel2').onfocusout = lighten;
	}
	if(document.getElementById("classes") != null) {
		document.getElementById("classes").onclick = hideProfileInfo;
	} 
	if(document.getElementById("usertype_id") != null) {
		document.getElementById("usertype_id").onchange = changeNumberType;
	}
	if(document.getElementById("form") != null) {
		document.getElementById("form").onsubmit = invalidForm;
	}
	 
}
 
function darken() {
	body = document.getElementsByTagName('body');
	body[0].id = "bodyDark";
} 

function lighten() {
	body = document.getElementsByTagName('body');
	body[0].id = "body";
} 

function hideProfileInfo() {
	var profileInfo = document.getElementById("profileInfo");
	profileInfo.className = "panel-collapse collapse";
	profileInfo.setAttribute("atria-expanded", "false");
	var classes = document.getElementById("classes");
	classes.id = "classesDisplay";
	document.getElementById("classesDisplay").onclick = showProfileInfoInit;
	
}
function showProfileInfoInit() {
	var profileInfo = document.getElementById("profileInfo");
	profileInfo.className = "panel-collapse collapsing";
	setTimeout(showProfileInfo, 250);
}

function showProfileInfo() {
	var profileInfo = document.getElementById("profileInfo");
	profileInfo.className = "panel-collapse collapse in";
	profileInfo.setAttribute("atria-expanded", "true");
	var classes = document.getElementById("classesDisplay");
	classes.id = "classes";
	document.getElementById("classes").onclick = hideProfileInfo;	
}

function changeNumberType() {
	usertype_id = document.getElementById("usertype_id").value;
	number =  document.getElementById("user_number");
	if(usertype_id == 1) {
		number.placeholder = "Student Number";
	} else if(usertype_id == 2) {
		number.placeholder = "Faculty Number";
	} else if(usertype_id == 3) {
		number.placeholder = "Alumni Number";
	}
}

function invalidForm(){
	console.log("asdf");
	var number = document.getElementById("number").value;
	var upvAddress = document.getElementById("upv").value;
	var homeAddress = document.getElementById("home").value;
	var email = document.getElementById("email").value;
	var patternNumber = new RegExp(/09[0-9]{9}$/,"g");
	var patternAddress = new RegExp(/[^\s]/,"g");
	var valueNumber = patternNumber.test(number);
	var valueUpv = patternAddress.test(upvAddress);
	var valueHome = patternAddress.test(homeAddress);
	var counterForError = 0;

	document.getElementById("errorUpv").innerHTML = "&nbsp;";
	document.getElementById("errorEmail").innerHTML = "&nbsp;";
	document.getElementById("errorHome").innerHTML = "&nbsp;";
	document.getElementById("errorNumber").innerHTML = "&nbsp;";
	if(email == ""){
		document.getElementById("errorEmail").innerHTML = "Please input email.";
		counterForError++;
	}
	if(valueUpv == false){
		document.getElementById("errorUpv").innerHTML = "Please input upv address.";
		counterForError++;
	}
	if(valueHome == false){
		document.getElementById("errorHome").innerHTML = "Please input home address.";
		counterForError++;
	}
	if(valueNumber == false){
		document.getElementById("errorNumber").innerHTML = "Please input valid number.";
		counterForError++;
	}
	if(counterForError>0){
		return false;
	}
}

var fileName;
function readURL(input){
	if(input.files && input.files[0]){
		var reader = new FileReader();
		reader.onload = function (e) {
			image = document.getElementById("profilePic");
			profilePic.src = e.target.result;
			fileName = profilePic.src;
			/*$('profilePic')
				.attr('src', e.target.result)
				.width(150)
				.height(200);*/
		};
		reader.readAsDataURL(input.files[0]);
	}
}
