<?php

require './DBC.php';
include './header.php';
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

session_start();

echo '
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./styles.css">
		<title>Webuscript</title>
	</head>
	<body>';

	headerHome();

	echo'
		<main>
			<p>
				WELKAM to Webuscript. Here we make programming languages and keep track of perogramming languages and account and all those weird languagy things.
			</p>
		</main>';

include './footer.php';

echo '
	</body>
</html>
';

?>