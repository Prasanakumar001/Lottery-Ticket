<?php
  date_default_timezone_set('Asia/kolkata');
include "config/config.php";
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
            echo "<script>window.location.href='./ind.php'</script>";
      }else{
          // echo "failed";

          echo "<script>alert('Account not Exists')</script>";
            echo "<script>window.location.href='./ind.php'</script>";
    }

 }else{
   echo "<script>alert('Account not Exists')</script>";
            echo "<script>window.location.href='./ind.php'</script>";

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
            echo "<script>window.location.href='./ind.php'</script>";
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

        echo "<script> window.location.href = './index.php'</script>";  
                                                                              
    }else{
       echo "<script>alert('Login Failed')</script>";
       echo "<script>window.location.href='./ind.php'</script>";
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
        echo "<script> window.location.href = './index.php'</script>";  
                                                                              
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
        echo "<script> window.location.href = './admin/index.php'</script>";  
    

    }else{
              
       echo "<script>alert('Login Failed')</script>";
       echo "<script>window.location.href='./ind.php'</script>";
    }


       echo "<script>alert('Login Failed')</script>";
       echo "<script>window.location.href='./ind.php'</script>";
    }
  
}


?>
<!DOCTYPE html>
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
                color: black;
         text-transform: capitalize;
    	}
      .active-nav{
              border-bottom: 3px solid black;
          
          }
          /* .nav-link.active{
    border-bottom:3px solid black;
    
  }*/
          ion-icon {
  color: goldenrod;
  font-size:20px
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
  .navbar { 
/*   border:1px solid red;*/
/*   padding: 15px 0;*/
/*   background: url(nav2.jpg) no-repeat ;*/
  }
  .navbar-brand{
    color: black;

  }
  .nav-item .nav-link{
    color: black;
  }

.colorofbtn:hover{
background: black;


}


@media only screen and (max-width: 600px) {
  #Home {
    background-color: lightblue;
     flex-direction: column;
  }
  #Bottle1,#Bottle2{
    width: 100%;
  }
}



    	    </style>
          

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
          <script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>
