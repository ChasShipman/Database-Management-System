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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
	h3 {
		margin-top: 0px;
		margin-bottom: 0px;
		margin-right: 15px;
	}

	.detail {
		display: flex;
		flex-direction: row;
		justify-content: center;
		margin-top: 25px;
		padding: 15px;

		border: 2px solid #616161;
		border-radius: 25px;
	}

	.left {
		margin-right: 25px;
	}

	.right {

	}

	input {
		width: 25px;
		height: 25px;
	}

	.input-wrapper {
		display: flex;
		flex-direction: row;
		margin: 0px;
		justify-content: left;
	}

	.wrapper {
		align-items: left;
	}
</style>

<?php
$error = "";
	$movie = $_GET['movie'];
	$theatre = $_GET['theatre'];
	$time = $_GET['time'];
	$day = $_GET['day'];

	$sql = "SELECT * FROM `movie` JOIN `theatre` WHERE `Title` = '$movie' AND `TheatreID` = $theatre";
	$result = mysqli_fetch_assoc(mysqli_query($con, $sql));

	$length = date('g \h\r i \m\i\n' , strtotime($result['Length']));
	$date = date('F j, Y', strtotime($day));
	if (date('h' , strtotime($time) > 11)) {
		$ampm = 'pm';
	}
	else {
		$ampm = 'am';
	}
	$formattime = date('h:i' , strtotime($time));

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$adult = mysqli_real_escape_string($con, $_POST['adult']);
		$senior = mysqli_real_escape_string($con, $_POST['senior']);
		$child = mysqli_real_escape_string($con, $_POST['child']);
		$total = $adult + $senior + $child;

		if ($total == 0) {
			$error = "Please select at least one ticket.";
		}
		else {
			header("location: buy-ticket-payment.php?movie=$movie&theatre=$theatre&time=$time&day=$day&adult=$adult&senior=$senior&child=$child");
		}
	}
?>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px"  id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Buy Ticket</h1>
		<div style="font-family: 'Roboto', sans-serif; font-size: 14px; color: #cc0000; margin-top: 10px;"><?php echo $error; ?></div>
		<div class="detail">
			<div class="left">
				<?php
					echo "
						<h3>{$result['Title']}</h3>
						<em>{$result['Rating']}, {$length}</em></br></br></br>
						<strong>{$date}</br>
						{$formattime} {$ampm}</strong>
					";
				?>
			</div>
			<div class="right">
				<?php
					echo "
						<h3>{$result['Name']}</h3>
						{$result['Address']} {$result['Street']}</br>
						{$result['City']}, {$result['State']} {$result['ZipCode']}</br></br>
					";
				?>
			</div>
		</div>
		<div style="height: 3px; width: 500px; background: black; margin: 15px"></div>
		<div class="wrapper">
			<h3 style="color: #b71c1c">How many tickets?</h3><br>
			<form action="" method="POST">
				<div class="input-wrapper">
					<h3 style='margin-bottom: 5px; margin-right: 25px'>Adult</h3>
					<select class="select-adult" id="adult" name="adult">
						<option data-price="0" value="0">0</option>
						<option data-price="1" value="1">1</option>
						<option data-price="2" value="2">2</option>
						<option data-price="3" value="3">3</option>
						<option data-price="4" value="4">4</option>
						<option data-price="5" value="5">5</option>
					</select>
					* 11.54 = &nbsp;$ <span id="adult-price">0.00</span>
				</div>
				<div class="input-wrapper">
					<h3 style='margin-bottom: 5px;'>Senior</h3>
					<select class="select-senior" id="senior" name="senior">
						<option data-price="0" value="0">0</option>
						<option data-price="1" value="1">1</option>
						<option data-price="2" value="2">2</option>
						<option data-price="3" value="3">3</option>
						<option data-price="4" value="4">4</option>
						<option data-price="5" value="5">5</option>
					</select>
					* 11.54 * 80% = &nbsp;$ <span id="senior-price">0.00</span>
				</div>
				<div class="input-wrapper">
					<h3 style='margin-bottom: 5px; margin-right: 27px'>Child</h3>
					<select class="select-child" id="child" name="child">
						<option data-price="0" value="0">0</option>
						<option data-price="1" value="1">1</option>
						<option data-price="2" value="2">2</option>
						<option data-price="3" value="3">3</option>
						<option data-price="4" value="4">4</option>
						<option data-price="5" value="5">5</option>
					</select>
					* 11.54 * 70% = &nbsp;$ <span id="child-price">0.00</span>
				</div>
				<div class="button-wrapper">
					<button id="submit" type="submit" style="margin-top: 10px;">Next</button>
				</div>
			</form>
		</div>
		<div class="button-wrapper">
			<button id="back" onclick="goBack()">Back</button>
		</div>
	</div>
	<script>
		$(".select-adult").change(function () {
			newPrice = 11.54 * $(this).children(':selected').data('price');
			// console.log(newPrice);
			$("#adult-price").html(newPrice.toFixed(2));
		});
		$(".select-senior").change(function () {
			newPrice = 11.54 * $(this).children(':selected').data('price') * .8;
			// console.log(newPrice);
			$("#senior-price").html(newPrice.toFixed(2));
		});
		$(".select-child").change(function () {
			newPrice = 11.54 * $(this).children(':selected').data('price') * .7;
			// console.log(newPrice);
			$("#child-price").html(newPrice.toFixed(2));
		});
	</script>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
</html>