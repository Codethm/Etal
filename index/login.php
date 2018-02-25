<?php
include_once('connect_db.php');
 
$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = "SELECT idteacher,password FROM teacher WHERE email = '$email';";
echo $sql;

$stmt = $conn->prepare($sql);
if($stmt->execute()){
    if($stmt->rowCount() == 1){
        if($row = $stmt->fetch()){
            $hashed_password = $row['password'];
            if(password_verify($pass,$hashed_password)){
                session_start();
                $_SESSION['pk'] = $row['idteacher'];     
                header("location: http://127.0.0.1/Etal/students/");
            } else{
                $message = 'The password you entered was not valid.';
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
    } else{
        $message = 'No account found with that username.';
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
} else{
    echo "Oops! Something went wrong. Please try again later.";
}