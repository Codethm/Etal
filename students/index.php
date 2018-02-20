<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <title>Document</title>
</head>
<body bgcolor="#00cc99">


<div class="w3-row">
  <div class="w3-half w3-container w3-Orange">
    <h2>w3-half</h2>


<?php
include_once('connect_db.php');

$select ="SELECT * FROM student";
$sql = $conn->prepare($select);
$sql->execute();
while($data=$sql->fetch())
{
    echo $data['idstudent']."  ";
    echo $data['Fname']." ";
    echo $data['Lname']." ";
    echo $data['Major']."<br> ";
} 
?>


  </div>
  <div class="w3-half w3-container">
    <h2>w3-half</h2>

<form action="Insert.php" method="POST">
<input type="submit" value="Insert" class="w3-button w3-blue ">
</form>
<form action="Delete.php" method="POST">
<input type="submit" value="Delete" class="w3-button w3-blue ">
</form>
</form>
<form action="Edit.php" method="POST">
<input type="submit" value="Edit" class="w3-button w3-blue ">
</form>


  </div>
</div> 


</body>
</html>
<br>