</head>
<body >
	
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

    <img src="admin/logo/uploads/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>"  width="52" height="38"  class="navbarlogo">
    &nbsp;
     <span style="letter-spacing: 5px;text-transform: uppercase;font-size: 24px;" class="fw-bold"><?php echo $row['title'] ?></span>
    </a>
        <?php 
    }}else{
        echo "
               <a class='navbar-brand' href='#' style='display: flex;justify-content: center;align-items: center;'>

    <img src='admin/dynamicCarosual/uploads/1696425154.jpg' alt='3024' width='52' height='38' class='navbarlogo'>
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
          <a class="nav-link active-nav d-flex align-items-center" aria-current="page" href="ind.php"><ion-icon name="home"></ion-icon>&nbsp;Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link  d-flex align-items-center"  href="content/about.php"><ion-icon name="ribbon"></ion-icon>&nbsp;about</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" href="content/tc.php"><ion-icon name="newspaper"></ion-icon>&nbsp;terms and conditions</a>
        </li>
         <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" href="content/pp.php"><ion-icon name="lock-closed"></ion-icon>&nbsp;Privacy policy</a>
        </li>
         <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><ion-icon name="log-in"></ion-icon>&nbsp;Login/Register</a>
        </li>

      </ul>
        
      
     
    </div>
  </div>
</nav>



<!-- Modal -->
   <?php
        $sqllogo="select * from offer where status=1";
        $resultlogo=$connection->query($sqllogo);
       if(mysqli_num_rows($resultlogo)>0){
       $i=1;
       if($row=mysqli_fetch_assoc($resultlogo)){
        ?>
      
       <div id="myModal" class="modal model1 fade" role="dialog" data-toggle="modal-onload">
  <div class="modal-dialog modal-dialog-centered ">

    <!-- Modal content-->
    <div class="modal-content"   style="
     background-color: rgba(255, 255, 255, 0.08);
  box-shadow: 12px 12px 20px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(243, 243, 243, 0.7);
  border-radius: 8px;
  backdrop-filter: blur(3px);
  padding: 20px;">
        <div class="modal-body">
       <!--  <center>
       <h1>Offer Zone</h1>
       <hr width="20%">
</center> -->  
<div style="float:right">
   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  <!-- <button type="button" class="close" data-dismiss="modal1" aria-label="Close"></button> -->
     </div> 
      </div>
     <center style="" >
       
        <img  src="admin/logo/posters/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>" style="
  object-fit:contain;height: 200px;width: 300px;">
        <!-- <p>Green day comes today so today rate will be <br><span>Rs.</span><small><del>350</del></small>&nbsp;<span>200/-</span> Only</p> -->
         
     </center>
    <!--  <center> 
      <button type="button" class="btn btn-default" data-dismiss="modal1">Close</button>
    </center> -->
      
      </div>
    
    </div>

  </div>
</div>




 <?php 
    }}
    ?>















  <!-------------------main------------------>

 <div class="container" style="margin-top:120px">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
    <div class="col" > 
  <center style="margin-top: 50px;">
         <div class="wrap">
       <section class="stage">
        <figure class="ball">
          <span class="number" data-number="<?php echo (rand(0,9));?>">&nbsp;</span>
        </figure>
      </section>
  <section class="stage">
        <figure class="ball">
          <span class="number" data-number="<?php echo (rand(0,9));?>">&nbsp;</span>
        </figure>
  </section>
  <section class="stage">
        <figure class="ball">
          <span class="number" data-number="<?php echo (rand(0,9));?>">&nbsp;</span>
        </figure>
  </section>
  <section class="stage">
        <figure class="ball">
          <span class="number" data-number="<?php echo (rand(0,9));?>">&nbsp;</span>
        </figure>
  </section>
</div> 
<!-----wrap------>
      </center>
      <center>
           <h1 style="color: black;">
        have a chance to win
      </h1>
      <h5 style="color:goldenrod">lets check your luck! buy a ticket now</h5>
     

        <button class="learn-more" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <span class="circle" aria-hidden="true">
        <span class="icon arrow"></span>
        </span>
        <span class="button-text">Login now</span>
        </button>
      </center>
 

    </div>
    <div class="col">
       <div class="ag-format-container">
           <div class="ag-lottery-wheel_box">
                <img src="base.png" class="ag-lottery-wheel_img ag-lottery-wheel"  >
                <img src="numbers.png" class="ag-lottery-wheel_img ag-lottery-wheel_numbers"  >
                <img src="element.png" class="ag-lottery-wheel_img ag-lottery-wheel_el" > 
                <div class="ag-lottery-wheel_lights"></div>
          </div>
        </div>
     </div>

    </div>
  </div>
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
              <button onclick="ShowNav()" style="color:goldenrod;font-family: 'Roboto',sans-serif;text-transform: capitalize;font-weight: bold;">&larr;&nbsp;Back To Login</button>
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
       

        <button type="button" onclick="HideContent()" class="viewBtn">Forget Password</button>
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
<!----------------------------register------------------------>
<style type="text/css">
  .pot:hover {
  animation: shake 3s;
  animation-iteration-count: infinite;
}
  @keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
.animate-charcter
{
   text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
     font-size: 24px;*/
}

@keyframes textclip {
  to {
    background-position: 200% center;
  }
}
</style>

  <?php
  $ctnew=date("YmdHi");

      $sqlempty="SELECT *,concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`event_start_time`, '%H%i'))as start,concat(DATE_FORMAT(event_end_date, '%Y%m%d'),TIME_FORMAT(`Event_end_time`, '%H%i'))as end  FROM `Events` Where concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`Event_start_time`, '%H%i'))>='{$ctnew}' and status = 0  order by event_start_date";


        //echo $sqlempty;
    $result=$connection->query($sqlempty);
        if(mysqli_num_rows($result)>0){
        $i=1;
        echo '<div style="width:100%;" class="container">';
         echo "<center><h4 style='color:goldenrod;'>Upcoming events</h4></center>"; 
       while($row=mysqli_fetch_assoc($result)){
         $i++;
          $timestamp=$row['event_start_time'];
          $startdate=$row['event_start_date'];
         $date_today=$startdate.' '.$timestamp.":00";
      
 echo" 
         
      <h1 class='title' style='color:black;margin-bottom:50px'>{$row['event_name']}&nbsp;just @{$row['price']}&nbsp;Rupees<br><sub>Event starts in&nbsp;<span style='color:goldenrod'  id='demoempty{$i}'></span></sub></h1>

         <script type='text/javascript'>
       var countid{$i} ='{$date_today}';
       var countdowndate{$i} =new Date(countid{$i}).getTime();
       var x{$i} = setInterval(() => {
        var now{$i} = new Date().getTime();
        var distance{$i} = countdowndate{$i} - now{$i};
        var days{$i} =Math.floor(distance{$i}/(1000*60*60*24));
        var hours{$i} =Math.floor((distance{$i}%(1000*60*60*24))/(1000*60*60));
        var minutes{$i}=Math.floor((distance{$i}%(1000*60*60))/(1000*60));
        var seconds{$i}=Math.floor((distance{$i}%(1000*60))/1000);
       
        document.getElementById('demoempty{$i}').innerHTML= days{$i}+' days '+hours{$i}+' hours '+minutes{$i}+' minutes '+seconds{$i}+' seconds ';
        
        if(distance{$i}<0){
          clearInterval(x{$i});
          document.getElementById('demoempty{$i}').innerHTML='Started';
 
        }
        

       }, 1000);
    </script>


    ";

}
echo '</div>';
}
  ?>




  <?php
  $cd=date("Y-m-d"); $cth=date("hi"); $ct=date("Hi");
  $cd="'".$cd."'";
  $ct="'".$ct."'";

  $ctnew=date("YmdHi");

 
   $sql="
    SELECT *,concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`event_start_time`, '%H%i'))as start,concat(DATE_FORMAT(event_end_date, '%Y%m%d'),TIME_FORMAT(`Event_end_time`, '%H%i'))as end  FROM `Events` Where (concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`Event_start_time`, '%H%i'))<='{$ctnew}' and concat(DATE_FORMAT(event_end_date, '%Y%m%d'),TIME_FORMAT(`Event_end_time`, '%H%i'))>='{$ctnew}')and status = 0
