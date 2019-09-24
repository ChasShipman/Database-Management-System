<?php
	require_once "../connection.php";
	require_once "../session.php";
?>

<html>
<link rel="stylesheet" type="text/css" href="../css/styles.css" />
<link rel="stylesheet" type="text/css" href="../css/login.css" />
<link rel="stylesheet" type="text/css" href="../css/now-playing.css" />
<link rel="stylesheet" type="text/css" href="../css/movie.css" />
<link href="https://fonts.googleapis.com/css?family=Notable|Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php
	$movie = $_GET['movie'];
	$sql = mysqli_query($con, "SELECT Rating, Genre, Length, AverageRating, ReleaseDate FROM movie WHERE Title = '$movie'");
	$result = mysqli_fetch_array($sql);

	$rating = $result['Rating'];
	$genre = $result['Genre'];
	$length = date('g \h\r i \m\i\n' , strtotime($result['Length']));
	$avgrating = number_format($result['AverageRating'], 1);
	$releasedate = date('F j, Y', strtotime($result['ReleaseDate']));
?>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px" id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Movie</h1>
		<?php echo "<h2 style='margin-right: 0px;'>{$movie}</h2>"; ?>
		<div class="movie-container">
			<div class="left">
				<?php
					echo "
					Released: {$releasedate}<br/><br/>
					Rated: {$rating}<br/><br/>
					{$length}<br/><br/>
					{$genre}<br/><br/>
					Rating: {$avgrating}
					";
				?>
			</div>
			<div class="button-wrapper">
				<?php echo "<a href='overview.php?movie={$movie}'><button>Overview</button></a>"; ?>
				<?php echo "<a href='movie-review.php?movie={$movie}'><button>Review</button></a>"; ?>
				<?php echo "<a href='choose-theatre.php?movie={$movie}'><button>Buy Ticket</button></a>"; ?>
			</div>
		</div>
		<div class="button-wrapper">
			<a href="now-playing.php"><button id="back">Back</button></a>
		</div>
	</div>
</body>
</html>