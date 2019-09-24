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
		$card = $_POST['select'];
		$email = mysqli_fetch_assoc(mysqli_query($con, "SELECT `Email` FROM `user` WHERE `Username` = '$login_session'"));
		$email = $email['Email'];
		$sql = "DELETE FROM `paymentinfo` WHERE `Cemail` = '$email' AND `CardNo` = '$card'";
		mysqli_query($con, $sql);
	}
?>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px" id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Payment Information</h1>
		<?php
			$sql = "SELECT * FROM `paymentinfo` JOIN `user` ON `paymentinfo`.`Cemail`=`user`.`Email` WHERE `user`.`Username` = '$login_session'";
			$result = mysqli_query($con, $sql);

			if (mysqli_num_rows($result) == 0) {
				echo "<div class='error-msg'>You have no saved payment information.</div>";
			}
			else {
				echo "
				<div style='max-height: 300px; overflow-y: auto;'>
				<form action='' method='POST'>
					<table>
						<tr>
							<th>Select</th>
							<th>Card Number</th>
							<th>Name on Card</th>
							<th>Expiration Date</th>
						</tr>
				";
				while ($payment = mysqli_fetch_assoc($result)) {
					echo "
						<tr>
							<td><input type='radio' name='select' value='{$payment['CardNo']}'></td>
							<td>{$payment['CardNo']}</td>
							<td>{$payment['NameOnCard']}</td>
							<td>{$payment['ExpirationDate']}</td>
						</tr>
					";
				}
				echo "
					</table>
					</div>
					<div class='button-wrapper'>
						<button id='submit' type='submit' style='margin-top: 10px;'>Delete</button>
					</div>
				</form>";
			}
		?>
		<div class="button-wrapper">
			<?php echo "<a href='me.php'><button id='back'>Back</button></a>"; ?>
		</div>
	</div>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
</html>