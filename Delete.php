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
if(!empty($_POST['id']))
{
$Del = $_POST['id'];

$sql="DELETE FROM student WHERE idstudent=$Del";
$conn->exec($sql);
header("Location: index.php");
}
?>

<br>
<form action="Delete.php" method="POST">
<input type="number" name="id">
<input type="submit" value="Delete">
</form>