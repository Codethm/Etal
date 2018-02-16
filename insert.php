<?php
include_once('connect_db.php');

if(! empty($_GET['id'])&& !empty($_GET['name']))
{
$id = $_GET['id'];
$Name = $_GET['name'];

$sql = "INSERT INTO student(idstudent,name)
VALUES('$id','$Name')";
$conn ->exec ($sql);
header("Location: index.php");
}
?> 
<form metod="GET" action="insert.php">
<input type=text name="id" placeholder="ID"><br><br>
<input type=text name="name" placeholder="Name"><br><br>
<input type="submit">
</form>
<form   method="POST" action="index.php">
<input type="submit" value="Back">
</form>