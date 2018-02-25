<?php
include_once('connect_db');


$Fname= $_POST['name'];
$Email = $_POST['email'];
$Pass = $_POST['pass'];

$sql =  "INSERT INTO Teacher(Fullname,Email,Password)
VALUES('NULL','NULL','NULL')";
$conn ->exec($sql);
?>