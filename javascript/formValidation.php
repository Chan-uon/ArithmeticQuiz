/*
* 	These functions are based primarily on the solutions provided to us 
* 	by our professor and her TA for a previous assignment.
*/

function checkForm() { 
	
	var fname = document.getElementById("fname").value;
	var lname = document.getElementById("lname").value;
	var email = document.getElementById("email").value;
	var phone = document.getElementById("phone").value;
	var loginName = document.getElementById("loginName").value;
	var passwrd1 = document.getElementById("passwrd1").value;
	var passwrd2 = document.getElementById("passwrd2").value;
	
	//Validate first name
	var checkName = /^[a-zA-Z-]+$/;
	if(!checkName.test(fname)) {
		alert("Error: only letters and hyphen allowed in first name!"); 
		return false; 
	} 
	
	//Validate last name
	if(!checkName.test(lname)) {
		alert("Error: only letters and hyphen allowed in last name!"); 
		return false; 
	} 
	
	//Validate phone number
	var checkPhone = /^\(\d{3}\)\d{3}\-\d{4}$/ 
	if(!checkPhone.test(phone)) {
		alert("Error: phone number format should be (xxx)xxx-xxxx!"); 
		return false; 
	} 
	
	//Validate email
	var checkEmail = /^\S+@\S+\.\S+$/;
	if(!checkEmail.test(email)) {
		alert("Error: email address should have at least one period, and one @!"); 
		return false; 
	} 
	
	//Validate login name
	var checkLogin = /^[a-zA-Z0-9]{6,}$/;
	if(!checkLogin.test(loginName)) {
		alert("Error login name: letters and digits only and must be at least 6 characters longs!"); 
		return false; 
	} 
	
	//Validate password 
	if(passwrd1 != passwrd2){
		alert("Error: password confirmation must match the password!");
		return false;
	}
	var checkPass = /^(?=[0-9]+[A-Za-z]|[A-Za-z]+[0-9])[a-z0-9]{8,}$/;
	if(!checkPass.test(passwrd1)) {
		alert("Error password: letters and digits only and must contain at least one of each and at least 8 characters longs!"); 
		return false; 
	} 

	alert("congratulations! Register success!");
	return true;
} 
