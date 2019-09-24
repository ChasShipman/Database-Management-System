<?php
	require_once "../session.php";
?>

<html>
<link rel="stylesheet" type="text/css" href="../css/styles.css" />
<link rel="stylesheet" type="text/css" href="../css/login.css" />
<link rel="stylesheet" type="text/css" href="../css/now-playing.css" />
<link href="https://fonts.googleapis.com/css?family=Notable|Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body>
	<div class="container">
		<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		<h1>Choose Functionality</h1>
		<a href="revenue-report.php"><h2>View Revenue Report</h2></a>
		<a href="popular-report.php"><h2>View Popular Movie Report</h2></a>
	</div>
</body>
</html>