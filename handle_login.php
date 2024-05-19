<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

	require './DBC.php';
	require './user.php';
	require './log.php';

	session_start();
	if (empty($_SESSION["attempts"]))
	{
		$_SESSION["attempts"] = 0;
	}

	if (empty($_POST["username"]) || empty($_POST["password"]))
	{
		header("Location: home");
		exit();
	}

	$user = new User();
	$user->name = $_POST["username"];

	$query = DBC::getConnection()->prepare("select username, password, language from User where username = ?");
	$query->bind_param("s", $user->name);
	$user->name = $_POST["username"];
	$query->execute();

	$query = $query->get_result();

	if ($query->num_rows <= 0)
	{
		$_SESSION["attempts"] = $_SESSION["attempts"] + 1;
		if ($_SESSION["attempts"] >= 3)
		{
			logToFile("Hack attempt detected! On nonexistent user: " . $_POST["username"] . ", attempts: " . $_SESSION["attempts"]);
		}
		die("Unknown user.<br><a href=\"home\">Back</a>");
	}
	$row = $query->fetch_assoc();
	$user->name = $row["username"];
	$user->password = $row["password"];
	$user->language = $row["language"];
	if (!password_verify($_POST["password"], $row["password"]))
	{
		$_SESSION["attempts"] = $_SESSION["attempts"] + 1;
		if ($_SESSION["attempts"] >= 3)
		{
			logToFile("Hack attempt detected! On user: " . $_POST["username"] . ", attempts: " . $_SESSION["attempts"]);
		}
		die("Wrong password.<br><a href=\"home\">Back</a>");
	}
	$_SESSION["user"] = $user;
	$_SESSION["attempts"] = 0;

	header("Location: home");
?>