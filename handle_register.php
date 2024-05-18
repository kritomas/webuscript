<?php
	require './DBC.php';
	require 'user.php';

	session_start();

	if (empty($_POST["username"]) || empty($_POST["password"]))
	{
		header("Location: index.php");
		exit();
	}

	$user = new User();
	$user->name = $_POST["username"];
	$user->password = password_hash($_POST["password"], PASSWORD_DEFAULT);

	$query = DBC::getConnection()->prepare("insert into User (username, password) values (?, ?);");
	$query->bind_param("ss", $user->name, $user->password);
	$user->name = $_POST["username"];
	$user->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$query->execute();

	$_SESSION["user"] = $user;

	header("Location: index.php");
?>