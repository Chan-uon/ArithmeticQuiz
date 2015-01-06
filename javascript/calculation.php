/*
* 	These functions are based primarily on the solutions provided to us 
* 	by our professor and her TA for a previous assignment.
*/

//number of operations completed

var addScore = 0;
var subScore = 0;
var mulScore = 0;
var mixScore = 0;

var addAttempt = 0;
var subAttempt = 0;
var mulAttempt = 0;
var mixAttempt = 0;

var completed = 0;
//times the user tried 
var count = 0;
//correct result
var result = 0;

function records() {
    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.open("POST","sessionVariables.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("addScore="+addScore+"&subScore="+subScore+"&mulScore="+mulScore+"&mixScore="+mixScore+"&addAttempt="+addAttempt+"&mulAttempt="+mulAttempt+"&subAttempt="+subAttempt+"&mixAttempt="+mixAttempt+"&completed="+completed);
}

function reset(){
	score = count = result = 0;
	document.getElementById("completed").value = completed; 
	document.getElementById("score").value = 0; 
}

//randomly generate operands and calculate correct result
function generateNum() {
	
	var maxNum = document.querySelector('input[name="maxNum"]:checked').value;
	var operator = document.getElementById("operator").value
	var formName = document.getElementById("myForm").name;
	var operand1 = Math.floor((Math.random() * maxNum)); 
	var operand2 = Math.floor((Math.random() * maxNum)); 
	
	//randomly generate an operator for mix operation
	if(formName == "mix"){
	var pick = ["+", "-", "*"];
	var picked = pick[Math.floor(Math.random() * pick.length)];
	operator = picked;
	document.getElementById("operator").value = picked;
	}
	
	//make sure the first operand is bigger than the second in subtraction
	if(operator == "-" && operand1 < operand2) {
	var temp = operand1;
	operand1 = operand2;
	operand1 = temp;
	}

	//evaluate the expression
	switch(operator){
	case "+":
	result = parseInt(operand1) + parseInt(operand2); 
	break;
	case "-":
	result = parseInt(operand1) - parseInt(operand2); 
	break;
	case "*":
	result = parseInt(operand1) * parseInt(operand2); 
	break;
	default:
	result = 0;
	}
	
	document.getElementById("operand1").value = operand1; 
	document.getElementById("operand2").value = operand2;
	
}

//check user's result
function check() {
	//prevent user from getting a free point without getting operands
	if(document.getElementById("operand1").value == "" && document.getElementById("operand2").value == "")
	{
		alert("Please get your operands");
		return;
		
	}
	++count;   // increment number of tries
	var formName = document.getElementById("myForm").name;
	
	switch(formName){
	case "add":
	var temp = addScore;
	addScore = display(addScore);
	document.getElementById("score").value = addScore;
	//make sure that records are only updated when you earn a point
	if(temp<addScore)
	{
		//send data
		records();
	}
	break;
	
	case "sub":
	var temp = subScore;
	subScore = display(subScore);
	document.getElementById("score").value = subScore;
	//make sure that records are only updated when you earn a point
	if(temp<subScore)
	{
		//send data
		records();
	}		
	break;
	
	case "mul":
	var temp = mulScore;
	mulScore = display(mulScore);
	document.getElementById("score").value = mulScore;
	//make sure that records are only updated when you earn a point
	if(temp<mulScore)
	{
		//send data
		records();
	}	
	break;
	
	case "mix":
	var temp = mixScore;
	mixScore = display(mixScore);
	document.getElementById("score").value = mixScore;
	//make sure that records are only updated when you earn a point
	if(temp<mixScore)
	{
		//send data
		records();
	}	
	break;
	}
	document.getElementById("completed").value = completed; 
}
	
	function display(tempScore){
	var myInput = document.getElementById("calculation").value;
    if(result == myInput){
		alert("Congratulations! That is the correct answer. Please continue with the new operands.");
		//keep track of attempts on arithmetic type
		var formName = document.getElementById("myForm").name;
		switch(formName){
		case "add":
		++addAttempt ;
		break;
		
		case "sub":
		++subAttempt;
		break;
		
		case "mul":
		++mulAttempt;
		break;
		
		case "mix":
		++mixAttempt;
		break;
		}
		
		++completed;
		++tempScore;
		count = 0;
		document.getElementById("count").value = count;
		
		generateNum();
	}
	else if (count < 3){
		alert("Error! This is attempt number "+count+" !");
		document.getElementById("count").value = count;
		}
	else{
		alert("That was your final attempt. The correct answer is: " + result+". Please continue with new operands.");
		//keep track of attempts on arithmetic type
		var formName = document.getElementById("myForm").name;
		switch(formName){
		case "add":
		++addAttempt ;
		break;
		
		case "sub":
		++subAttempt;
		break;
		
		case "mul":
		++mulAttempt;
		break;
		
		case "mix":
		++mixAttempt;
		break;
		}
		
		var temp = completed;
	
		++completed; 
		count = 0;
		document.getElementById("count").value = count;
		//make sure that records are only updated when you fail all three tries and completed a problem
		if(temp < completed)
		{
			//send data
			records();
		}
		generateNum();
	}

	return tempScore;
}

