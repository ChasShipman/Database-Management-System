<?php
	require_once "../connection.php";
	require_once "../session.php";
?>

<html>
<link rel="stylesheet" type="text/css" href="../css/styles.css" />
<link rel="stylesheet" type="text/css" href="../css/now-playing.css" />
<link rel="stylesheet" type="text/css" href="../css/login.css" />
<link rel="stylesheet" type="text/css" href="../css/me.css" />
<link href="https://fonts.googleapis.com/css?family=Notable|Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
	.horizontal {
		display: flex;
		flex-direction: row;
	}

	form {
		display: flex;
		flex-direction: row;
	}
</style>

<?php
	$movie = $_GET['movie'];
	$error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$theatre = mysqli_real_escape_string($con, $_POST['saved-theatre']);
		$searchtheatre = mysqli_real_escape_string($con, $_POST['search']);

		if ($theatre != NULL) {
			header("location: select-time.php?movie=$movie&theatre=$theatre");
		}
		else if ($searchtheatre != NULL) {
			header("location: theatre-results.php?movie=$movie&search=$searchtheatre");
		}
	}
?>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px"  id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Choose Theatre</h1>
		<div class="horizontal">
			<form action="" method="POST">
				<div class="input-wrapper">
					<h3 style='margin-right: 10px;'>Saved Theatre</h3>
					<select id="saved-theatre" name="saved-theatre">
						<?php
							$sql = "SELECT * FROM `prefers` JOIN `theatre` ON `prefers`.`TheatreID`=`theatre`.`TheatreID` WHERE `prefers`.`Username` = '$login_session'";
							$result = mysqli_query($con, $sql);

							while ($savedtheatre = mysqli_fetch_assoc($result)) {
								echo "<option value='{$savedtheatre['TheatreID']}'>{$savedtheatre['Name']}</option>";
							}
						?>
					</select>
				</div>
				<div class="button-wrapper">
					<button id="submit" type="submit" style="margin-left: 10px;">Choose</button>
				</div>
			</form>
		</div>
		<div>
			<form action="" method="POST">
				<div class="input-wrapper">
					<h3 style='margin-left: 10px; margin-right: 10px;'>City/State/Theatre</h3>
					<input id="search" type="text" name="search" value="Tuscaloosa">
				</div>
				<div class="button-wrapper">
					<button id="submit" type="submit" style="">Search</button>
				</div>
			</form>
		</div>
		<div class="button-wrapper">
			<?php echo "<a href='movie.php?movie={$_GET['movie']}'><button id='back'>Back</button></a>"; ?>
		</div>
	</div>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
</html>