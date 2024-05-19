<?php
	require './DBC.php';
	require './user.php';

	session_start();

	if (empty($_POST["language"]))
	{
		header("Location: home");
		exit();
	}

	$_SESSION["user"]->language = $_POST["language"];
	$user = new User();

	$query = DBC::getConnection()->prepare("update User set language = ? where username = ?");
	$query->bind_param("ss", $user->language, $user->name);
	$user->language = $_POST["language"];
	$user->name = $_SESSION["user"]->name;
	$query->execute();

	header("Location: profile");
?>