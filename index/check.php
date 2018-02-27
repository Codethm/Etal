<?php
include_once('connect_db.php');

if(!empty($_GET['IDStudent']))
{

	$idstu = $_GET['IDStudent'];
	$sql = "SELECT idstudent FROM student WHERE code = '$idstu';";
    $stmt =$conn->prepare($sql);
    $stmt->execute();
	$row = $stmt->fetch();
	$idrow = $row[0];
	$date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO attendance(student_idstudent,class_idclass,time) VALUE('$idrow','2','$date');";
    $conn->exec($sql);
	header('location: check.html');
}

?>