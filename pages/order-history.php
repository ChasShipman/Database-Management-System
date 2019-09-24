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
</style>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = $_POST['select'];
		header("location: order-detail.php?id=$id");
	}
?>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px" id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Order History</h1>
		<?php
			$sql = "SELECT * FROM `order` WHERE `Cemail` IN (SELECT `Email` FROM `user` WHERE `Username` = '$login_session');";
			$result = mysqli_query($con, $sql);

			if (mysqli_num_rows($result) == 0) {
				echo "<div class='error-msg'>There are no orders yet.</div>";
			}
			else {
				echo "
				<div style='max-height: 300px; overflow-y: auto;'>
				<form action='' method='POST'>
					<table>
						<tr>
							<th>Select</th>
							<th>Order ID</th>
							<th>Movie</th>
							<th>Status</th>
							<th>Total Cost</th>
						</tr>
				";
				while ($order = mysqli_fetch_assoc($result)) {
					$totalcost = number_format($order['TotalCost'], 2);
					echo "
						<tr>
							<td><input type='radio' name='select' value='{$order['OrderID']}'></td>
							<td>{$order['OrderID']}</td>
							<td>{$order['MovieTitle']}</td>
							<td>{$order['Status']}</td>
							<td>&#36;{$totalcost}</td>
						</tr>
					";
				}
				echo "
					</table>
					</div>
					<div class='button-wrapper'>
						<button id='submit' type='submit' style='margin-top: 10px;'>View</button>
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