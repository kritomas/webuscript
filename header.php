<?php

session_start();

function headerHome()
{
	echo '
	<header>
		<div>';

	if (!empty($_SESSION["username"]))
	{
		echo 'Logged in as <b>' . $_SESSION["username"] . '</b>
			<a href="handle_logout.php">Log Out</a>
			';
	}
	echo'

			<b><a href="home">Home</a></b>
			<a href="register">Register</a>
			<a href="login">Log In</a>
		</div>
	</header>';
}

?>