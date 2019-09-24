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
</style>

<?php
	$id = $_GET['id'];

	$sql = "SELECT * FROM `order` JOIN `movie` JOIN `theatre` WHERE `OrderID`='$id' AND `order`.`MovieTitle` = `movie`.`Title` AND `order`.`TheatreID` = `theatre`.`TheatreID`;";
	$result = mysqli_fetch_assoc(mysqli_query($con, $sql));

	$length = date('g \h\r i \m\i\n' , strtotime($result['Length']));
	$date = date('F j, Y', strtotime($result['Date']));
	if (date('h' , strtotime($result['Time']) > 11)) {
		$ampm = 'pm';
	}
	else {
		$ampm = 'am';
	}
	$time = date('h:i' , strtotime($result['Time']));

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['cancel']) && $_POST['cancel'] == 'Yes') {
			$totalcost = (float)$result['TotalCost'];
			$cancelcost = (float)$totalcost - 5;
			$cancelcost = number_format((float)$cancelcost, 2, '.', '');
			$sql = "UPDATE `order` SET `Status` = 'cancelled' WHERE `OrderID` = '$id'; UPDATE `order` SET `TotalCost` = $cancelcost WHERE `OrderID` = '$id';";
			mysqli_multi_query($con, $sql);
			header("Refresh:0");
		}
	}
?>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px" id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Order Detail</h1>
		<div class="detail">
			<div class="left">
				<?php
					echo "
						<h3>{$result['MovieTitle']}</h3>
						<em>{$result['Rating']}, {$length}</em></br></br></br>
						<strong>{$date}</br>
						{$time} {$ampm}</strong>
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
					if ($result['NoAdultTickets'] > 0) {
						echo "{$result['NoAdultTickets']} adult";
						if ($result['NoAdultTickets'] == 1) {
							echo " ticket</br>";
						}
						else {
							echo " tickets</br>";
						}
					}
					if ($result['NoSeniorTickets'] > 0) {
						echo "{$result['NoSeniorTickets']} senior";
						if ($result['NoAdultTickets'] == 1) {
							echo " ticket</br>";
						}
						else {
							echo " tickets</br>";
						}
					}
					if ($result['NoChildTickets'] > 0) {
						echo "{$result['NoChildTickets']} child";
						if ($result['NoAdultTickets'] == 1) {
							echo " ticket</br>";
						}
						else {
							echo " tickets</br>";
						}
					}
					echo "
						</br></br><strong>Total Cost: &#36;{$result['TotalCost']}</strong>
						</br><strong>Status:</strong> {$result['Status']}
					";
				?>
			</div>
		</div>
		<?php
			if ($result['Status'] == 'unused') {
				echo "
					<form action='' method='POST'>
						<br>Check the box and click 'Cancel Order' to cancel this order.<br><br>
						<div class='horizontal'>
							<input style='margin-right: 10px' type='checkbox' name='cancel' value='Yes'>
							<div class='button-wrapper'>
								<button id='submit' type='submit' style='margin-left: 15px; margin-top: 10px;'>Cancel Order</button>
							</div>
						</div>
					</form>
				";
			}
		?>
		<div class="button-wrapper">
			<?php echo "<a href='order-history.php'><button id='back'>Back</button></a>"; ?>
		</div>
	</div>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
</html>