";
      $result=$connection->query($sql);
   if(mysqli_num_rows($result)>0){
    $i=1;
    echo '<div style="width: 100%;" class="container">  
';
     echo "<center><h4 style='color:goldenrod;'>Running events</h4></center>";        
     $count=0;                   
    while($row=mysqli_fetch_assoc($result)){
      ?>
     
                <?php
          if ($count % 4 == 0)
          {
           echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">';

          }
           ?>
            <div class="col" style="padding:20px">
      <center>
        <div style="height:200px;width: 200px;background: white;border-radius: 15px;position: relative;
         box-shadow: 12px 12px 20px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(243, 243, 243, 0.7);
  display: flex;justify-content: center;align-items: center;
">
          <div><p class="animate-charcter" style="font-family: 'Satisfy', cursive;
" ><?php echo $row["event_name"]?></p></div>
          <div style="bottom:2px;left:3px;position: absolute;">
          <img src="pot.png" class="potstatic" height="50px" width="50px">
          </div>
          <div style="bottom:2px;right:3px;position: absolute;">
          <button data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="playnow.png" class="playnow" height="50px" width="120px">
          </button>
          </div>
          <style type="text/css">
            .playnow:hover{
                transform: scale(1.1);
            }
          </style>

        </div>
      </center>
    </div>
     <?php $count++;?>

     <?php
          if ($count % 4 == 0)
          {
           echo '</div>';

          }
           ?>





     <?php 
   }
   echo '</div>';
 }else{
    

   }
     
     ?>


    
     <?php
       $sql1="select event_name,id,event_start_date,event_end_date from events where status=1 ORDER by updated desc";
           
    $res1=$connection->query($sql1);
    if($res1->num_rows>0){
        $count=0;      
        echo ' <div style="width: 100%;" class="container">  
';     
        echo "<center><h4 style='color:goldenrod;'>Announced Results</h4></center>";        
       while($row1=mysqli_fetch_assoc($res1))
       {
          ?>
           <?php
          if ($count % 4 == 0)
          {
           echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">';

          }
           ?>
            <div class="col" style="padding:20px">
      <center>
                 
        <div style="height:200px;width: 200px;background: white;border-radius: 15px;position: relative;
         box-shadow: 12px 12px 20px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(243, 243, 243, 0.7);
  display: flex;justify-content: center;align-items: center;
">
        

          <div><p class="animate-charcter" style="font-family: 'Satisfy', cursive;
" ><?php echo $row1["event_name"]?></p></div>
          <div style="bottom:2px;left:3px;position: absolute;">
          <img src="pot.png" class="pot" height="50px" width="50px">
          </div>
          <div style="bottom:2px;right:3px;position: absolute;">
          <img src="pot.png" class="pot" height="50px" width="50px">
          </div>
           <div style="width:200px;position: absolute;top:10px ;">
          <?php
          $sql2="select wl.ticket_id, wl.event_id ,ev.event_name, et.event_ticket from winnerlist wl INNER JOIN events ev on ev.id=wl.event_id INNER JOIN event_tickets et on et.id = wl.ticket_id where wl.event_id={$row1['id']}";
              if($res1->num_rows>0){
                 $res2=$connection->query($sql2);
                 $count2=1;
               while($row2=mysqli_fetch_assoc($res2)){
                if($count2<=12){
                   echo ' <span style="height: 50px;width: 50px;border-radius: 20%;color: goldenrod;background-color: green;border: 2px solid green;font-weight: 600;">';
                    echo $row2["event_ticket"];
                    echo '</span>';
                    $count2++;
                }
                  
               }
              } 
          ?>
         
         </div>


        </div>
      </center>
    </div>
     <?php $count++;?>

     <?php
          if ($count % 4 == 0)
          {
           echo '</div>';

          }
           ?>

         
        <?php 

        }
        echo '</div>';
      }
        ?>

   




























  


