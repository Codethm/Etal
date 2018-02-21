<?php
include_once('connect_db.php');


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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="Css.css">
    <title>Document</title>
</head>
<body bgcolor="#00cc99"> 
<div class="w3-container">
<br>
<br>
<div class="w3-row">
  <div class="w3-half w3-container">
    <table style="width:100%">
    <tr>
    <th>ID Students</th>
    <th>Name</th>
    <th>Major</th>
    </tr>
    <tr>
    <td>
    <?php
      include_once('connect_db.php');

      $select ="SELECT * FROM student";
      $sql = $conn->prepare($select);
      $sql->execute();
      while($data=$sql->fetch())
      {
          echo $data['idstudent']."<br>";
      }
    ?>
    </td>
    <td>
    <?php
      $select ="SELECT * FROM student";
      $sql = $conn->prepare($select);
      $sql->execute();
      while($data=$sql->fetch())
      {
          echo $data['Fname']." ";
          echo $data['Lname']."<br>";
      }
      ?>
    </td>
    <td>
    <?php
      $select ="SELECT * FROM student";
      $sql = $conn->prepare($select);
      $sql->execute();
      while($data=$sql->fetch())
      {
        echo $data['Major']."<br> ";
      }
      ?>
    </td>
    </tr>
    </table>
  </div>
      <div class="w3-half w3-container">
    <form metod="GET" action="Edit.php">
    * Select ID for fix<br>
    <input type=text name="id" placeholder="ID" class=" "><br><br>
    <input type=text name="Fname" placeholder="First Name" class=" "><br><br>
    <input type=text name="Lname" placeholder="Last Name" class=" "><br><br>
    <input type=text name="Major" placeholder="Major" class=" "><br><br>
    <input type="submit" Value="Fix" Class="w3-button w3-blue ">
</div>
</div>
</body>
</html>
