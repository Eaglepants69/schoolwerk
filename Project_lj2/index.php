<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<title>Home</title>
</head>

<?php
	session_start();

	if ( isset( $_SESSION['email'] ) ) {
		// pakt data van de database onder username van de session
	
	} 
?>

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
	<div id="div_index_main">
		<div>
			<h2 id="div_h2"> Wie zijn wij</h2>
			<div>
				<div class="div_stick_figure"><img src="img/stick_figure.jpg"class = "stick_figure">
					<h3 class = "div_h3">Henk</h3>
						<p class = "tekst">Henk is een politici in de tweede kamer</p>
				</div>
				<div class="div_stick_figure">
					<img src="img/stick_figure.jpg" class = "stick_figure">
						<h3 class = "div_h3">Bob</h3>
							<p class = "tekst">Bob is een politici in de eerste kamer</p>
				</div>	
				<div class = "div_stick_figure">
				<img src="img/stick_figure.jpg" class = "stick_figure">
						<h3 class = "div_h3">Gerrit</h3>
							<p class = "tekst">Gerrit is minister van defensie</p>
				</div>
			</div>

		</div>
	</div>
</body>
</html>