<style type="text/css">
  .sepact.active{
    border:3px solid black;
    border-radius: 15px;
  }
 


.ball {
  display: inline-block;
  width: 100%;
  height: 100%;
  margin: 0;
  border-radius: 50%;
  position: relative;
  background: radial-gradient(circle at 50% 40%, #fcfcfc, #efeff1 66%, #9b5050 100%);
  overflow: hidden;
  animation: ballGrow 2s ease-out forwards;
  transform: scale(0.5);
}
.ball:after {
  content: "";
  position: absolute;
  top: 5%;
  left: 10%;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8) 14%, rgba(255, 255, 255, 0) 24%);
  -webkit-transform: translateX(-80px) translateY(-90px) skewX(-20deg);
  -moz-transform: translateX(-80px) translateY(-90px) skewX(-20deg);
  -ms-transform: translateX(-80px) translateY(-90px) skewX(-20deg);
  -o-transform: translateX(-80px) translateY(-90px) skewX(-20deg);
  transform: translateX(-80px) translateY(-1px) skewX(-90deg);
}

.stage {
  width: 40px;
  height: 40px;
  display: inline-block;
  margin: 10px;

  -webkit-perspective: 1200px;
  -moz-perspective: 1200px;
  -ms-perspective: 1200px;
  -o-perspective: 1200px;
  perspective: 1200px;
  -webkit-perspective-origin: 50% 50%;
  -moz-perspective-origin: 50% 50%;
  -ms-perspective-origin: 50% 50%;
  -o-perspective-origin: 50% 50%;
  perspective-origin: 50% 50%;
}

.number {
  position: absolute;
  width: 100%;
  text-align: center;
  line-height: 50px;
  font-size: 28px;
  color: goldenrod;
  font-family: 'Roboto', sans-serif;
  animation: ballRoll 5s ease-out ;
/*  animation-iteration-count: infinite;*/

}

.number:after {
  content: attr(data-number);
  position: absolute;
  transform: translateX(-200%);
  opacity: 0;

animation: numberReveal 0.1s 1.5s reverse forwards;

}

.number:before {
  content: '?';
  position: absolute;
  transform: translateX(-200%);
  animation: numberReveal 0.1s 1.5s forwards;
}

