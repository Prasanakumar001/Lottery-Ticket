<?php
  date_default_timezone_set('Asia/kolkata');
include "../config/config.php";
if(isset($_POST['forgetPassword'])){
    $phonenumber=mysqli_real_escape_string($connection,$_POST["phonenumber"]);
    $email=mysqli_real_escape_string($connection,$_POST["email"]);
    $newpassword=mysqli_real_escape_string($connection,$_POST["newpassword"]);
    $sql="select * from `register` where trim(email)='$email' and trim(phonenumber)='$phonenumber' ";
    $result = mysqli_query($connection,$sql);
    $count = mysqli_num_rows($result);


    if($count>0){

       $sql1="UPDATE `register` SET `password`='$newpassword' WHERE `email`='$email' and  `phonenumber`='$phonenumber' ";
    
      if($connection->query($sql1)){
        
            echo "<script>alert('Account password changed')</script>";
            echo "<script>window.location.href='pp.php'</script>";

      }else{
          // echo "failed";

          echo "<script>alert('Account not Exists')</script>";
            echo "<script>window.location.href='pp.php'</script>";
    }

 }else{
   echo "<script>alert('Account not Exists')</script>";
            echo "<script>window.location.href='pp.php'</script>";

 }





}
if(isset($_POST['register'])){
    $name=mysqli_real_escape_string($connection,$_POST["name"]);
    $email=mysqli_real_escape_string($connection,$_POST["email"]);
    $password=mysqli_real_escape_string($connection,$_POST["password"]);
    $phonenumber=mysqli_real_escape_string($connection,$_POST["phonenumber"]);

    $sqlcheck="select * from register where email='$email'";
     if($connection->query($sqlcheck)){
      $result1 = mysqli_query($connection,$sqlcheck);
       $count1 = mysqli_num_rows($result1);
        if($count1>0){
            echo "<script>alert('Account Already Exists')</script>";
            echo "<script>window.location.href='../ind.php'</script>";
        }else{

    $sql="INSERT INTO `register`( `name`, `password`,`phonenumber`,`email`) VALUES ('$name','$password','$phonenumber','$email')";
  
    if($connection->query($sql)){
        
            $sql1="select * from `register` where trim(email)='$email' and trim(password)='$password' ";
   
    $result = mysqli_query($connection,$sql1);
    $count = mysqli_num_rows($result);
   session_start();

    if($count>0){

        $row1=$result->fetch_assoc();
        $_SESSION['id']=$row1["id"];
       $_SESSION['name']=$row1["name"];
       $_SESSION['cart']=[];

        echo "<script> window.location.href = '../index.php'</script>";  
                                                                              
    }else{
       echo "<script>alert('Login Failed')</script>";
       echo "<script>window.location.href='pp.php'</script>";
    }
    }






        }

     }

}

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="select * from `register` where trim(email)='$email' and trim(password)='$password' ";
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
       $_SESSION['cart']=[];
    //    echo "hello";
    //    echo $_SESSION["id"];
    //    echo $_SESSION["name"];
        //header("Location: ../index.php");
        echo "<script> window.location.href = '../index.php'</script>";  
                                                                              
    }else{
          $sql="select * from `admin` where trim(email)='$email' and trim(password)='$password' ";
           $result = mysqli_query($connection,$sql);
    $count = mysqli_num_rows($result);
      

    if($count>0){
       // session_start();
         $row1=$result->fetch_assoc();
        $_SESSION['id']=$row1["id"];
         //echo "UnAvailable";
       $_SESSION['name']=$row1["name"];
      // $_SESSION['cart']=[];
    //    echo "hello";
    //    echo $_SESSION["id"];
    //    echo $_SESSION["name"];
        //header("Location: ../index.php");
        echo "<script> window.location.href = '../admin/index.php'</script>";  
    

    }else{
              
       echo "<script>alert('Login Failed')</script>";
       echo "<script>window.location.href='pp.php'</script>";
    }


       echo "<script>alert('Login Failed')</script>";
       echo "<script>window.location.href='pp.php'</script>";
    }
  
}


?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>index</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet"> -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">


<script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <style type="text/css">
      @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
      body{
       font-family: 'Roboto',sans-serif;
        background: #eeeeff;
         text-transform: capitalize;
      }
      .active-nav{
            border-bottom: 3px solid black;
          
          }
              .sepact.active{
    border:3px solid black;
    border-radius: 15px;
  }
  .sepact{
    border: none;
  }
 

          ion-icon {
  color: goldenrod;
  font-size:20px
}


  .navbar-brand{
    color: black;

  }
  .nav-item .nav-link{
    color: black;
  }

