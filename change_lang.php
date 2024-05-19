<?php
require './user.php';

session_start();

if (empty($_SESSION["user"]))
{
	header("Location: home");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./styles.css">
		<title>Webuscript</title>
	</head>
	<body>
		<div class="form-div">
			<form action="handle_change_lang.php" method="post">
				<label for="language">New Language:</label>
				<input type="text" id="language" name="language"></input>
				<br>
				<button type="submit">Change</button>
			</form>
		</div>
	</body
</html>
