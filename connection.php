<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db     = "uamovie";
	$con    = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die ("Connection failed: {$con}");
?>