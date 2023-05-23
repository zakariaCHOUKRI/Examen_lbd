<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	
	if (isset($_SESSION["is_admin"])) {
		include_once '../controllers/redirect.php';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login / Register</title>
	<link rel="stylesheet" href="../assets/login_style.css">
	<script src="../assets/login_script.js"></script>
	<?php include 'head.html' ?>
</head>
<body>
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form action="../controllers/RegistrationController.php" method="post">
					<label for="chk" aria-hidden="true">Register</label>
					<input type="number" name="user_id" placeholder="Student ID" required>
					<input type="text" name="username" placeholder="Username" required>
					<input type="email" name="email" placeholder="Email" required>
					<input type="password" name="password" placeholder="Password" required>
					<button>Register</button>
				</form>
			</div>

			<div class="login">
				<form action="../controllers/LoginController.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required>
					<input type="password" name="password" placeholder="Password" required>
					<button>Login</button>
				</form>
			</div>
	</div>
	<style>
		.erreur {
			position: fixed;
			top: 150px;
		}
	</style>
	<div class="erreur">
		<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == 0)
				{
					echo '<div id="error-popup">Incorrect email or password. Please try again.<button id="close-btn">Close</button></div>';
				} else if ($_GET['error'] == 1)
				{
					echo '<div id="error-popup">Email, username or Student ID already used. Please try again.<button id="close-btn">Close</button></div>';
				}
			}
		?>
	</div>
</body>
</html>