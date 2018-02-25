<?php
include('connect_db.php');


$Fname= $_POST['name'];
$Email = $_POST['email'];
$Pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);


$sql =  "INSERT INTO teacher(fullname,email,password)
VALUES('$Fname','$Email','$Pass')";
$conn ->exec($sql);

?>