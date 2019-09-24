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
	table {
		font-family: 'Roboto', sans-serif;
		font-size: 22px;
		text-align: center;

		border: 1px solid #ddd ;
		border-collapse: collapse;
		border-radius: 25px;

		margin:2px;
		margin-left: auto;
		margin-right: auto;
	}

	table th {
		width: auto;
		padding-left: 10px;
		padding-right: 10px;
		background: #616161;
		color: #F5F5F5;
	}

	table td {
		width: auto;
		height: 50px;
		border: 1px solid #ddd ;
		border-collapse: collapse;
		padding: 10px;
	}

	table tr:nth-child(even) {
		text-align: center;
		padding-left: 5px;
		background-color: #f2f2f2;
		border: 1px solid #ddd ;
		border-collapse: collapse;
	}

	table td:hover {
		background-color: #ddd;
	}

</style>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Popular Movie Report</h1>
		<div style="max-height: 500px; overflow-y: auto;">
			<table>
				<tr>
					<th>Month</th>
					<th>Movie</th>
					<th>Number of Orders</th>
				</tr>
				<?php
					$sql = "SELECT * FROM (SELECT MONTHNAME(`Date`) AS `Month`, `MovieTitle`, COUNT(`TotalTickets`) AS `a` FROM `order` WHERE `status` != 'cancelled' AND Month(NOW()) - Month(`Date`) = 0 GROUP BY `MovieTitle` ORDER BY `a` DESC LIMIT 3 ) AS `c` UNION SELECT * from (SELECT MONTHNAME(`Date`), `MovieTitle`, COUNT(`TotalTickets`) AS `a` FROM `order` WHERE `status` != 'cancelled' AND Month(NOW()) - Month(`Date`) = 1 GROUP BY `MovieTitle` ORDER BY `a` DESC Limit 3) AS `d` UNION SELECT * FROM (SELECT MONTHNAME(`Date`), `MovieTitle`, COUNT(`TotalTickets`) AS `a` FROM `order` WHERE `status` != 'cancelled' AND MONTH(NOW()) - MONTH(`Date`) = 2 GROUP BY `MovieTitle` ORDER BY `a` DESC Limit 3) as `g`";
					$result = mysqli_query($con, $sql);

					$previousmonth = "";
					while ($rev = mysqli_fetch_assoc($result)) {
						echo "
						<tr>";
						if ($rev['Month'] != $previousmonth) {
							echo "<td>{$rev['Month']}</td>";
						}
						else {
							echo "<td></td>";
						}
						echo "
							<td>{$rev['MovieTitle']}</td>
							<td>{$rev['a']}</td>
						</tr>";
						$previousmonth = $rev['Month'];
					}
				?>
			</table>
		</div>
		<div class="button-wrapper">
			<button id="back" onclick="goBack()">Back</button>
		</div>
	</div>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
</html>