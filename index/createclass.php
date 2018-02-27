<?php
include_once('connect_db.php');
session_start();

$name = $_POST['name'];
$location = $_POST['location'];
$date = $_POST['date'];
$time = $_POST['time'];
$numweek = $_POST['numweek'];
$pk = $_SESSION["pk"];


$sql = "INSERT INTO subjects(name,techer_idteacher,location,numweek) VALUE('$name',$pk,'$location','$numweek');";

$conn ->exec($sql);