<html>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link href="https://fonts.googleapis.com/css?family=Notable|Roboto" rel="stylesheet">

<?php
	require_once "connection.php";
	
	session_start();
	$error = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = mysqli_real_escape_string($con, $_POST['user']);
		$password = mysqli_real_escape_string($con, $_POST['pass']); 

		$sqluser = "SELECT * FROM user WHERE Username = '$username' AND Password = '$password'";
		$sqlmanager = "SELECT * FROM manager WHERE Username = '$username'";

		$userresult = mysqli_query($con, $sqluser);
		$managerresult = mysqli_query($con, $sqlmanager);

		$usercount = mysqli_num_rows($userresult);
		$managercount = mysqli_num_rows($managerresult);
		$totalcount = $usercount + $managercount;

		if ($totalcount == 1) {
			$_SESSION['login_user'] = $username;
			header("location: pages/now-playing.php");
		}
		elseif ($totalcount == 2) {
			$_SESSION['login_user'] = $username;
			header("location: pages/choose-functionality.php");
		}
		else {
			$error = "Your Login Name or Password is invalid";
		}
	}
?>

<body>
	<div class="container">
		<h1>Welcome to UA Movie<h1>
		<?php
			if (@$_GET['registered'] == 'true') echo '<h2 style="color: green;">You have registered successfully.</h2>'
		?>
		<h1>Login</h1>
		<form action="" method="POST">
			<div class="input-wrapper">
				<h2>Username <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h2>
				<input id="username" type="text" name="user" required>
			</div>
			<div class="input-wrapper">
				<h2>Password <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h2>
				<input id="password" type="password" name="pass" required>
			</div>
			<div style="font-family: 'Roboto', sans-serif; font-size: 14px; color: #cc0000; margin-top: 10px;"><?php echo $error; ?></div>
			<div class="button-wrapper">
				<button id="login" type="submit">Login</button>
			</div>
		</form>
		<a href="pages/register.php"><button id="register">Register</button></a>
	</div>
</body>
</html>