<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<title>login</title>
	<?php include 'User.php'; ?>
	<?php
	//user voor inloggen 
		session_start();

		if ( isset( $_SESSION['email'] ) ) {
				// pakt data van de database onder username van de session
			
		} 
		$user1 = new User();

		if (isset($_POST['submit'])) {
			$email_ingevuld = $_POST['email']; 
			$wachtwoord_ingevuld = $_POST['password']; 

			$user1->login($email_ingevuld, $wachtwoord_ingevuld);
		}
		//user voor registreren
		$register1 = new User();
		if (isset($_POST['submit_register'])) {
			$email_ingevuld_register = $_POST['email_register'];
			$naam_ingevuld_register = $_POST['name_register'];
			$password_ingevuld_register = $_POST['password_register'];


			$register1->register($email_ingevuld_register, $naam_ingevuld_register, $password_ingevuld_register);
		}
		//user voor admin login
		$admin1 = new User();
		if (isset($_POST['submit'])) {
			$email_ingevuld = $_POST['email'];
			$wachtwoord_ingevuld = $_POST['password'];

			$admin1->login_admin($email_ingevuld, $wachtwoord_ingevuld);
		}
	?>
</head>
<body>
	<img src="img/background.jpg" class="background">
	<div id="top_flak">
		<div class="container">
			<a href="index.php"><img src="img/logo.jpg" id="logo"></a>
				
					<a href="index.php"><li class="button" id="button_right"><p>Home</p></li></a>
					<a href="standpunten.php"><li class="button" id="button_right"><p>Standpunten</p></li></a>
					<a href="login.php"><li class="button" id="button_right"><p>Inloggen</p></li></a>
				
		</div>
	</div>

	<div id="login_div">
		<form method="post">
			<p>Email:</p>
			<input type="text" name="email" class="login_input"><br>
			<p>Wachtwoord:</p>
			<input type="text" name="password" class="login_input"><br>
			<input type="submit" name="submit" class="login_button">
		</form>
	</div>

	<div id="register_div">
		<form method="post">
			<p>Naam:</p>
			<input type="text" name="email_register" class="login_input">
			<p>Email:</p>
			<input type="text" name="name_register" class="login_input">
			<p>Wachtwoord:</p>
			<input type="text" name="password_register" class="login_input"><br>
			<input type="submit" name="submit_register" class="login_button">
		</form>
	</div>
		<div id="logout_div">
			<a href="logout.php"><li><p>logout</p></li></a>
		</div>

	
</body>
</html>