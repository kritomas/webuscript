<?php
	require './DBC.php';
	require './user.php';

	session_start();

	if (empty($_POST["language"]))
	{
		header("Location: profile");
		exit();
	}

	$user = new User();
	$language = $_POST["language"];

	$query = DBC::getConnection()->prepare("update User set language = ? where username = ?");
	$query->bind_param("ss", $language, $user->name);
	$language = $_POST["language"];
	$user->name = $_SESSION["user"]->name;
	try
	{
		$query->execute();
	}
	catch (Exception $e)
	{
		die("Language too long.<br><a href=\"profile\">Back</a>");
	}
	$_SESSION["user"]->language = $_POST["language"];
	header("Location: profile");
?>