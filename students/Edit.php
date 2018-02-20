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

if(! empty($_GET['id'])&& !empty($_GET['Fname'])&& !empty($_GET['Lname'])&& !empty($_GET['Major']))
{
    $id = $_GET['id'];
    $Fname = $_GET['Fname'];
    $Lname = $_GET['Lname'];
    $Major = $_GET['Major'];

$sql = "UPDATE student SET Fname='$Fname',Lname='$Lname',Major='$Major' where idstudent='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn ->exec ($sql);
header("Location: index.php");
}


?>
<br>
<form metod="GET" action="Edit.php">
<input type=text name="id" placeholder="ID" class=" "><br><br>
<input type=text name="Fname" placeholder="First Name" class=" "><br><br>
<input type=text name="Lname" placeholder="Last Name" class=" "><br><br>
<input type=text name="Major" placeholder="Major" class=" "><br><br>
<input type="submit">