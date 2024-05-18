<?php

require './DBC.php';
include './header.php';

session_start();

if (empty($_SESSION["user"]))
{
	header("Location: index.php");
	exit();
}

echo '
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./styles.css">
		<title>Webuscript</title>
	</head>
	<body>';

printHeader("profile");

echo'
		<main>
			<p>Username: <b>';
echo $_SESSION["user"]->name;
echo '
			</b></p>
		</main>';

include './footer.php';

echo '
	</body>
</html>
';

?>