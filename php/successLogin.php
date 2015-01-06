<?php
	include_once ("startSession.php");
?>

<!DOCTYPE html>
<!-- successLogin.php for Assignment 4, check if login was successful -->
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
				//file name
				$file= './members.txt';
				
				//check if file exist
				if(file_exists($file))
				{
				
					$loginName = $_POST['loginName'];
					$password1 = $_POST['passwrd1'];

					$correctLogin = false;
		
					//reads from existing file
					$oldArray = unserialize(file_get_contents($file));
					
					//check if  login name is the same and allows the next iteration in the loop to check password
					$firstCheck = false;
					//make sure the password is in the same index
					$sameIndex = 0;
					
					for($i = 0; $i < count($oldArray); $i++)
					{	
						for($j = 0; $j < count($oldArray[$i]); $j++)
							{
								if($oldArray[$i][$j] == $loginName)
								{
									$firstCheck = true;
									$sameIndex = $i;
								}
								if( $oldArray[$i][$j] == $password1 && $firstCheck == true && $i == $sameIndex)
									{
										$correctLogin = true;
										break;
									}
							
							}
					}
				
								
					if($correctLogin == 1)
						{
							$_SESSION['loginName'] = $loginName;
							$_SESSION['index']	= $sameIndex;
							
							
							$_SESSION['scoreAdd'] = 0;
							$_SESSION['scoreMul'] = 0;
							$_SESSION['scoreSub'] = 0;
							$_SESSION['scoreMix'] = 0;
							$_SESSION['scoreTotal'] = $_SESSION['scoreAdd'] + $_SESSION['scoreSub'] + $_SESSION['scoreMul'] + $_SESSION['scoreMix'];
							
							$_SESSION['totalAdd'] = 0;
							$_SESSION['totalMul'] = 0;
							$_SESSION['totalSub'] = 0;
							$_SESSION['totalMix'] = 0;
							$_SESSION['totalOp'] = 0;
							
							echo "<h1>--Redirecting to Home Page--</h1>";
							echo "<h3>Login was Successful. Congratulations. </h3>";
						
							header('Refresh:1; url = ../index.php');
						}
					else
						{
							echo "<h1>--Redirecting to Login Page--</h1>";
							echo "<h3>Login was unsuccessful. Login or Password did not match</h3>";
							header('Refresh:2; url = login.php');
						}
				}
				else
				{			
							//if no one is registered
							echo "<h1>--Redirecting to Registration Page--</h1>";
							echo "<h3>Login was unsuccessful. There are currently no user registered</h3>";
							header('Refresh:2; url = register.php');
				}
		?>

		 </section>
		
		<?php
			include_once ("php/footer.php");
		?>
	</body>

</html>
