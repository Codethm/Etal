<?php
include_once('connect_db.php');

$select ="SELECT * FROM student";
$sql = $conn->prepare($select);
    $sql->execute();
while($data=$sql->fetch())
{
    echo $data['idstudent']."  ";
    echo $data['name']."<br> ";
} 
?> 
<br>
<form action="Insert.php" method="POST">
<input type="submit" value="Insert">
</form>
<form action="Delete.php" method="POST">
<input type="submit" value="Delete">
</form>
</form>
<form action="Edit.php" method="POST">
<input type="submit" value="Edit">
</form>