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

	table td {
		width: 500px;
		height: 50px;
		border: 1px solid #ddd ;
		border-collapse: collapse;
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

	button {
		width: auto;
		padding-left: 15px;
		padding-right: 15px;
	}

	button:hover {
		background: #1E88E5;
	}

	.space {
		margin-top: 20px;
	}

</style>

<body>
	<div class="container">
		<div class="horizontal">
			<a href="me.php" style="margin-right: 50px" id="icons"><i class="material-icons">person</i><?php echo $login_session; ?></a>
			<a href="../logout.php" style="font-size: 24px; text-align: center;" id="logout"><i class="material-icons">exit_to_app</i>Log Out</a>
		</div>
		<h1>Now Playing</h1>
		<div style="max-height: 300px; overflow-y: auto;">
		<table>
			<?php
				$sql = "SELECT DISTINCT MovieTitle FROM playsat WHERE Playing = 'true'";
				$result = mysqli_query($con, $sql);

				while ($nowplaying = mysqli_fetch_assoc($result)) {
					echo "
					<tr>
						<td><a href='movie.php?movie={$nowplaying['MovieTitle']}'>{$nowplaying['MovieTitle']}</a></td>";
					if ($nowplaying = mysqli_fetch_assoc($result)) {
						echo "<td><a href='movie.php?movie={$nowplaying['MovieTitle']}'>{$nowplaying['MovieTitle']}</a></td>";
					}
					echo "</tr>";
				}
			?>
			</table>
		</div>
		<div class="button-wrapper space">
			<a href="coming-soon.php"><button>Coming Soon</button></a>
		</div>
	</div>
</body>
</html>