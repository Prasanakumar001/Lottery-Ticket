<?php
// require "../../config/config.php";
// //include "../config/config.php";
// if(isset($_POST['submit_login'])){
//     $name=mysqli_real_escape_string($connection,$_POST["name"]);
//     $password=mysqli_real_escape_string($connection,$_POST["password"]);
//     $phonenumber=mysqli_real_escape_string($connection,$_POST["phonenumber"]);
//      $email=mysqli_real_escape_string($connection,$_POST["email"]);



    
//     // if($connection->query($sql)){
        
//     //     echo "<script>";
//     //     echo "window.location.href='login.php'";
//     //     echo "</script>";
//     // }

//    $sqlcheck="select * from admin where email='$email'";
//      if($connection->query($sqlcheck)){
//       $result1 = mysqli_query($connection,$sqlcheck);
//        $count1 = mysqli_num_rows($result1);
//         if($count1>0){
//             echo "<script>alert('Account Already Exists')</script>";
//             echo "<script>window.location.href='./ind.php'</script>";
//         }else{

//     $sql="INSERT INTO `admin`( `name`, `password`,`phonenumber`,`email`) VALUES ('$name','$password','$phonenumber','$email')";
//     //$sql="INSERT INTO `admin`( `name`, `password`,`phonenumber`,`email`) VALUES ('$name','$password','$phonenumber')";
    
//     if($connection->query($sql)){
        
//             $sql1="select * from `register` where trim(email)='$email' and trim(password)='$password' ";
             
//     $result = mysqli_query($connection,$sql1);
//     $count = mysqli_num_rows($result);
//    session_start();

//     if($count>0){

//         $row1=$result->fetch_assoc();
//         $_SESSION['id']=$row1["id"];
//        $_SESSION['name']=$row1["name"];
//       // $_SESSION['cart']=[];

//         echo "<script> window.location.href = './../index.php'</script>";  
                                                                              
//     }else{
//        echo "<script>alert('Login Failed')</script>";
//        echo "<script>window.location.href='./register.php'</script>";
//     }
//     }






// }


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
         <label>email</label>
        <input type="text" name="email" ></input>
        <label>name</label>
        <input type="text" name="name" ></input>
        <label>password</label>
        <input type="text" name="password"></input>
        <label>phonenumber</label>
        <input type="text" name="phonenumber"></input>
        <input type="submit" name="submit_login">
    </form>
</body>
</html>