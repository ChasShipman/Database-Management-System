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

		height: auto;
	}

	.left {
		margin-right: 25px;
	}

	.right {

	}

	.input-wrapper {
		display: flex;
		justify-content: flex-end;
		align-items: center;
		flex-direction: row;
		margin: 0px;
	}

	.horizontal {
		display: flex;
		flex-direction: row;
	}

	form#saved {
		display: flex;
		flex-direction: row;
	}

	input#check {
		width: 15px;
		height: 15px;
	}

	.wrapper {
		display: flex;
		flex-direction: row;
		align-items: center;
	}
</style>

<?php
	$error = $errorname = $errorcard = $errorcvv = $errorexp = "";
	$movie = $_GET['movie'];
	$theatre = $_GET['theatre'];
	$time = $_GET['time'];
	$day = $_GET['day'];
	$adult = (int)$_GET['adult'];
	$senior = (int)$_GET['senior'];
	$child = (int)$_GET['child'];
	$totalcost = (float)($adult * 11.54) + (float)($senior * 11.54 * .8) + (float)($child * 11.54 * .7);
	$totalcost = number_format((float)$totalcost, 2, '.', '');
	$totaltickets = $adult + $senior + $child;

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
		$savedpayment = NULL;
		if (isset($_POST['saved-payment'])) {
			$savedpayment = mysqli_real_escape_string($con, $_POST['saved-payment']);
		}

		if ($savedpayment != NULL) {
			$cemail = mysqli_fetch_assoc(mysqli_query($con, "SELECT `Email` FROM `user` WHERE `Username` = '$login_session'"));
			$cemail = $cemail['Email'];
			$orderid = mysqli_fetch_assoc(mysqli_query($con, "SELECT `OrderID` FROM `order` ORDER BY `OrderID` DESC LIMIT 1"));
			$orderid = (int)$orderid['OrderID'] + 1;
			$sql = "INSERT INTO `order`
				(`OrderID`, `Date`, `NoSeniorTickets`, `NoAdultTickets`, `NoChildTickets`, `Time`, `TotalTickets`, `TotalCost`, `Status`, `Cemail`, `MovieTitle`, `CardNo`, `TheatreID`)
				VALUES
				($orderid, '$day', $senior, $adult, $child, '$time', $totaltickets, $totalcost, 'unused', '$cemail', '$movie', $savedpayment, $theatre)
				";
			mysqli_query($con, $sql);
			header("location: buy-ticket-confirmation.php?order=$orderid");
		}
		else if ($savedpayment == NULL) {
			$nameoncard = mysqli_real_escape_string($con, $_POST['nameOnCard']);
			$cardno = mysqli_real_escape_string($con, $_POST['cardNumber']);
			$cvv = mysqli_real_escape_string($con, $_POST['cvv']);
			$expdate = mysqli_real_escape_string($con, $_POST['expDate']);
			$regex = "/^[0-9]{4}-[0-12]{2}-01$/";

			if (strlen($cardno) != 16) {
				$errorcard = "Invalid card length.";
			}
			else if (strlen($cvv) != 3) {
				$errorcvv = "Invalid CVV length.";
			}
			else if (!preg_match($regex, $expdate)) {
				$errorexp = "Invalid expiration date. Date must be formatted YYYY-MM-01.";
			}
			else {
				$cemail = mysqli_fetch_assoc(mysqli_query($con, "SELECT `Email` FROM `user` WHERE `Username` = '$login_session'"));
				$cemail = $cemail['Email'];

				$orderid = mysqli_fetch_assoc(mysqli_query($con, "SELECT `OrderID` FROM `order` ORDER BY `OrderID` DESC LIMIT 1"));
				$orderid = (int)$orderid['OrderID'] + 1;

				$sql = "INSERT INTO `order`
					(`OrderID`, `Date`, `NoSeniorTickets`, `NoAdultTickets`, `NoChildTickets`, `Time`, `TotalTickets`, `TotalCost`, `Status`, `Cemail`, `MovieTitle`, `CardNo`, `TheatreID`)
					VALUES
					($orderid, '$day', $senior, $adult, $child, '$time', $totaltickets, $totalcost, 'unused', '$cemail', '$movie', $cardno, $theatre)
					";
				mysqli_query($con, $sql);

				if (isset($_POST['save']) && $_POST['save'] == 'Yes') {
					if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM `paymentinfo` WHERE `Cemail` = '$cemail' AND `CardNo` = $cardno")) == 0) {
						mysqli_query($con, "INSERT INTO `paymentinfo` (`CardNo`, `NameOnCard`, `CVV`, `ExpirationDate`, `Saved`, `Cemail`) VALUES ($cardno, '$nameoncard', $cvv, '$expdate', 'true', '$cemail')");
					}
				}
				else {
					if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM `paymentinfo` WHERE `Cemail` = '$cemail' AND `CardNo` = $cardno")) == 0) {
						mysqli_query($con, "INSERT INTO `paymentinfo` (`CardNo`, `NameOnCard`, `CVV`, `ExpirationDate`, `Saved`, `Cemail`) VALUES ($cardno, '$nameoncard', $cvv, '$expdate', 'false', '$cemail')");
					}
				}
				header("location: buy-ticket-confirmation.php?order=$orderid");
			}
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
		<div class="wrapper">
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
						if ($adult > 0) {
							echo "{$adult} adult";
							if ($adult == 1) {
								echo " ticket</br>";
							}
							else {
								echo " tickets</br>";
							}
						}
						if ($senior > 0) {
							echo "{$senior} senior";
							if ($senior == 1) {
								echo " ticket</br>";
							}
							else {
								echo " tickets</br>";
							}
						}
						if ($child > 0) {
							echo "{$child} child";
							if ($child == 1) {
								echo " ticket</br>";
							}
							else {
								echo " tickets</br>";
							}
						}
						echo "
							</br></br><strong>Total Cost: &#36;{$totalcost}</strong>
						";
					?>
				</div>
			</div>
			<div style="height: 500px; width: 3px; margin: 15px"></div>
			<div class="right">
				<h3 style="color: #b71c1c">Payment Information<h3>
				<div class="horizontal">
					<form id="saved" action="" method="POST">
						<div class="input-wrapper">
							<h4 style='margin-right: 10px;'>Used a saved card</h4>
							<select id="saved-payment" name="saved-payment">
								<option value=''></option>
								<?php
									$sql = "SELECT * FROM `paymentinfo` WHERE `paymentinfo`.`Cemail` IN (SELECT `Email` FROM `user` WHERE `Username` = '$login_session');";
									$result = mysqli_query($con, $sql);

									while ($savedpay = mysqli_fetch_assoc($result)) {
										$shortcard = substr($savedpay['CardNo'], -4);
										echo "<option value='{$savedpay['CardNo']}'>{$shortcard}</option>";
									}
								?>
							</select>
						</div>
						<div class="button-wrapper">
							<button id="submit" type="submit" style="margin-left: 10px;">Buy Ticket</button>
						</div>
					</form>
				</div>
				<div>
					<h3 style="color: #b71c1c">Use a new card</h3>
					<form action="" method="POST">
						<div class="input-wrapper">
							<h4 style='margin-left: 10px; margin-right: 10px;'>Name on card <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h4>
							<input id="nameOnCard" type="text" name="nameOnCard">
						</div>
						<div style="font-family: 'Roboto', sans-serif; font-size: 14px; color: #cc0000; margin-top: 10px;"><?php echo $errorname; ?></div>
						<div class="input-wrapper">
							<h4 style='margin-left: 10px; margin-right: 10px;'>Card Number <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h4>
							<input id="cardNumber" type="text" name="cardNumber">
						</div>
						<div style="font-family: 'Roboto', sans-serif; font-size: 14px; color: #cc0000; margin-top: 10px;"><?php echo $errorcard; ?></div>
						<div class="input-wrapper">
							<h4 style='margin-left: 10px; margin-right: 10px;'>CVV <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h4>
							<input id="cvv" type="text" name="cvv">
						</div>
						<div style="font-family: 'Roboto', sans-serif; font-size: 14px; color: #cc0000; margin-top: 10px;"><?php echo $errorcvv; ?></div>
						<div class="input-wrapper">
							<h4 style='margin-left: 10px; margin-right: 10px;'>Expiration Date <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h4>
							<input id="expDate" type="text" name="expDate" placeholder="Format: YYYY-MM-01">
						</div>
						<div style="font-family: 'Roboto', sans-serif; font-size: 14px; color: #cc0000; margin-top: 10px;"><?php echo $errorexp; ?></div>
						<div class='horizontal'>
							<input id="check" style='margin-right: 10px' type='checkbox' name='save' value='Yes'>
							Save this card for later use
							<div class='button-wrapper'>
								<button id='submit' type='submit' style='margin-left: 15px; margin-top: 10px;'>Buy Ticket</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="button-wrapper">
			<button id="back" onclick="goBack()">Back</button>
		</div>
	</div>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
</html>