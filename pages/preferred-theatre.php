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
		$theatre = $_POST['select'];
		$sql = "DELETE FROM `prefers` WHERE `Username` = '$login_session' AND `TheatreID` = '$theatre'";
		mysqli_query($con, $sql);
	}
?>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px" id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Preferred Theatre</h1>
		<?php
			$sql = "SELECT * FROM `prefers` JOIN `theatre` ON `prefers`.`TheatreID`=`theatre`.`TheatreID` WHERE `prefers`.`Username` = '$login_session'";
			$result = mysqli_query($con, $sql);

			if (mysqli_num_rows($result) == 0) {
				echo "<div class='error-msg'>You have no saved theatres.</div>";
			}
			else {
				echo "
				<div style='max-height: 300px; overflow-y: auto;'>
				<form action='' method='POST'>
					<table>
						<tr>
							<th>Select</th>
							<th>Theatre Name</th>
							<th>Address</th>
						</tr>
				";
				while ($theatre = mysqli_fetch_assoc($result)) {
					echo "
						<tr>
							<td><input type='radio' name='select' value='{$theatre['TheatreID']}'></td>
							<td>{$theatre['Name']}</td>
							<td>{$theatre['Address']} {$theatre['Street']}, {$theatre['City']}, {$theatre['State']} {$theatre['ZipCode']}</td>
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
			<a href='me.php'><button id='back'>Back</button></a>
		</div>
	</div>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
</html>