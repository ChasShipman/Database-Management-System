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
	.error-msg {
		font-family: 'Roboto', sans-serif;
		font-size: 14px;
		color: red;
		margin-top: 25px;
		margin-bottom: 25px;
	}

	input {
		width: 15px;
		height: 15px;
	}

	table {
		font-family: 'Roboto', sans-serif;
		font-size: 18px;
		text-align: center;

		border: 1px solid #ddd ;
		border-collapse: collapse;
		border-radius: 25px;

		margin:2px;
		margin-left: auto;
		margin-right: auto;
	}

	table td {
		width: auto;
		height: 40px;
		border: 1px solid #ddd ;
		border-collapse: collapse;
		padding-left: 10px;
		padding-right: 10px;
	}

	table tr:nth-child(odd) {
		text-align: center;
		padding-left: 5px;
		background-color: #f2f2f2;
		border: 1px solid #ddd ;
		border-collapse: collapse;
	}

	table td:hover {
		background-color: #ddd;
	}

	table th {
		width: auto;
		padding-left: 10px;
		padding-right: 10px;
		background: #616161;
		color: #F5F5F5;
	}

	.horizontal {
		display: flex;
		flex-direction: row;
	}
</style>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$movie = $_GET['movie'];
		$theatre = $_GET['theatre'];
		$time = $_POST['select'];

		header("location: buy-ticket.php?movie=$movie&theatre=$theatre&$time");
	}
?>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px"  id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Select Time</h1>

		<?php
			$movie = $_GET['movie'];
			$tid = $_GET['theatre'];
			$sql = "SELECT * FROM `playsat` JOIN `movie` ON `playsat`.`MovieTitle`=`movie`.`Title` WHERE `MovieTitle` = '$movie' AND `TheatreID` = '$tid'";
			$result = mysqli_query($con, $sql);

			if (mysqli_num_rows($result) == 0) {
				echo "<div class='error-msg'>Error.</div>";
			}
			else {
				echo "
				<div style='max-height: 300px; overflow-y: auto;'>
				<form action='' method='POST'>
					<table>
						<tr>
							<th>Select</th>
							<th>Date</th>
							<th>Show Time</th>
						</tr>
				";
				$daydisplay = [];
				$dayvalue = [];
				$period = new DatePeriod(
					new DateTime(), // Start date of the period
					new DateInterval('P1D'), // Define the intervals as Periods of 1 Day
					6 // Apply the interval 6 times on top of the starting date
				);

				foreach ($period as $day)
				{
					$day->setTimezone(new DateTimeZone('America/Chicago'));
					$daydisplay[] = $day->format('l, F j, Y');
					$dayvalue[] = $day->format('Y-m-d');
				}

				$times = mysqli_fetch_assoc($result);
				for ($i = 0; $i < 6; $i++) {
					if (date('h' , strtotime($times['ShowTime']) > 11)) {
						$ampm = 'pm';
					}
					else {
						$ampm = 'am';
					}
					$time = date('h:i' , strtotime($times['ShowTime']));
					echo "
						<tr>
							<td><input type='radio' name='select' value='day={$dayvalue[$i]}&time={$times['ShowTime']}'></td>
							<td>{$daydisplay[$i]}</td>
							<td>{$time} $ampm</td>
						</tr>
					";
				}
				/* while ($times = mysqli_fetch_assoc($result)) {

				} */
				echo "
					</table>
					</div>
					<div class='button-wrapper'>
						<button id='submit' type='submit' style='margin-top: 10px;'>Select</button>
					</div>
				</form>";
			}
		?>

		<div class="button-wrapper">
			<button id="back" onclick="goBack()">Back</button>
		</div>
	</div>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
</html>