<?php


$user = 'root';
$pass = '';
$db_conn = new PDO('mysql:host=localhost;dbname=project_5', $user, $pass);

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = :placeholder";
$stmt = $db_conn->prepare($sql);
$stmt->bindParam(":placeholder", $id);
$stmt->execute();

header('location: admin.php');

?>