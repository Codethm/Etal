<?php
include_once('connent_db.php');

if(! empty($_GET['id'])&& !empty($_GET['name'])){

$name = $_GET['id'];
$id = $_GET['name'];


$sql = "INSERT INTO student(idstudent,name)
VALUES('$name','$id')";
$conn ->exec ($sql);
header("Location: index.php");
}

?> 
<form metod="GET" action="index.php">
<input type=text name="id" placeholder="ID"><br><br>
<input type=text name="name" placeholder="Name"><br><br>


<input type="submit">

</form>