<?php 
date_default_timezone_set('Asia/kolkata');
include "config/config.php";
session_start();
if(empty($_SESSION['cart'])){
    $_SESSION['cart']=[];
}
if(!isset($_SESSION['name'])){
  
  //echo "<script>alert('login')</script>";
  echo "<script>window.location.href='ind.php'</script>";
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
    	body{
    	 font-family: 'Roboto',sans-serif;
	     background: #eeeeff;
         text-transform: capitalize;
         
    	}
        .navbarlogo {
 /* width: 100%;
  height: 500px;
  object-fit: cover*/;
/*  aspect-ratio: 16:9;*/
  object-fit: cover;
}
        table,tr,td{
          

    color: black;
    opacity: 0.9;
    padding-left: 4%;
    text-transform: capitalize;
    font-size: 22px;
    font-weight: 500;
        }
      .active-nav{
            border-bottom: 3px solid black;
          
          }
          ion-icon {
  color: goldenrod;
  font-size:20px
}
.navbar { 
/*	 border:1px solid red;*/
	 padding: 15px 0;
	}
	.navbar-brand{
		color: black;
	}
	.nav-item .nav-link{
		color: black;
	}
      
 .title {
  
  /* added margin-top */
    color: #fff;
    opacity: 0.9;
    padding-left: 1%;
    text-transform: capitalize;
    font-size: 22px;
    font-weight: 500;
 }
 .navbar-brand:hover{
    color:white;
}

    	    </style>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #eeeeff;">
  <div class="container" style="  background-color: rgba(255, 255, 255, 0.08);
  box-shadow: 12px 12px 20px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(243, 243, 243, 0.7);
  border-radius: 8px;
  backdrop-filter: blur(3px);
  padding: 20px;">
     
      <?php
        $sqllogo="select * from logo where status=1";
        $resultlogo=$connection->query($sqllogo);
       if(mysqli_num_rows($resultlogo)>0){
       $i=1;
       if($row=mysqli_fetch_assoc($resultlogo)){
        ?>
        <a class="navbar-brand" href="index.php" style="display: flex;justify-content: flex-start;align-items: center;">

    <img src="admin/logo/uploads/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>"  width="52" height="38"  class="navbarlogo">
    &nbsp;
     <span style="letter-spacing: 5px;text-transform: uppercase;"><?php echo $row['title'] ?></span>
    </a>
        <?php 
    }}else{
        echo "
               <a class='navbar-brand' href='#' style='display: flex;justify-content: center;align-items: center;'>

    <img src='admin/dynamicCarosual/uploads/1696425154.jpg' alt='3024' width='52' height='38' class='navbarlogo'>
    &nbsp;
     <span>L&nbsp;u&nbsp;c&nbsp;k&nbsp;y&nbsp;W&nbsp;i&nbsp;n</span>
    </a>
        ";
    }
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <!-- <span class="navbar-toggler-icon" style=""></span> -->
      <i class="fa-solid fa-bars" style="color: goldenrod;"></i>
    </button>

    <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
     
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link   d-flex align-items-center" aria-current="page" href="index.php"><ion-icon name="home"></ion-icon>&nbsp;Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" id="adynamiccount" href="cart.php"><ion-icon name="cart"></ion-icon>&nbsp;Cart&nbsp;<sup id="dynamiccount">
            <?php  
            if(empty(($_SESSION["cart"])))
            {
                echo "0";
            }else{
                echo count($_SESSION["cart"]);
            } ?>
            <sup></a>
        </li>
         <li class="nav-item">
          <a class="nav-link  d-flex align-items-center"  href="purchased.php"><ion-icon name="bookmark"></ion-icon>&nbsp;Purchased</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" href="results.php"><ion-icon name="trophy"></ion-icon>&nbsp;Result</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link  active-nav d-flex align-items-center" href="about.php"> <ion-icon name="lock-open"></ion-icon>&nbsp;Important notes</a>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  d-flex align-items-center" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <ion-icon name="person-circle"></ion-icon>&nbsp;
          <?php echo $_SESSION["name"];?>
          </a>
          <ul class="dropdown-menu dropdown-menu-white" aria-labelledby="navbarDarkDropdownMenuLink">
            <li> <a class="dropdown-item" href="login/logout.php">Logout</a></li>
            <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </li>
       
        
      </ul>
        
      
     
    </div>
  </div>
</nav>










<div class="container" style="margin-top:120px">
  <h1 style="color: goldenrod;">Privacy Policy</h1>
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
	echo "<center>No Data Found</center>";
}
?>
<h1 style="color: goldenrod;">Terms & conditions</h1>
<?php
$sql = "SELECT * FROM `terms` where status=1";
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
  echo "<center>No Data Found</center>";
}
?>
</div>

</body>
</html>