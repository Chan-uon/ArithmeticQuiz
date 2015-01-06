<?php
	include_once ("startSession.php");
?>

<?php
						//updates all the session variables used for displaying the statistics via ajax, using the function records() in calculation.php found in the javascript folder.
						$_SESSION['scoreAdd'] += $_POST['addScore'];
						$_SESSION['scoreSub'] += $_POST['subScore'];
						$_SESSION['scoreMul'] += $_POST['mulScore'];
						$_SESSION['scoreMix'] += $_POST['mixScore'];
						$_SESSION['scoreTotal'] = $_SESSION['scoreAdd'] + $_SESSION['scoreSub'] + $_SESSION['scoreMul'] + $_SESSION['scoreMix'];
			
						$_SESSION['totalAdd'] += $_POST['addAttempt'];
						$_SESSION['totalSub'] += $_POST['subAttempt'];
						$_SESSION['totalMul'] += $_POST['mulAttempt'];
						$_SESSION['totalMix'] +=$_POST['mixAttempt'];
						$_SESSION['totalOp'] += $_POST['completed'];
			
?>

