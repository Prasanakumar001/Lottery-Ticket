<?php
require "../config/config.php";
//include "../config/config.php";
if(isset($_POST['submit_login'])){
    $name=mysqli_real_escape_string($connection,$_POST["name"]);
     $email=mysqli_real_escape_string($connection,$_POST["email"]);

    $password=mysqli_real_escape_string($connection,$_POST["password"]);
    $phonenumber=mysqli_real_escape_string($connection,$_POST["phonenumber"]);
    $sql="INSERT INTO `register`( `name`,`email` ,`password`,`phonenumber`) VALUES ('$name','$email','$password','$phonenumber')";
    
    if($connection->query($sql)){
        
        echo "<script>";
        echo "window.location.href='login.php'";
        echo "</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <label>name</label>
        <input type="text" name="name" ></input>
         <label>email</label>
        <input type="text" name="email" ></input>

        <label>password</label>
        <input type="text" name="password"></input>
        <label>phonenumber</label>
        <input type="text" name="phonenumber"></input>
        <input type="submit" name="submit_login">
    </form>
</body>
</html>