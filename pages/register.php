<?php
	require_once "../connection.php";
?>

<html>
<link rel="stylesheet" type="text/css" href="../css/styles.css" />
<link rel="stylesheet" type="text/css" href="../css/login.css" />
<link href="https://fonts.googleapis.com/css?family=Notable|Roboto" rel="stylesheet">

<?php
	session_start();
	$error = $erroruser = $erroremail = $errorpass = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$user = mysqli_real_escape_string($con, $_POST['user']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$pass = mysqli_real_escape_string($con, $_POST['pass']);
		$confirmpass = mysqli_real_escape_string($con, $_POST['confirmpass']);
		$managerpass = mysqli_real_escape_string($con, $_POST['managerpass']);

		$checkuser = mysqli_query($con, "SELECT Username FROM user WHERE Username = '$user'");
		$checkemail = mysqli_query($con, "SELECT Email FROM user WHERE Email = '$email'");
		$manpassresult = mysqli_fetch_assoc(mysqli_query($con, "SELECT ManagerPassword FROM systeminfo"));
		$checkmanagerpass = $manpassresult['ManagerPassword'];

		if (mysqli_num_rows($checkuser) > 0) {
			$erroruser = "Username already taken";
		}
		elseif (mysqli_num_rows($checkemail) > 0) {
			$erroremail = "Email already in use";
		}
		elseif ($pass != $confirmpass || $confirmpass != $pass) {
			$errorpass = "Passwords do not match";
		}
		else {
			if ($managerpass == $checkmanagerpass) {
				$sql = "INSERT INTO `user` (`Email`, `Username`, `Password`) VALUES ('$email', '$user', '$pass'); INSERT INTO `manager` (`Username`) VALUE ('$user');";
				if (mysqli_multi_query($con, $sql)) {
					sleep(1);
					header("location: ../login.php?registered=true");
				}
				else {
					$error = "Registration failed.";
				}
			}
			else {
				$sql = "INSERT INTO `user` (`Email`, `Username`, `Password`) VALUES ('$email', '$user', '$pass'); INSERT INTO `customer` (`Username`) VALUE ('$user');";
				if (mysqli_multi_query($con, $sql)) {
					sleep(1);
					header("location: ../login.php?registered=true");
				}
				else {
					$error = "Registration failed.";
				}
			}
		}
	}
?>

<body>
	<div class="container">
		<h1>New User Registration</h1>
		<div>
			<form action="" method="POST">
				<div class="input-wrapper">
					<h2>Username <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h2>
					<input id="username" type="text" name="user" required>
				</div>
				<div style="font-family: 'Roboto', sans-serif; font-size: 14px; color: #cc0000; margin-top: 10px;"><?php echo $erroruser; ?></div>
				<div class="input-wrapper">
					<h2>Email Address <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h2>
					<input id="email" type="text" name="email" required>
				</div>
				<div style="font-family: 'Roboto', sans-serif; font-size: 14px; color: #cc0000; margin-top: 10px;"><?php echo $erroremail; ?></div>
				<div class="input-wrapper">
					<h2>Password <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h2>
					<input id="password" type="password" name="pass" required>
				</div>
				<div class="input-wrapper">
					<h2>Confirm Password <abbr title="Required" style="color: red; text-decoration: none;">*</abbr></h2>
					<input id="confirm" type="password" name="confirmpass" required>
				</div>
				<div style="font-family: 'Roboto', sans-serif; font-size: 14px; color: #cc0000; margin-top: 10px;"><?php echo $errorpass; ?></div>
				<div class="input-wrapper">
					<h2>Manager Password</h2>
					<input id="manager" type="password" name="managerpass">
				</div>
				<div class="button-wrapper">
					<button id="register" type="submit">Register</button>
				</div>
			</form>
		</div>
		<div class="button-wrapper">
			<a href="../login.php"><button id="back">Back</button></a>
		</div>
		<div style="font-family: 'Roboto', sans-serif; font-size: 14px; color: #cc0000; margin-top: 10px;"><?php echo $error; ?></div>
	</div>
	<script type="text/javascript" src="../js/javascript.js"></script>
</body>
<html>