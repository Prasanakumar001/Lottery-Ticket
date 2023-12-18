<?php
require "../../config/config.php";
if(isset($_POST['submit_login'])){
    $phonenumber=mysqli_real_escape_string($connection,$_POST["phonenumber"]);
    $newpassword=mysqli_real_escape_string($connection,$_POST["newpassword"]);
    $email=mysqli_real_escape_string($connection,$_POST["email"]);
    //$sql="UPDATE `admin` SET `password`='$newpassword' WHERE `phonenumber`='$phonenumber'";
    
    // if($connection->query($sql)){
        
    //     echo "<script>";
    //    // echo "alert('password changed')";
    //     echo "window.location.href='login.php'";
    //     echo "</script>";
    // }else{
    //     echo "failed";
    // }

     $sql="select * from `admin` where trim(email)='$email' and trim(phonenumber)='$phonenumber' ";
    $result = mysqli_query($connection,$sql);
    $count = mysqli_num_rows($result);


    if($count>0){

       $sql1="UPDATE `admin` SET `password`='$newpassword' WHERE `email`='$email' and  `phonenumber`='$phonenumber' ";
    
      if($connection->query($sql1)){
        
            echo "<script>alert('Account password changed')</script>";
            echo "<script>window.location.href='./login.php'</script>";
      }else{
          // echo "failed";

          echo "<script>alert('Account not Exists')</script>";
            echo "<script>window.location.href='./../../ind.php'</script>";
    }

 }else{
   echo "<script>alert('Account not Exists')</script>";
            echo "<script>window.location.href='./../../ind.php'</script>";

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
        <label>email</label>
        <input type="text" name="email" ></input>
        <label>phone number</label>
        <input type="text" name="phonenumber" ></input>
        <label>new password</label>
        <input type="text" name="newpassword"></input>
        <input type="submit" name="submit_login">
    </form>
</body>
</html>