@keyframes ballRoll {
  0%, 20%, 50% {
    opacity: 1;
    transform: translateY(0) rotateX(0) scale(1);
  }
  10%, 35%, 75% {
    transform: translateY(-200%) rotateX(270deg) scale(0.4);
  }
  11%, 36%, 76% {
    transform: translateY(200%) rotateX(-270deg) scale(0.3);
    opacity: 0;
  }
  
}

@keyframes ballGrow {
  0% {
    transform: scale(0.5);
  }
  100% {
    transform: scale(1);
  }
}

@keyframes numberReveal {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}


.stage:nth-child(2) .ball,
.stage:nth-child(2) .number {
  animation-delay: 0.3s;
}

.stage:nth-child(2) .number:after,
.stage:nth-child(2) .number:before {
  animation-delay: 1.8s;
}

.stage:nth-child(3) .ball,
.stage:nth-child(3) .number {
  animation-delay: 0.6s;
}

.stage:nth-child(3) .number:after,
.stage:nth-child(3) .number:before {
  animation-delay: 2.1s;
}

.stage:nth-child(4) .ball,
.stage:nth-child(4) .number {
  animation-delay: 0.9s;
}

.stage:nth-child(4) .number:after,
.stage:nth-child(4) .number:before {
  animation-delay: 2.4s;
}





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


        <style type="text/css">
          button {
   position: relative;
   display: inline-block;
   cursor: pointer;
   outline: none;
   border: 0;
   vertical-align: middle;
   text-decoration: none;
   background: transparent;
   padding: 0;
   font-size: inherit;
   font-family: inherit;
}
 button.learn-more {
   width: 12rem;
   height: auto;
}
 button.learn-more .circle {
   transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
   position: relative;
   display: block;
   margin: 0;
   width: 3rem;
   height: 3rem;
/*   background: #282936;*/
   background: goldenrod;
   border-radius: 1.625rem;
}
 button.learn-more .circle .icon {
   transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
   position: absolute;
   top: 0;
   bottom: 0;
   margin: auto;
   background: #fff;
}
 button.learn-more .circle .icon.arrow {
   transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
   left: 0.625rem;
   width: 1.125rem;
   height: 0.125rem;
   background: none;
}
 button.learn-more .circle .icon.arrow::before {
   position: absolute;
   content: '';
   top: -0.25rem;
   right: 0.0625rem;
   width: 0.625rem;
   height: 0.625rem;
   border-top: 0.125rem solid #fff;
   border-right: 0.125rem solid #fff;
   transform: rotate(45deg);
}
 button.learn-more .button-text {
   transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
   position: absolute;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   padding: 0.75rem 0;
   margin: 0 0 0 1.85rem;
/*   color: #282936;*/
color: goldenrod;
   font-weight: 700;
   line-height: 1.6;
   text-align: center;
   text-transform: uppercase;
}
 button:hover .circle {
   width: 100%;
}
 button:hover .circle .icon.arrow {
   background: #fff;
   transform: translate(1rem, 0);
}
 button:hover .button-text {
   color: #fff;
}
        </style>
<style type="text/css">
 
::-webkit-scrollbar {
    display: none;
}
</style>
<script type="text/javascript">
  var scrollSpy = new bootstrap.ScrollSpy(document.body, {
  target: '#navbar-example2'
})
  var dataSpyList = [].slice.call(document.querySelectorAll('[data-bs-spy="scroll"]'))
dataSpyList.forEach(function (dataSpyEl) {
  bootstrap.ScrollSpy.getInstance(dataSpyEl).refresh()
})
// var firstScrollSpyEl = document.querySelector('[data-bs-spy="scroll"]')
// firstScrollSpyEl.addEventListener('activate.bs.scrollspy', function () {
//   // do something...
// })
</script>
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



