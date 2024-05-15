<?php
	require './DBC.php';

	session_start();

	if (empty($_POST["username"]) || empty($_POST["password"]))
	{
		header("Location: index.php");
		exit();
	}

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

	$query = DBC::getConnection()->prepare("insert into User (username, password) values (?, ?);");
	$query->bind_param("ss", $username, $password);
	$username = $_POST["username"];
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$query->execute();

	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;

	header("Location: index.php");
?>