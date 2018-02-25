<?php
include_once('connect_db.php');
 
$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = "SELECT password FROM teacher WHERE email = '$email'&& password='$pass';";
echo $sql;

$stmt = $conn->prepare($sql);
if($stmt->execute()){
    // Check if username exists, if yes then verify password
    if($stmt->rowCount() == 1){
        if($row = $stmt->fetch()){
            $hashed_password = strval($row[0]);
            echo("||".$hashed_password."||".$pass."||");
            if($hashed_password == $pass){
                /* Password is correct, so start a new session and
                save the username to the session */
                session_start();
                $_SESSION['email'] = $email;      
                header("location: http://127.0.0.1/Etal/students/");
            } else{
                // Display an error message if password is not valid
                $password_err = 'The password you entered was not valid.';
            }
        }
    } else{
        // Display an error message if username doesn't exist
        $username_err = 'No account found with that username.';
    }
} else{
    echo "Oops! Something went wrong. Please try again later.";
}
echo $username_err.$password_err;