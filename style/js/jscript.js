function giveinfo(){
	if (sessionStorage.getItem("visited") === null){
		alert("Please read all the information about how to do measurement before doing any calculation!\nSorry for the interapt :)");
		sessionStorage.setItem("visited", "true");
	}
}

function givealert(){
	alert("Sorry, this feature is under devolopment!");
	return false;
}

function permit(){
	if(!confirm("Do you want to Log out?")){
		return false;
	}
	else{
		return true;
	}
}

function apermit(){
	if(!confirm("Sure to visit users?")){
		return false;
	}
	else{
		return true;
	}
}

function permit1(){
	if(!confirm("Sure to edit your information?")){
		return false;
	}
	else{
		return true;
	}
}

function apermit1(){
	if(!confirm("Sure to edit user information?")){
		return false;
	}
	else{
		return true;
	}
}

function permit2(){
	if(!confirm("Sure to delete your information?")){
		return false;
	}
	else{
		return true;
	}
}

function apermit2(){
	if(!confirm("Sure to delete user information?")){
		return false;
	}
	else{
		return true;
	}
}

function permit3(){
	if(!confirm("Sure to delete this measurement information?")){
		return false;
	}
	else{
		return true;
	}
}

function permit4(){
	if(!confirm("?")){
		return false;
	}
	else{
		return true;
	}
}
