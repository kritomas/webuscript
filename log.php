<?php

function logToFile($message)
{
	$timestamp = date('Y-m-d H:i:s');
	error_log( '[' . $timestamp . '] ' . $message . PHP_EOL, 3, "./runtime.log");
}

?>