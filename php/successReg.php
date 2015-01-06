<?php
	include_once ("startSession.php");
?>

<!DOCTYPE html>
<!-- sucessReg.php for Assignment 4, check if registration was successful and perform server side validation-->
<html lang = "en">
	<head>
		<title>Mathematics Mathematics</title>
		<meta charset ="utf-8" />
		<link rel="stylesheet" href="../css/A3.css">
		<script type="text/javascript"  src="../javascript/formValidation.php"></script>
	</head>
	
	<body>
		<?php
			include_once ("header.php");
		?>
		<?php
			include_once ("navBar.php");
		?>

		<section>
			<?php
				$unsuccessful = 0;
				$password1 = $_POST['passwrd1'];
				$password2 = $_POST['passwrd2'];
				
	
				//checks if each value is empty
				foreach ($_POST as $key => $value) 
				{
					if(empty($value))
					{
						$unsuccessful  = 1;
					}
				}
				
				//checks if the passwords match and if it is 8 characters long
				if($password1 != $password2 && count($password1) < 8)
				{
					$unsuccessful  = 2;
				}
				
				//redirects back to the registration page if something went wrong
				if($unsuccessful == 1 )
				{
					echo "<h1>--Redirecting to Registration Page--</h1>";
					echo "<h3>Registration was unsuccessful. Please fill in all the fields </h3>";
					header('Refresh:2; url = register.php');
				}	
				else if($unsuccessful == 2 )
				{
					echo "<h1>--Redirecting to Registration Page--</h1>";
					echo "<h3>Registration was unsuccessful. Password confirmation must match the password and be at least 8 characters long!</h3>";
					header('Refresh:2; url = register.php');
				}
				//if everything went well with the registration
				else
				{
					echo "<h1>--Redirecting to Login Page or Index Page (if already log in)--</h1>";
					echo "<h3>Registration was Successful. Congratulations. </h3>";
					//file name
					$file = './members.txt';
					
					//Registration, login, scores and attempts information are all saved in the same text file
					//checks if the file exists
					if(file_exists($file))
					{	
						//reads from existing file
						$oldArray = unserialize(file_get_contents($file));
						
						//get the count for the array and uses it to add to the new index
						$index = count($oldArray);
						
						//temporary array to add new registered user
						$myArray = array();
						$myArray[0] = $_POST['fname'];
						$myArray[1] = $_POST['lname'];
						$myArray[2] = $_POST['phone'];
						$myArray[3] = $_POST['email'];
						$myArray[4] = $_POST['loginName'];
						$myArray[5] = $_POST['passwrd1'];
						$myArray[6] = $_POST['passwrd2'];
								 
						$myArray[7] = 0;		//scoreAdd
						$myArray[8] = 0;		//scoreSub
						$myArray[9] = 0;		//scoreMul
						$myArray[10] = 0;		//scoreMix
						$myArray[11] = 0;		//scoreTotal
						
						$myArray[12] = 0;		//totalAdd
						$myArray[13] = 0;		//totalSub
						$myArray[14] = 0;		//totalMul
						$myArray[15] = 0;		//totalMix
						$myArray[16] = 0;		//totalOp
						
						//saves registered user to the new index and puts into the file
						$oldArray[$index] = $myArray;
						file_put_contents($file, serialize($oldArray));
						
						//if user is already log in and registers another user, it redirect to index page rather than login page
						if (isset($_SESSION['loginName'])) {
							header('Refresh:1; url = ../index.php');
						}
						else
							header('Refresh:1; url = login.php');
					}
				else{
						//create the array used to saved to file
						$storingArray = array();
						
						//temporary array to add new registered user
						$myArray = array();
						$myArray[0] = $_POST['fname'];
						$myArray[1] = $_POST['lname'];
						$myArray[2] = $_POST['phone'];
						$myArray[3] = $_POST['email'];
						$myArray[4] = $_POST['loginName'];
						$myArray[5] = $_POST['passwrd1'];
						$myArray[6] = $_POST['passwrd2'];
						 
						$myArray[7] = 0;		//scoreAdd
						$myArray[8] = 0;		//scoreSub
						$myArray[9] = 0;		//scoreMul
						$myArray[10] = 0;		//scoreMix
						$myArray[11] = 0;		//scoreTotal
						
						$myArray[12] = 0;		//totalAdd
						$myArray[13] = 0;		//totalSub
						$myArray[14] = 0;		//totalMul
						$myArray[15] = 0;		//totalMix
						$myArray[16] = 0;		//totalOp
						
						//saves registered user to starting index and puts it into the file
						$storingArray[0] = $myArray;
						file_put_contents($file, serialize($storingArray));

						header('Refresh:1; url = login.php');
					}
				}
		
			?>
		 </section>
		
		<?php
			include_once ("php/footer.php");
		?>
	</body>

</html>