<style type="text/css">

 .title {
  margin-top: 20px;
  /* added margin-top */
    color: #fff;
    opacity: 0.9;
    padding-left: 4%;
    text-transform: capitalize;
    font-size: 22px;
    font-weight: 500;
 }

 .movies-list {
    width: 100%;
    height: 220px;
    position: relative;
    margin: 10px 0 20px;
 }

 .card-container {
    position: absolute;
    width: 96%;
    padding-left: 4%;
    height: 220PX;
    display: flex;
    margin: 0 auto;
    align-items: center;
    overflow-x: auto;
    overflow-y: visible;
    scroll-behavior: smooth;

  
 }

 .card-container::-webkit-scrollbar {
    display: none;
 }

 .card {
    position: relative;
     min-width: 350px;
    width: 350px;
    height: 190px; 
   
    border-radius: 5px;
    overflow: hidden;
    margin-left: 20px;
    transition: .5s;
    background: #000;
 }
 .card:hover {
    transform: scale(1.1);
 }
 .card:hover .card-body {
    opacity: 1;
 }
 .card:hover .card-body2 {
    display:none;
 }
 .card-img {
    width: 100%;
    height: 100%;
    object-fit:unset;
 }

 .card-body {
    opacity: 0;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    background: linear-gradient(to bottom, rgba(4, 8, 15, 0), #192133 90%);
    padding: 10px;
    transition: 0.5s;
 }

 .card-body2 {
    opacity: 1;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px;
    transition: 0.5s;
   
 }
 .name2 {
    color: #fff;
    font-size: 15px;
    font-weight: 500;
    text-transform: capitalize;
    width:30%;
    margin-top: 34%;
    margin-left:15%;
    border:none;
    background-color:white;
    text-align:center;
    color:black;
 }



 .name {
    color: #fff;
    font-size: 15px;
    font-weight: 500;
    text-transform: capitalize;
    margin-top: 23%;
 }

 .des {
    /* color: #fff; */
    color:red;
    font-weight: bolder;
    opacity: 0.8;
    margin: 5px 0;
    font-weight: 500;
    font-size: 12px;
 }

 .watchlist-btn {
    position: relative;
    width: 100%;
    text-transform: capitalize;
    background: none;
    border: none;
    font-weight: 500;
    /* text-align: right; */
    text-align: center;
    color: rgba(255, 255, 255, 0.5);
    margin: 5px 0;
    cursor: pointer;
    padding: 10px 5px;
    border-radius: 5px;
    text-decoration: none;
 }
 
 .watchlist-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -5px;
    height: 35px;
    width: 35px;
    background-image: url(images/add.png);
    background-size: cover;
    transform: scale(0.4);
 }

 .watchlist-btn:hover {
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
 }

 .pre-btn,
 .nxt-btn {
    position: absolute;
    top: 0;
    width: 5%;
    height: 100%;
    z-index: 2;
    border: none;
    cursor: pointer;
    outline: none;
 }

 .pre-btn {
    left: 0;
    background: linear-gradient(to right, #0c111b 0%, #0c111b00);
 }

 .nxt-btn {
    right: 0;
    background: linear-gradient(to left, #0c111b 0%, #0c111b00);
 }

 .pre-btn img,
 .nxt-btn img {
    width: 15px;
    height: 20px;
    opacity: 0;
 }
 
 .pre-btn:hover img,
 .nxt-btn:hover img {
    opacity: 1;
 }


 @media screen and (min-width: 700px) {
 /* body {
    background-color: lightgreen;
  }*/
  .carousel1{
  padding: 0;
}
#myCarousel{
 
  margin: 0;
/*  margin-top: 10px;*/
  padding: 0;
}
#myCarousel .carousel-inner .item .tales {
  width: 100%;
}
#myCarousel .carousel-inner{
  width:100%;
  max-height: 500px !important;
}
#myCarousel .carousel-inner img{
  width:100%;
  max-height: 500px !important;
}

