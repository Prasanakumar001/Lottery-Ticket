<?php
require "../../config/config.php";
if(isset($_POST['submit_login'])){
   // $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $sql="select * from `admin` where trim(email)='$email' and trim(password)='$password' ";
    //echo "<script>console.log($sql)</script>";
    //echo $sql;
    $result = mysqli_query($connection,$sql);
    $count = mysqli_num_rows($result);
   // echo"<script>alert($count);</script>";
  // echo $count;
   session_start();

    if($count>0){

        $row1=$result->fetch_assoc();
        $_SESSION['id']=$row1["id"];
         //echo "UnAvailable";
       $_SESSION['name']=$row1["name"];
       //$_SESSION['cart']=[];
    //    echo "hello";
    //    echo $_SESSION["id"];
    //    echo $_SESSION["name"];
        //header("Location: ../index.php");
        echo "<script> window.location.href = '../index.php'</script>";  
                                                                              
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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
            body{
         font-family: 'Roboto',sans-serif;
         background: #0c111b;
        }
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
body{
    font-family: 'Poppins', sans-serif;
    /* background: #ececec; */
}
/*------------ Login container ------------*/
.box-area{
    width: 930px;
}
/*------------ Right box ------------*/
.right-box{
    padding: 40px 30px 40px 40px;
}
/*------------ Custom Placeholder ------------*/
::placeholder{
    font-size: 16px;
}
.rounded-4{
    border-radius: 20px;
}
.rounded-5{
    border-radius: 30px;
}
/*------------ For small screens------------*/
@media only screen and (max-width: 768px){
     .box-area{
        margin: 0 10px;
     }
     .left-box{
    
        height: 120px;
        overflow: hidden;
        
     }
     .featured-image{
        margin-top: 30px;
     }
     .right-box{
        padding: 20px;
     }
}
    </style>
</head>
<body>

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!----------------------- Login Container -------------------------->
           <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <!--------------------------- Left Box ----------------------------->
           <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
               <div class="featured-image mb-3">
                <img src="../../ticket/goldcoin.png" class="img-fluid" style="width: 250px;">
               </div>
               <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
               <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on this platform.</small>
           </div> 
        <!-------------------- ------ Right Box ---------------------------->
            
           <div class="col-md-6 right-box">
              <div class="row align-items-center">
                    <div class="header-text mb-4">
                         <h2>Hello,Again</h2>
                         <p>We are happy to have you back.</p>
                    </div>
                    <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email">
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                    </div>
                    <div class="input-group mb-3 d-flex justify-content-center">
                        <!-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                        </div> -->
                        <div class="forgot">
                            <small><a href="forget.php">Forgot Password?</a></small>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button name="submit_login" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                    </div>
                     </form>
                    <!-- <div class="input-group mb-3">
                        <button class="btn btn-lg btn-light w-100 fs-6"><img src="images/google.png" style="width:20px" class="me-2"><small>Sign In with Google</small></button>
                    </div> -->
                    <div class="row">
                        <!-- <small>Don't have account? <a href="register.php">Register Now</a></small> -->
                    </div>
              </div>
           </div> 
          </div>
        </div>
    
      
   
</body>
</html>