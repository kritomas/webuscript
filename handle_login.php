<?php
	require './DBC.php';
	require './user.php';

	session_start();

	if (empty($_POST["username"]) || empty($_POST["password"]))
	{
		header("Location: index.php");
		exit();
	}

	$user = new User();
	$user->name = $_POST["username"];

	$query = DBC::getConnection()->prepare("select username, password from User where username = ?");
	$query->bind_param("s", $user->name);
	$user->name = $_POST["username"];
	$query->execute();

	$query = $query->get_result();

	var_dump($query);
	if ($query->num_rows <= 0)
	{
		die("Unknown user");
	}
	$row = $query->fetch_assoc();
	$user->name = $row["username"];
	$user->password = $row["password"];
	if (!password_verify($_POST["password"], $row["password"]))
	{
		die("wrong password");
	}
	$_SESSION["user"] = $user;

	header("Location: index.php");
?>