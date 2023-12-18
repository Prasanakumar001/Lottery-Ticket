<?php
require "../config/config.php";
if(isset($_POST['submit_login'])){
    $phonenumber=mysqli_real_escape_string($connection,$_POST["phonenumber"]);
    $newpassword=mysqli_real_escape_string($connection,$_POST["newpassword"]);
    $sql="UPDATE `register` SET `password`='$newpassword' WHERE `phonenumber`='$phonenumber'";
    
    if($connection->query($sql)){
        
        echo "<script>";
       // echo "alert('password changed')";
        echo "window.location.href='login.php'";
        echo "</script>";
    }else{
        echo "failed";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
</head>
<body>
    <form method="post">
        <label>phone number</label>
        <input type="text" name="phonenumber" ></input>
        <label>new password</label>
        <input type="text" name="newpassword"></input>
        <input type="submit" name="submit_login">
    </form>
</body>
</html>