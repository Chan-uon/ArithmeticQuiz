<?php
			if (isset($_SESSION['loginName'])) {
				echo "
					<nav>
						<ul>
							<li><a href=\"index.php\">Home</a></li>
							<li><a href=\"php/register.php\">Register</a></li>
							<li><a href=\"index.php?log=out\">Logout</a></li>
							<li>Quiz Me
								<ul class=\"leftMargin\">
									<li><a href=\"php/addition.php\">Addition</a></li>
									 <li><a href=\"php/subtraction.php\">Subtraction</a></li>
									 <li><a href=\"php/multiplication.php\">Multiplication</a></li>
									 <li><a href=\"php/mix.php\">Mix</a></li>
								</ul>
							</li>
							<li><a href=\"php/myStats.php\">My Stats</a></li>
							<li><a href=\"php/contact.php\">Contact Us</a></li>
						</ul>
					</nav>
						
				"; //end of echo
						
            } else {
				echo "
                    <nav>
						<ul>
							<li><a href=\"index.php\">Home</a></li>
							<li><a href=\"php/register.php\">Register</a></li>
							<li><a href=\"php/login.php\">Login</a></li>
							<li>Quiz Me
								<ul class=\"leftMargin\">
									<li><a href=\"php/login.php\">Addition</a></li>
									 <li><a href=\"php/login.php\">Subtraction</a></li>
									 <li><a href=\"php/login.php\">Multiplication</a></li>
									 <li><a href=\"php/login.php\">Mix</a></li>
								</ul>
							</li>
							<li><a href=\"php/login.php\">My Stats</a></li>
							<li><a href=\"php/contact.php\">Contact Us</a></li>
						</ul>
					</nav>
						
			"; //end of echo
                }
?>