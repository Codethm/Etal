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
<br>
<form action="Delete.php" method="POST">
 * Select ID for delete<br>
<input type="number" name="id" Placeholder="ID">
<input type="submit" value="Delete" class="w3-button w3-blue ">
</form>
</div>
</div>
</body>
</html>
<?php
if(!empty($_POST['id']))
{
$Del = $_POST['id'];

$sql="DELETE FROM student WHERE idstudent=$Del";
$conn->exec($sql);
header("Location: index.php");
}
?>