.navbarlogo {
 /* width: 100%;
  height: 500px;
  object-fit: cover*/;
/*  aspect-ratio: 16:9;*/
  object-fit: cover;
}
.navbar-brand:hover{
    color:black;
}
          </style>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
  
<nav id="navbar-example2" class="navbar navbar-expand-lg fixed-top" style="background-color: #eeeeff;">
  <div class="container"
  style="  background-color: rgba(255, 255, 255, 0.08);
  box-shadow: 12px 12px 20px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(243, 243, 243, 0.7);
  border-radius: 8px;
  backdrop-filter: blur(3px);
  padding: 20px;

  ">
     
      <?php
        $sqllogo="select * from logo where status=1";
        $resultlogo=$connection->query($sqllogo);
       if(mysqli_num_rows($resultlogo)>0){
       $i=1;
       if($row=mysqli_fetch_assoc($resultlogo)){
        ?>
        <a class="navbar-brand" href="ind.php" style="display: flex;justify-content: flex-start;align-items: center;">

    <img src="../admin/logo/uploads/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>"  width="52" height="38"  class="navbarlogo">
    &nbsp;
     <span style="letter-spacing: 5px;text-transform: uppercase;font-size: 24px;" class="fw-bold"><?php echo $row['title'] ?></span>
    </a>
        <?php 
    }}else{
        echo "
               <a class='navbar-brand' href='#' style='display: flex;justify-content: center;align-items: center;'>

    <img src='../admin/dynamicCarosual/uploads/1696425154.jpg' alt='3024' width='52' height='38' class='navbarlogo'>
    &nbsp;
     <span style='letter-spacing: 5px;text-transform: uppercase;font-size: 24px;' class='fw-bold'>LuckyWin</span>
    </a>
        ";
    }
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <!-- <span class="navbar-toggler-icon" style=""></span> -->
      <i class="fa-solid fa-bars" style="color: goldenrod;"></i>
    </button>

    <div class="collapse navbar-collapse text-white" id="navbarSupportedContent" style="z-index:1000">
     
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link  d-flex align-items-center" aria-current="page" href="../ind.php"><ion-icon name="home"></ion-icon>&nbsp;Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link  d-flex align-items-center "  href="about.php"><ion-icon name="ribbon"></ion-icon>&nbsp;about</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" href="tc.php"><ion-icon name="newspaper"></ion-icon>&nbsp;terms and conditions</a>
        </li>
         <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center active-nav" href="pp.php"><ion-icon name="lock-closed"></ion-icon>&nbsp;Privacy policy</a>
        </li>
         <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><ion-icon name="log-in"></ion-icon>&nbsp;Login/Register</a>
        </li>

      </ul>
        
      
     
    </div>
  </div>
</nav>


  <div id="termsandconditions" style="margin-top:120px" class="container">
   <center><h2 style="color: goldenrod;" class="mb-3">privacy policy</h2></center>

    <h5 class="lh-lg fw-bold">
      <?php
