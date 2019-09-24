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
	.input-wrapper {
		display: flex;
		flex-direction: column;
		margin: 0px;
	}
</style>

<?php
	$movie = $_GET['movie'];
	$error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$rating = mysqli_real_escape_string($con, $_POST['rating']);
		$title = mysqli_real_escape_string($con, $_POST['title']);
		$comment = mysqli_real_escape_string($con, $_POST['comment']);

		$checkuser = mysqli_query($con, "SELECT `Username` FROM `user` WHERE `Email` IN (SELECT `Cemail` FROM `order` WHERE `MovieTitle` = '$movie' AND `status` = 'complete') AND `Username` = '$login_session';");

		if (mysqli_num_rows($checkuser) == 0) {
			$error = "Our records show your order status for this movie is incomplete, indicating you have not seen this movie. Therefore, you may not write a review.";
		}
		else {
			$result = mysqli_fetch_assoc(mysqli_query($con, "SELECT `Email` FROM `user` WHERE `Username` = '$login_session';"));
			$email = $result['Email'];
			$sql = "INSERT INTO `review` (`Title`, `Comments`, `Rating`, `Cemail`, `MovieTitle`) VALUES ('$title', '$comment', '$rating', '$email', '$movie'); UPDATE `movie` SET `AverageRating` = (SELECT	AVG(`Rating`) FROM `review` WHERE `MovieTitle` = '$movie') WHERE `movie`.`Title` = '$movie';";
			if (mysqli_multi_query($con, $sql)) {
				sleep(1);
				header("location: movie-review.php?movie=$movie&review=submitted");
			}
			else {
				$error = "Submission failed.";
			}
		}
	}
?>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px" id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Give Review</h1>
		<div style="font-family: 'Roboto', sans-serif; font-size: 14px; color: #cc0000; margin-top: 10px; width: 300px;"><?php echo $error; ?></div>
		<?php echo "<h2 style='margin-bottom: 0px;'>{$movie}</h2>"; ?>
		<div>
			<form action="" method="POST">
				<div class="input-wrapper">
					<h3 style='margin-bottom: 5px;'>Rating <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h3>
					<select id="rating" name="rating">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<div class="input-wrapper">
					<h3 style='margin-top: 25px; margin-bottom: 5px;'>Title <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h3>
					<input id="title" type="text" name="title" required>
				</div>
				<div class="input-wrapper">
					<h3 style='margin-top: 25px; margin-bottom: 5px;'>Comment <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h3>
					<!-- <input id="comment" type="text" name="comment" required> -->
					<textarea id="comment" rows="4" cols="50" name="comment"></textarea>
				</div>
				<div class="button-wrapper">
					<button id="submit" type="submit" style="margin-top: 10px;">Submit</button>
				</div>
			</form>
		</div>

		<div class="button-wrapper">
			<?php echo "<a id='back' href='movie-review.php?movie={$movie}'><button>Back</button></a>"; ?>
		</div>
	</div>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
</html>