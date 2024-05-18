<?php

require './user.php';

session_start();

function printHeader($page)
{
	echo '
	<header>
		<img src="logo.png" style="height: 3em; padding-right: 10px">
		<div>';

	if (!empty($_SESSION["user"]))
	{
		echo 'Logged in as <b>' . $_SESSION["user"]->name . '</b>';
	}
	if ($page === "home")
	{
		echo '<b>';
	}
	echo'<a href="home">Home</a>';
	if ($page === "home")
	{
		echo '</b>';
	}
	if (!empty($_SESSION["user"]))
	{
		if ($page === "profile")
		{
			echo '<b>';
		}
		echo'<a href="profile">Profile</a>';
		if ($page === "profile")
		{
			echo '</b>';
		}
	}
	echo'<a href="register">Register</a>';
	echo'<a href="login">Log In</a>';
	if (!empty($_SESSION["user"]))
	{
		echo'
			<a href="handle_logout.php">Log Out</a>';
	}
	echo'
		</div>
	</header>';
}

?>