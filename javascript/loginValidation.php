/*
* 	These functions are based primarily on the solutions provided to us 
* 	by our professor and her TA for a previous assignment.
*/

function checkLogin() { 
	
	var loginName = document.getElementById("loginName").value;
	var passwrd1 = document.getElementById("passwrd1").value;
	
	//Validate login name
	var checkLogin = /^[a-zA-Z0-9]{6,}$/;
	if(!checkLogin.test(loginName)) {
		alert("Error login name: letters and digits only and must be at least 6 characters longs!"); 
		return false; 
	} 
	
	//Validate password 
	var checkPass = /^(?=[0-9]+[A-Za-z]|[A-Za-z]+[0-9])[a-z0-9]{8,}$/;
	if(!checkPass.test(passwrd1) ) {
		alert("Error password: letters and digits only and must contain at least one of each and at least 8 characters longs!"); 
		return false; 
	} 

	return true;
} 
