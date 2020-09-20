<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<title>Admin</title>
</head>
<body>
	<div id="top_flak">
		<div class="container">
			<a href="index.php"><img src="img/logo.jpg" id="logo"></a>
					<a href="index.php"><li class="button" id="button_right"><p>Home</p></li></a>
					<a href="standpunten.php"><li class="button" id="button_right"><p>Standpunten</p></li></a>
					<a href="login.php"><li class="button" id="button_right"><p>Inloggen</p></li></a>
		</div>
	</div>
	</body>
	<?php
$dbname = 'project_5';
$user = 'root';
$pass = '';
	
$db_conn = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
$sql = "SELECT * FROM users";
$statement = $db_conn->prepare($sql);
$statement->execute();
$database_gegevens = $statement->fetchAll(PDO::FETCH_ASSOC); //fetch alle data 


//onderstaande conditie checkt ook of het aantal karakters in het zoekveld groter of gelijk is aan 3 karakters
if (isset($_GET['submit']) && strlen($_GET['query']) >= 3) {
    $query = $_GET['query'];
    
    // onderstaande code zorgt ervoor dat er gekeken woord naar een zoekwoord die voor en na het woord nog karakters heeft
    $query = '%'.$query . '%'; 

    //dit stukje code bepaalt of de category veilig en op de juiste wijze wordt ingevuld
    $toegestaande_category = array("title", "hair", "gender");//alleen deze categorieen mogen opgegeven worden (de gebruiker kan dus geen sql-injecties uitvoeren op de kolom)
    $key     = array_search($_GET['category'], $toegestaande_category);
    $kolom   = $toegestaande_category[$key];



    $sql = "SELECT * FROM users WHERE $kolom LIKE :ph_query";
    $statement = $db_conn->prepare($sql);
    $statement->bindParam(":ph_query", $query);//verbind het zoekwoord aan de placeholder van de query
    $statement->execute();
    $database_gegevens = $statement->fetchAll(PDO::FETCH_ASSOC);//fetch alle data die overkomt met de query (kolomnaam en zoekwoord)
}

?>

<div>
    <div>
        <form action="" method="get">
            <div>
                <div>
                    <input type="radio" id="name" name="category" class="custom-control-input" value="title">
                    <label class="custom-control-label" for="title">Title</label>
                </div>
                <div>
                    <input type="radio" id="email" name="category" class="custom-control-input" value="hair">
                    <label class="custom-control-label" for="hair">Hair</label>
                </div>
                <div>
                    <input type="radio" id="password" name="category" class="custom-control-input" value="gender">
                    <label class="custom-control-label" for="gender">Gender</label>
                </div>
            </div>
            <div>
                <label for="zoekwoord">Zoeken</label>
                <input type="text" name="query" id="zoekwoord">
                <input type="submit" value="Zoek!" name="submit" class="btn btn-success">
            </div>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>password</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($database_gegevens as $key => $value) : ?>
                <tr>
                    <td><a href="delete.php?id=<?php echo $value['id'];?>">Delete</a></td>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo $value['password'] ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
</div>
</html>