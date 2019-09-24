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
	.review-container {
		max-height: 300px;
		overflow-y: auto;

		margin-top: 15px;
	}

	.review {
		background: #616161;
		border-radius: 25px;
		padding: 15px;
		margin-bottom: 15px;

		height: auto;
		width: 500px;

		color: #F5F5F5;
	}

	.error-msg {
		font-family: 'Roboto', sans-serif;
		font-size: 14px;
		color: red;
		margin-top: 25px;
		margin-bottom: 25px;
	}
</style>

<?php
	$movie = $_GET['movie'];
	$avgsql = mysqli_query($con, "SELECT AverageRating FROM movie WHERE Title = '$movie'");
	$result = mysqli_fetch_array($avgsql);
	$avgrating = number_format($result['AverageRating'], 1);
?>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px"  id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Movie Review</h1>
		<?php
			if (@$_GET['review'] == 'submitted') echo '<h2 style="color: green;">Your review was submitted.</h2>';
			echo "<h2>{$movie}</h2>";
			echo "<h3 style='margin-top: 0px;'>Average Rating: {$avgrating}</h3>";
		?>
		<div class="button-wrapper">
			<?php echo "<a href='give-review.php?movie={$movie}'><button>Give Review</button></a>"; ?>
		</div>
		<?php
			$sql = "SELECT Title, Comments, Rating FROM review WHERE MovieTitle = '$movie'";
			$result = mysqli_query($con, $sql);

			if (mysqli_num_rows($result) == 0) {
				echo "<div class='error-msg'>There are no reviews yet.</div>";
			}
			else {
				echo "<div class='review-container'>";
				while ($review = mysqli_fetch_assoc($result)) {
					echo "
						<div class='review'>
							<strong>Title:</strong> {$review['Title']}</br>
							<strong>Rating:</strong> {$review['Rating']}</br>
							<strong>Comment:</strong> {$review['Comments']}
						</div>
					";
				}
				echo "</div>";
			}
		?>
		<div class="button-wrapper">
			<?php echo "<a id='back' href='movie.php?movie={$movie}'><button>Back</button></a>"; ?>
		</div>
	</div>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
</html>