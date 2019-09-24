<?php
	require_once "../connection.php";
	require_once "../session.php";
?>

<html>
<link rel="stylesheet" type="text/css" href="../css/styles.css" />
<link rel="stylesheet" type="text/css" href="../css/login.css" />
<link rel="stylesheet" type="text/css" href="../css/now-playing.css" />
<link href="https://fonts.googleapis.com/css?family=Notable|Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php
	$movie = $_GET['movie'];
	$sql = mysqli_query($con, "SELECT Synopsis, Cast FROM movie WHERE Title = '$movie'");
	$result = mysqli_fetch_array($sql);

	$synopsis = $result['Synopsis'];
	$cast = explode(",", $result['Cast']);
?>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px" id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Overview</h1>
		<?php
			echo "
			<h2 style='margin-bottom: 0px;'>{$movie}</h2>
			<h3 style='margin-bottom: 0px;'>Synopsis</h3>
			<p style='text-align: center; background: #616161; padding: 10px; border-radius: 25px; color: #F5F5F5;'>{$synopsis}</p>
			<h3>Cast</h3>
			<table>
				<tr>
					<td>{$cast[0]}</td>
					<td>. . .</td>
					<td>{$cast[1]}</td>
				</tr>
				<tr>
					<td>{$cast[2]}</td>
					<td>. . .</td>
					<td>{$cast[3]}</td>
				</tr>
				<tr>
					<td>{$cast[4]}</td>
					<td>. . .</td>
					<td>{$cast[5]}</td>
				</tr>
				<tr>
					<td>{$cast[6]}</td>
					<td>. . .</td>
					<td>{$cast[7]}</td>
				</tr>
				<tr>
					<td>{$cast[8]}</td>
					<td>. . .</td>
					<td>{$cast[9]}</td>
				</tr>
			</table>
			";
		?>

		<div class="button-wrapper">
			<button id="back" onclick="goBack()">Back</button>
		</div>
	</div>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
</html>