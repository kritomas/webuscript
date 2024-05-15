<?php
	require './DBC.php';

	session_start();

	if (empty($_POST["username"]) || empty($_POST["password"]))
	{
		header("Location: index.php");
		exit();
	}

	$username = $_POST["username"];

	$query = DBC::getConnection()->prepare("select username, password from User where username = ?");
	$query->bind_param("s", $username);
	$username = $_POST["username"];
	$query->execute();

	$query = $query->get_result();

	var_dump($query);
	if ($query->num_rows <= 0)
	{
		die("Unknown user");
	}
	$row = $query->fetch_assoc();
	$username = $row["username"];
	if (!password_verify($_POST["password"], $row["password"]))
	{
		die("wrong password");
	}
	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;

	header("Location: index.php");
?>