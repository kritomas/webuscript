<?php

session_start();

$_SESSION["user"] = null;
$_SESSION["attempts"] = 0;

header("Location: home");

?>