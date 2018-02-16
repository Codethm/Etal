<?php
include_once('connect_db.php');


$select ="SELECT * FROM student";
$sql = $conn->prepare($select);
    $sql->execute();
while($data=$sql->fetch())
{
    echo $data['idstudent']."  ";
    echo $data['name']."<br>";
}  

if(! empty($_GET['id'])&& !empty($_GET['name']))
{
$id = $_GET['id'];
$Name = $_GET['name'];

$sql = "UPDATE student SET name='$Name' where idstudent='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn ->exec ($sql);
header("Location: index.php");
}


?>
<form metod="GET" action="Edit.php">
<input type=text name="id" placeholder="ID"><br><br>
<input type=text name="name" placeholder="Name"><br><br>
<input type="submit">