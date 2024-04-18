function validate(){
	var uname=document.getElementById("username").value;
	var upass=document.getElementById("password").value;
	
	if(uname=="APARILLA" && upass=="master22"){
		alert("login successfully");
		window.location.href="index.php";
		
	}
	else{
		alert("login failed");
	}

}

function LOGOUT(){
    var result = confirm("Are you sure you want to logout?");
	if(result == false){
		event.preventDefault();
	}
	else{
		window.location.href="login.html";
	}
}




	


	