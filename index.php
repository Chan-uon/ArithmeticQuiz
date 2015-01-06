<?php
	include_once ("php/startSession.php");
?>
<!DOCTYPE html>
<!-- index.php for Assignment 4 -->
<html lang = "en">
	<head>
		<title>Mathematics Mathematics</title>
		<meta charset ="utf-8" />
		<link rel="stylesheet" href="css/A3.css">
	</head>
	
	<body>
		<?php
			include_once ("php/indexHeader.php");
		?>
				
		<?php
			include_once ("php/indexNavBar.php");
		?>
				
		<section>
			<h1>Welcome to Mathematics Mathematics 
			<?php
			if (isset($_SESSION['loginName'])) {
				echo $_SESSION['loginName'];
			}
			?>
			</h1> 

			<p>
				Mathematics Mathematics is a simple arithmetic quizzing site. We provide arithmetic quizzes 
				to our registered users, where they can practice and improve their arithmetic skills. If you decide
				to register with us, you will have access to our quizzes and to our statistics page. The statistic page
				will display your progress as you attempt and complete arithmetic problems, as well as save and display 
				your scores. Registration is completely free and we welcome everyone to try our quizzes. Thank you 
				and enjoy your time visiting our website.
			</p>
			
		</section>
 
		<?php
			include_once ("php/footer.php");
		?>
	</body>
</html>