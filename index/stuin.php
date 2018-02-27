<?php
    include('connect_db.php');

   if(! empty($_POST['id'])&& !empty('name'))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];

        $sql = "INSERT INTO student(code,fullname)
        VALUES('$id','$name')";

        //$sql .= "INSERT INTO student_has_subjects(student_idstudent)
        //VALUES(LAST_INSERT_ID) ";
        $conn->exec($sql);

        header('Location: student.php');
    }
?>