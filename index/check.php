<?php
include_once('connect_db.php');

if(!empty($_GET['IDStudent']))
{
	date_default_timezone_set('Asia/Bangkok');
	$date = date('Y-m-d H:i:s');
	$starttime = date("Y-m-d H:i:s",strtotime($date."-30 minute"));
	$endtime = date("Y-m-d H:i:s",strtotime($date."+30 minute"));
	
	$sql = "SELECT idclass FROM `class` WHERE `date` BETWEEN '$starttime' AND '$endtime'";
	echo $sql;
	$stmt =$conn->prepare($sql);
	$stmt->execute();

	$result = $stmt->fetch();
	$idclass = $result['idclass'];
	echo "||||||||||||".$idclass;
	

	$idstu = $_GET['IDStudent'];
	$sql = "SELECT idstudent FROM student WHERE code = '$idstu';";
    $stmt =$conn->prepare($sql);
    $stmt->execute();
	$row = $stmt->fetch();
	$idrow = $row[0];

	$sql = "INSERT INTO attendance(student_idstudent,class_idclass,time) VALUE('$idrow',$idclass,'$date');";
	echo $sql;
    $conn->exec($sql);
	header('location: check.html');
}

?>