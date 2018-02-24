<?php
include_once('connect_db.php');
 
$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = "SELECT fullname FROM techer WHERE email = '$email'&& pass='$pass';";
echo $sql;

$stmt = $conn->prepare($sql); 
$stmt->execute();