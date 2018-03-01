<?php
session_start();
include('connect_db.php');
$idth = $_SESSION['idteacher'];
$idclass = $_GET['idsubject'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
<form action = "classedits.php" method = "POST">

    <br><br>
    Code
    <br><br>
    <input type ="text" name = "code">
    <br><br>
    Name
    <br><br>
    <input type ="text" name = "name">
    <br><br>
    <input type = "submit" value = "Edit">

</form>
<form action = "main.php">
    <input type = "submit" value = "back">
</form>

<table style="width:100%">
  <tr>
    <th>Code</th>
    <th>name</th> 
  </tr>
  <tr>
    <td>
        <?php
        $sql = "SELECT code FROM student,subjects,student_has_subjects
                WHERE (student.idstudent = student_has_subjects.student_idstudent
                and subjects.idsubjects = student_has_subjects.subjects_idsubjects
                AND subjects.idsubjects = $idclass);";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while($data = $stmt->fetch())
        {
            echo "<br>".$data['code']."<br>";
        }
        ?>

</td>
    <td>
    <?php
        $sql = "SELECT fullname FROM student,subjects,student_has_subjects
                WHERE (student.idstudent = student_has_subjects.student_idstudent
                and subjects.idsubjects = student_has_subjects.subjects_idsubjects
                AND subjects.idsubjects = $idclass);";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while($data = $stmt->fetch())
        {
            echo "<br>".$data['fullname']."<br>";
        }
        ?>

    </td> 
  </tr>
</table> 


</body>
</html>