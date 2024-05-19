<?php
	require './DBC.php';
	require 'user.php';

	session_start();

	if (empty($_POST["username"]) || empty($_POST["password"]))
	{
		header("Location: home");
		exit();
	}

	$user = new User();
	$user->name = $_POST["username"];
	$user->password = password_hash($_POST["password"], PASSWORD_DEFAULT);

	$query = DBC::getConnection()->prepare("insert into User (username, password) values (?, ?);");
	$query->bind_param("ss", $user->name, $user->password);
	$user->name = $_POST["username"];
	$user->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	try
	{
		$query->execute();
	}
	catch (Exception $e)
	{
		die("Username already taken.<br><a href=\"home\">Back</a>");
	}

	$_SESSION["user"] = $user;
	$_SESSION["attempts"] = 0;

	header("Location: home");
?>