#myCarousel .carousel-inner .carousel-caption{
  margin:50px;
}
 }
   </style>  
     <style type="text/css">
   .poster-list {
    width: 100%;
    height: 420px;
    position: relative;
    margin: 10px 0 20px;
    /* margin-top: 60px; */
 }

 .poster-container {
    position: absolute;
    width: 96%;
    padding-left: 4%;
    height: 420PX;
    display: flex;
    margin: 0 auto;
    align-items: center;
    overflow-x: auto;
    overflow-y: visible;
    scroll-behavior: smooth;

  
 }

 .poster-container::-webkit-scrollbar {
    display: none;
 }

 .single-poster {
    position: relative;
     min-width: 1000px;
    width: 550px;
    height: 400px; 
     /* min-width: 150px;
    width: 150px;
    height: 200px;  */
    border-radius: 5px;
    overflow: hidden;
    margin-left: 20px;
    transition: .5s;
    background: #000;
 }
 /* .single-poster:hover {
    transform: scale(1.1);
 }
 .single-poster:hover {
    opacity: 1;
 } */

 .poster-img {
    width: 100%;
    height: 100%;
    object-fit:unset;
 }
</style>


   <script>
      // cards sliders

let posterContainers = document.querySelectorAll('.poster-container');

    // cards sliders

let cardContainers = document.querySelectorAll('.card-container');
let preBtns = document.querySelectorAll('.pre-btn');
let nxtBtns = document.querySelectorAll('.nxt-btn');

cardContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtns[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth - 200;
    })

    preBtns[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth + 200;
    })
})
// posterContainers.forEach((item, i) => {
//     let containerDimensions = item.getBoundingClientRect();
//     let containerWidth = containerDimensions.width;

//     nxtBtns[i].addEventListener('click', () => {
//         item.scrollLeft += containerWidth - 200;
//     })

//     preBtns[i].addEventListener('click', () => {
//         item.scrollLeft -= containerWidth + 200;
//     })
// })
   </script>


<style type="text/css">
    /*maintence*/
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");
 .main-wrapper {
     font-size: 15vmin;
     background-color: transparent;
     width: 100%;
     height: 100%;
     display: flex;
     align-items: center;
     justify-content: center;
     overflow-x: hidden;
}
 .signboard-wrapper {
     width: 75vmin;
     height: 55vmin;
     margin: 20px;
     position: relative;
     flex-shrink: 0;
     transform-origin: center 2.5vmin;
     animation: 1000ms init forwards, 1000ms init-sign-move ease-out 1000ms, 3000ms sign-move 2000ms infinite;
}
 .signboard-wrapper .signboard {
     color: #fff;
     font-family: "Open Sans", sans-serif;
     font-weight: bold;
     font-size:22px ;
     background-color: #0c111b;
     width: 100%;
     height: 35vmin;
     display: flex;
     align-items: center;
     justify-content: center;
     position: absolute;
     bottom: 0;
     border-radius: 4vmin;
     text-shadow: 0 -0.015em #be2b00;
     box-shadow: 0 2vmin 4vmin 1vmin rgba(107, 107, 107, 0.8);
}
 .signboard-wrapper .string {
     width: 30vmin;
     height: 30vmin;
     border: solid 0.9vmin #893d00;
     border-bottom: none;
     border-right: none;
     position: absolute;
     left: 50%;
     transform-origin: top left;
     transform: rotate(45deg);
}
 .signboard-wrapper .pin {
     width: 5vmin;
     height: 5vmin;
     position: absolute;
     border-radius: 50%;
}
 .signboard-wrapper .pin.pin1 {
     background-color: #9f9f9f;
     top: 0;
     left: calc(50% - 2.5vmin);
}
 .signboard-wrapper .pin.pin2, .signboard-wrapper .pin.pin3 {
     background-color: #d83000;
     top: 21.5vmin;
}
 .signboard-wrapper .pin.pin2 {
     left: 13vmin;
}
 .signboard-wrapper .pin.pin3 {
     right: 13vmin;
}
 @keyframes init {
     0% {
         transform: scale(0);
    }
     40% {
         transform: scale(1.1);
    }
     60% {
         transform: scale(0.9);
    }
     80% {
         transform: scale(1.05);
    }
     100% {
         transform: scale(1);
    }
}
 @keyframes init-sign-move {
     100% {
         transform: rotate(3deg);
    }
}
 @keyframes sign-move {
     0% {
         transform: rotate(3deg);
    }
     50% {
         transform: rotate(-3deg);
    }
     100% {
         transform: rotate(3deg);
    }
}
 
