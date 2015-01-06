<?php
			if (isset($_SESSION['loginName'])) {
				echo "
					<nav>
						<ul>
							<li><a href=\"../index.php\">Home</a></li>
							<li><a href=\"register.php\">Register</a></li>
							<li><a href=\"../index.php?log=out\">Logout</a></li>
							<li>Quiz Me
								<ul class=\"leftMargin\">
									<li><a href=\"addition.php\">Addition</a></li>
									 <li><a href=\"subtraction.php\">Subtraction</a></li>
									 <li><a href=\"multiplication.php\">Multiplication</a></li>
									 <li><a href=\"mix.php\">Mix</a></li>
								</ul>
							</li>
							<li><a href=\"myStats.php\">My Stats</a></li>
							<li><a href=\"contact.php\">Contact Us</a></li>
						</ul>
					</nav>
						
				"; //end of echo
						
            } else {
				echo "
                    <nav>
						<ul>
							<li><a href=\"../index.php\">Home</a></li>
							<li><a href=\"register.php\">Register</a></li>
							<li><a href=\"login.php\">Login</a></li>
							<li>Quiz Me
								<ul class=\"leftMargin\">
									<li><a href=\"login.php\">Addition</a></li>
									 <li><a href=\"login.php\">Subtraction</a></li>
									 <li><a href=\"login.php\">Multiplication</a></li>
									 <li><a href=\"login.php\">Mix</a></li>
								</ul>
							</li>
							<li><a href=\"login.php\">My Stats</a></li>
							<li><a href=\"contact.php\">Contact Us</a></li>
						</ul>
					</nav>
						
			"; //end of echo
                }
?>