$sql = "SELECT * FROM `editor` where status=1";
$resultset = mysqli_query($connection, $sql) or die("database error:". mysqli_error($connection));
if(mysqli_num_rows($resultset)>0){

while( $rows = mysqli_fetch_assoc($resultset) ) { 
?>
<div class="container" style="margin-top:5px;font-family:'Roboto',sans-serif">
       <?php 
       echo  $rows['content'];
       ?>
     
</div>
<?php
}
}
else{
  echo "There are number of lotteries that take place in india.most of which are run by state government organigations.this lottery comprises of a variety of lottery games,six of which are the Opal, Topaz, silver, gold, platinum and diamond.Having a variety of games available means that players can either opportunity to play one or all the games and potentially win a life changing amount of money and consolation cash prizes.we recommend you to play at least one lottery ticket in a month to check your luck in your life.";
}
?>
  </h5>
  </div>





        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
    <div class="modal-content" style="
      background-color: rgba(255,255, 255, 0.9);
  box-shadow: 12px 12px 20px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(243, 243, 243, 0.7);
  border-radius: 8px;
  backdrop-filter: blur(25px);
  padding: 20px;
  ">
      <div class="modal-header" style="border: none;">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Mo</h5> -->
         <div id="HideNav" style="display:none">
              <button onclick="ShowNav()" style="color:goldenrod;font-family: 'Roboto',sans-serif;text-transform: capitalize;font-weight: bold;border:none">&larr;&nbsp;Back To Login</button>
        </div> 
          <nav id="showNav" style="">
  <div class="nav " style="display: flex;justify-content: center;" id="nav-tab" role="tablist">
    <button class="nav-link active sepact" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" style="color:goldenrod;font-family: 'Roboto',sans-serif;text-transform: capitalize;font-weight: bold;">login</button>
    <button class="nav-link sepact" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" style="color:goldenrod;font-family: 'Roboto',sans-serif;text-transform: capitalize;font-weight: bold;">register</button>
    
    </div>
   </nav>
        <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style=" ">

          
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

   <div class="container">
     <form method="post" id="LoginCrend">
      <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">Email address</label>
     <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
     </div>
     <div class="mb-3">
     <label for="inputPassword5" class="form-label" style="font-weight: bold;">Password</label>
     <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock"  placeholder="Password" required>
      </div>
     <div class="mb-2" style="display:flex;justify-content: space-between;">
       

        <button type="button" onclick="HideContent()" class="viewBtn" style="border:none">Forget Password</button>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
         
      


      </div>

     
      </form>

       <form method="post" id="LoginCrend2" style="display:none">
         <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">email</label>
     <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" required>
     </div>
      <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">phone number</label>
     <input type="text" name="phonenumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phonenumber" required>
     </div>
     <div class="mb-3">
     <label for="inputPassword5" class="form-label" style="font-weight: bold;">New Password</label>
     <input type="password" name="newpassword" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock"  placeholder="Password" required>
      </div>
     <div class="mb-2" style="display:flex;justify-content: space-between;">
       

        <!-- <button onclick="HideContent()" class="viewBtn">Forget Password </button> -->
        <button type="submit" class="btn btn-primary" name="forgetPassword">Change Password</button>
         
      


      </div>

     
      </form>


      <script type="text/javascript">
        function HideContent(){
          const login =document.getElementById("LoginCrend");
           const login2 =document.getElementById("LoginCrend2");
          const navi =document.getElementById("showNav");
          const hideNav=document.getElementById("HideNav");
          login.style.display="none";
          navi.style.display="none";
          hideNav.style.display="block";
          login2.style.display="block";
        }
        function ShowNav(){
          const login =document.getElementById("LoginCrend");
           const login2 =document.getElementById("LoginCrend2");
          const navi =document.getElementById("showNav");
          const hideNav=document.getElementById("HideNav");
          login.style.display="block";
          navi.style.display="block";
          hideNav.style.display="none";  
          login2.style.display="none"; 
         }
      </script>
      <style type="text/css">
        .viewBtn:hover{
          color:red;
        }
      </style>
  
   </div>
  </div>
  
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="container">
     <form method="post">
      <div class="mb-3">
     <label for="userreg" class="form-label" style="font-weight: bold;">Username</label>
     <input type="text" class="form-control" id="userreg"  name="name" minlength="4"  placeholder="Name"  required>
     </div>
     <div class="mb-3">
     <label for="phreg" class="form-label" style="font-weight: bold;">Phone number</label>
     <input type="text" class="form-control" id="phreg" name="phonenumber" pattern="[6789][0-9]{9}"  placeholder="Phonenumber"  required>
     </div>
      <div class="mb-3">
     <label for="emailreg" class="form-label" style="font-weight: bold;">Email address</label>
     <input type="email" class="form-control" id="emailreg" aria-describedby="emailHelp" name="email"  placeholder="Email"  required>
     </div>
     <div class="mb-3">
     <label for="passreg" class="form-label" style="font-weight: bold;">Password</label>
     <input type="password" id="passreg" class="form-control" aria-describedby="passwordHelpBlock" name="password"  placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
<div id="message">
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
      </div>

     <div class="mb-2" style="display:flex;justify-content: flex-end;">
       
        <button type="submit" class="btn btn-primary" name="register">Register</button>
      </div>
      </form>
  
   </div>

  </div>
  
</div>
        



      </div><!----body--->
      
    </div>
  </div>
</div>




<style type="text/css">
  
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}

</style>

<script>
var myInput = document.getElementById("passreg");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>


</body>
</html>