</style>
<style type="text/css">
  .ag-format-container {
/*  width: 1142px;*/
  margin: 0 auto;
}
.ag-lottery-wheel_box {
  width: 300px;
  margin: 50px auto;

  position: relative;
}
.ag-lottery-wheel_img {
  width: 100%;
}
.ag-lottery-wheel {
  position: relative;
}
.ag-lottery-wheel_numbers {
  position: absolute;
  top: 0;
  left: 0;

  -webkit-animation: an-rotate-wheel 45s linear infinite;
  -moz-animation: an-rotate-wheel 45s linear infinite;
  -o-animation: an-rotate-wheel 45s linear infinite;
  animation: an-rotate-wheel 45s linear infinite;
}
.ag-lottery-wheel_el {
  position: absolute;
  top: 0;
  left: 0;

  -webkit-animation: an-rotate-wheel 65s linear infinite;
  -moz-animation: an-rotate-wheel 65s linear infinite;
  -o-animation: an-rotate-wheel 65s linear infinite;
  animation: an-rotate-wheel 65s linear infinite;
}
.ag-lottery-wheel_lights:after {
  content: "";
  height: 206px;
  width: 206px;
  background: url(https://raw.githubusercontent.com/SochavaAG/example-mycode/master/pens/lottery-wheel/images/light.png) 0 0 no-repeat;
  -webkit-background-size: 100% auto;
  -moz-background-size: 100% auto;
  -o-background-size: 100% auto;
  background-size: 100% auto;

  opacity: 0;

  position: absolute;
  top: 0;
  left: 0;

  -webkit-transform: translate(37%, -47%);
  -moz-transform: translate(37%, -47%);
  -ms-transform: translate(37%, -47%);
  -o-transform: translate(37%, -47%);
  transform: translate(37%, -47%);

  -webkit-animation: an-opacity-light 5s linear infinite;
  -moz-animation: an-opacity-light 5s linear infinite;
  -o-animation: an-opacity-light 5s linear infinite;
  animation: an-opacity-light 5s linear infinite;
}
.ag-lottery-wheel_lights:after {
  width: 100px;
  height: 100px;

  -webkit-transform: translate(37%, -31%);
  -moz-transform: translate(37%, -31%);
  -ms-transform: translate(37%, -31%);
  -o-transform: translate(37%, -31%);
  transform: translate(37%, -31%);
}

@-webkit-keyframes an-rotate-wheel {
  100% {
    -webkit-transform:  rotate(360deg);
    transform:  rotate(360deg);
  }
}

@-moz-keyframes an-rotate-wheel {
  100% {
    -moz-transform:  rotate(360deg);
    transform:  rotate(360deg);
  }
}

@-o-keyframes an-rotate-wheel {
  100% {
    -o-transform:  rotate(360deg);
    transform:  rotate(360deg);
  }
}

@keyframes an-rotate-wheel {
  100% {
    -webkit-transform:  rotate(360deg);
    -moz-transform:  rotate(360deg);
    -o-transform:  rotate(360deg);
    transform:  rotate(360deg);
  }
}

@-webkit-keyframes an-opacity-light {
  5% {
    opacity: 1;
  }
  0%,10%,100% {
    opacity: 0;
  }
}

@-moz-keyframes an-opacity-light {
  5% {
    opacity: 1;
  }
  0%,10%,100% {
    opacity: 0;
  }
}

@-o-keyframes an-opacity-light {
  5% {
    opacity: 1;
  }
  0%,10%,100% {
    opacity: 0;
  }
}

@keyframes an-opacity-light {
  5% {
    opacity: 1;
  }
  0%,10%,100% {
    opacity: 0;
  }
}


@media only screen and (max-width: 767px) {
  .ag-format-container {
    width: 96%;
  }

}

@media only screen and (max-width: 639px) {

}

@media only screen and (max-width: 479px) {

}

@media (min-width: 768px) and (max-width: 979px) {
  .ag-format-container {
    width: 750px;
  }

}

@media (min-width: 980px) and (max-width: 1161px) {
  .ag-format-container {
    width: 960px;
  }

}

</style>


</body>
</html>