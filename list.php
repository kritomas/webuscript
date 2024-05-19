<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

require './DBC.php';
include './header.php';

session_start();

if (empty($_SESSION["user"]))
{
	header("Location: home");
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

printHeader("list");

echo'
		<main>';

$query = DBC::getConnection()->prepare("select username, password, language from User");
$query->execute();
$query = $query->get_result();
$users = $query->fetch_all(MYSQLI_ASSOC);
//var_dump($users);
foreach ($users as $u)
{
	echo'<div>';
	echo '<p>' . $u["username"] . ' <b>' . $u["language"] . '</b></p>';
	echo'</div>';
}

echo'
		</main>';

include './footer.php';

echo '
	</body>
</html>
';

?>