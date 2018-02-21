<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="Css.css"> 
    <title>Document</title>
</head>
<body bgcolor="#00cc99">
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
<div class="w3-container">
<form metod="GET" action="insert.php">
<input type="text" name="id" placeholder="ID" ><br><br>
<input type="text" name="Fname" placeholder="First Name" ><br><br>
<input type="text" name="Lname" placeholder="Last Name" ><br><br>
<input type="text" name="Major" placeholder="Major" ><br><br>
<input type="submit" Value="Send" class="w3-button w3-blue ">
</form>
</div>
</body>
</html>