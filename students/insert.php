<?php
include_once('connect_db.php');

if(! empty($_GET['id'])&& !empty($_GET['Fname'])&& !empty($_GET['Lname'])&& !empty($_GET['Major']))
{
$id = $_GET['id'];
$Fname = $_GET['Fname'];
$Lname = $_GET['Lname'];
$Major = $_GET['Major'];

$sql = "INSERT INTO student(idstudent,Fname,Lname,Major)
VALUES('$id','$Fname','$Lname','$Major')";
$conn ->exec ($sql);
header("Location: index.php");
}
?> 
<br>
<form metod="GET" action="insert.php">
<input type=text name="id" placeholder="ID" class=" "><br><br>
<input type=text name="Fname" placeholder="First Name" class=" "><br><br>
<input type=text name="Lname" placeholder="Last Name" class=" "><br><br>
<input type=text name="Major" placeholder="Major" class=" "><br><br>
<input type="submit">
</form>