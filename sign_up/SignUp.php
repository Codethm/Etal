<?php
include('connect_db.php');

$Fname= $_POST['name'];
$Email = $_POST['email'];
$Pass = $_POST['pass'];
$repeat = $_POST['repeat-pass'];

if($Pass == $repeat){


$Pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);


$sql = "SELECT email FROM teacher WHERE email = '$Email';";
echo $sql;
$stmt = $conn->prepare($sql);
if($stmt->execute())
{
    if($stmt->rowCount() == 0)
    {
        $sql =  "INSERT INTO teacher(fullname,email,password)
        VALUES('$Fname','$Email','$Pass')";
        $conn ->exec($sql);
    }else
    {
        $message = 'account found with that Email.';
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
else
{
    echo "Oops! Something went wrong. Please try again later.";
}

} else{
    
    $message = 'Password not match.';
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>