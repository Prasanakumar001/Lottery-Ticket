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
      @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
    	body{
    	 font-family: 'Roboto',sans-serif;
	      background: #eeeeff;
         text-transform: capitalize;
    	}
      .active-nav{
            border-bottom: 3px solid black;
          
          }
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
    	    </style>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
	
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #eeeeff;">
  <div class="container"
  style="  background-color: rgba(255, 255, 255, 0.08);
  box-shadow: 12px 12px 20px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(243, 243, 243, 0.7);
  border-radius: 8px;
  backdrop-filter: blur(3px);
  padding: 20px;"
>
     
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
          <a class="nav-link active-nav  d-flex align-items-center" aria-current="page" href="index.php"><ion-icon name="home"></ion-icon>&nbsp;Home</a>
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
          <a class="nav-link  d-flex align-items-center" href="about.php"><ion-icon name="lock-open"></ion-icon>&nbsp;Important notes</a>
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
	<!--------------carousel------------------->
  <div class="container">
  <center  style="margin-top: 120px;color: white;letter-spacing: 3px;
  /* font-family: 'Archivo Black', sans-serif; */
  font-family: 'Black Ops One', cursive;
  "><h1 class="title">Events of the day</h1></center>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    <?php
        $sqlimg="select * from images where status=1";
        $resultimg=$connection->query($sqlimg);
       if(mysqli_num_rows($resultimg)>0){
       $i=1;
       while($row=mysqli_fetch_assoc($resultimg)){
        ?>
        <?php 
        if($i==1){
          echo " 
        <div class='carousel-item active'>
      <img src='admin/dynamicCarosual/uploads/{$row['image']}' class='d-block w-100' alt='{$row['image']}'>
       </div> ";

        }else{
     echo "
     <div class='carousel-item '>
      <img src='admin/dynamicCarosual/uploads/{$row['image']}' class='d-block w-100' alt='{$row['image']}'>
       </div>";
   }
       $i++;
   ?>
        <?php
    }}else{
        echo "<div class='carousel-item active'>
      <img src='ticket/pos1.png'class='d-block w-100' alt='...'>
    </div>
    <div class='carousel-item'>
      <img src='ticket/pos2.png' class='d-block w-100' alt='...'>
    </div>
    <div class='carousel-item'>
      <img src='ticket/pos3.png' class='d-block w-100' alt='...'>
    </div>";

    }
    ?>
    
  </div>
   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<div class="container">
<!----------------------------------------- 1 crore php------------------------------------------------>
<?php
  $cd=date("Y-m-d"); $cth=date("hi"); $ct=date("Hi");
  $cd="'".$cd."'";
  $ct="'".$ct."'";

  $ctnew=date("YmdHi");

 // $sql="SELECT * FROM `events` where  status=0 and (((`event_start_date` <= `event_end_date` AND `event_end_date` >= `event_start_date`)and(`event_end_date`>={$cd})) AND (TIME_FORMAT(`event_end_time`, '%H%i')>{$ct}))";

  //$sql="SELECT * FROM `events` where  status=0 and (((`event_start_date` <= `event_end_date` AND `event_end_date` >= `event_start_date`)and(`event_end_date`>= {$cd})) AND (TIME_FORMAT(`event_end_time`, '%H%i')>{$ct}) AND ((TIME_FORMAT(`event_start_time`, '%H%i')<={$ct}) and (TIME_FORMAT(`event_end_time`, '%H%i')>={$ct})))";
 
 //$sql="SELECT * FROM `events` where  status=0 and ((`event_start_date` <= `event_end_date` AND `event_end_date` >= `event_start_date`)and(`event_end_date`>= {$cd}))";
  
  $sql="SELECT * FROM `events` where  status=0 and (((`event_start_date` <= `event_end_date` AND `event_end_date` >= `event_start_date`)and(`event_end_date`>= {$cd})) AND (TIME_FORMAT(`event_end_time`, '%H%i')>{$ct}) AND (TIME_FORMAT(`event_start_time`, '%H%i')>={$ct})) ";

   $sql="
    SELECT *,concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`event_start_time`, '%H%i'))as start,concat(DATE_FORMAT(event_end_date, '%Y%m%d'),TIME_FORMAT(`Event_end_time`, '%H%i'))as end  FROM `Events` Where (concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`Event_start_time`, '%H%i'))<='{$ctnew}' and concat(DATE_FORMAT(event_end_date, '%Y%m%d'),TIME_FORMAT(`Event_end_time`, '%H%i'))>='{$ctnew}')and status = 0
";
   // echo  $sql;
   // echo $ctnew;
   $result=$connection->query($sql);
   if(mysqli_num_rows($result)>0){
    $i=1;
    while($row=mysqli_fetch_assoc($result)){
      ?>
      <?php 
       $timestamp=$row['event_end_time'];
       $enddate=$row['event_end_date'];
       $date_today=$enddate.' '.$timestamp.":00";
       $event_id=$row['id'];
      
      ?>
  
    <script type="text/javascript">
       var countid<?php echo $i?> ="<?php echo $date_today;?>";
       var countdowndate<?php echo $i?> =new Date(countid<?php echo $i?>).getTime();
       var x<?php echo $i?> = setInterval(() => {
        var now<?php echo $i?> = new Date().getTime();
        var distance<?php echo $i?> = countdowndate<?php echo $i?> - now<?php echo $i?>;
        var days<?php echo $i?> =Math.floor(distance<?php echo $i?>/(1000*60*60*24));
        var hours<?php echo $i?>=Math.floor((distance<?php echo $i?>%(1000*60*60*24))/(1000*60*60));
        var minutes<?php echo $i?>=Math.floor((distance<?php echo $i?>%(1000*60*60))/(1000*60));
        var seconds<?php echo $i?>=Math.floor((distance<?php echo $i?>%(1000*60))/1000);
       
        document.getElementById("demo<?php echo $i?>").innerHTML= days<?php echo $i?>+" days "+hours<?php echo $i?>+" hours "+minutes<?php echo $i?>+" minutes "+seconds<?php echo $i?>+" seconds ";
        
        if(distance<?php echo $i?> < 0){
          clearInterval(x<?php echo $i?>);
          document.getElementById("demo<?php echo $i?>").innerHTML="Expired";
          document.getElementById("div<?php echo $i?>").style.display="none";
        }
        

       }, 1000);
    </script>
  
<h1 class="title"><?php echo $row["event_name"];?>&nbsp;just @<?php echo $row["price"];?>&nbsp;Rupees<br><sub>Event ends in&nbsp;<span style="color:goldenrod"  id="demo<?php echo $i?>"></span></sub></h1>
 
<div class="movies-list" id="div<?php echo $i?>" style="display: flex;">
    <div style="width: 20px;height: 100%;z-index: 3;">
      <button class="pre-btn"><img src="ticket/pre.png" alt=""></button>
    </div>
    <button class="nxt-btn"><img src="ticket/nxt.png" alt=""></button>
    <div class="card-container" >
     
<?php

    $sql1="SELECT * FROM `event_tickets` where quantity!=0 and event_id={$event_id}";
    $result1=$connection->query($sql1);
    if(mysqli_num_rows($result1)>0){
     $j=1;
     while($row1=mysqli_fetch_assoc($result1)){
       ?>
              <?php $colors = array("#ff0000", "#00ff00", "#0000ff");
              $count=count($colors);
              $Random= rand(0,$count); ?>
       <div class="card" id="card" style="  background-color:<?php echo $colors[$Random];?>;
                                            background-image: url(trail.jpg);
                                            background-blend-mode: screen;
                                            background-size: 500px 300px;"
                                            >
          <!-- <img src="ticket/10.png" alt="" class="card-img"> -->
             <div class="card-body2">
                <!-- <h2 class="name2">ticket no: <?php // echo $row1["event_ticket"];?></h2> -->
                   <img src="buynow.png" height="100px" width="100px" style="position: absolute;top:-15px;left: -20px;rotate: 345deg;z-index: 2;">
                  <div class='name3'><?php echo $row['event_name']; ?></div>
                
                <div class='name2'>ticket no:<?php echo $row1['event_ticket']?></div>
             
            </div>
            <div class="card-body">

                <h2 class="name">ticket no: <?php echo $row1["event_ticket"];?></h2>
                <h6 class="des">only <?php echo $row1["quantity"];?> ticket left!!</h6>
                <!-- <a href="addcart.php?id=<?php// echo $row1["id"]?>"   style="text-decoration:none;padding-top:10px;padding-bottom:10.5px;"  > -->
                  
                <button class="watchlist-btn" id="not_added<?php echo $row1["id"]?>"  onclick="cart('<?php echo $row1["id"]?>')" >add to cart
                </button>
            
            
                <button class="watchlist-btn " id="added<?php echo $row1["id"]?>">Added
                </button>
             
                <!-- <button class="watchlist-btn">add to cart</button> -->
            </div>
        </div>

      
          
          <?php
        }
      }else{
        echo "<h3 class='title'>All Tickets are sold out </h3>";
      }
        ?>
      
</div>
</div>


<script type="text/javascript">

  var count=<?php echo count($_SESSION['cart'])?>;
  function cart(id){
    var dataString = 'id='+ id; 
      $.ajax
({
type: "GET",
url: "addcart.php",
data: dataString,
cache: false,
success: function(data)
{
  count+=1;
  
  //alert(count);
  $("#not_added"+id).hide();
  $("#dynamiccount").text(count);
  
}
});
  }
</script>
<script>
  var ids=[];
</script>
 <?php 
        if(!empty($_SESSION["cart"])){
            $k=0;

            foreach($_SESSION["cart"] as $keys=>$values){
              //echo values["id"];
              echo "
              <script>
              ids.push({$values["id"]});
                </script>
              ";
            }
          }
               
            ?>
<script type="text/javascript">
  console.log(ids);
  //var arrayLength = ids.length;
  for(var m=0;m<ids.length;m++){
    console.log(ids[m]);
     $("#not_added"+ids[m]).hide();
  }
</script>

<?php $i++;?>
    
    <?php }
   }else{
      
       // $sqlempty="SELECT * FROM `events` where  status=0 and (((`event_start_date` <= `event_end_date` AND `event_end_date` >= `event_start_date`)and(`event_end_date`>= {$cd})) AND (TIME_FORMAT(`event_end_time`, '%H%i')>{$ct}) AND (TIME_FORMAT(`event_start_time`, '%H%i')>={$ct})) LIMIT 1";
       //   
      $sqlempty="SELECT * FROM `events` where  status=0 and (((`event_start_date` <= `event_end_date` AND `event_end_date` >= `event_start_date`)and(`event_end_date`>= {$cd})) AND (TIME_FORMAT(`event_end_time`, '%H%i')>{$ct}) AND (TIME_FORMAT(`event_start_time`, '%H%i')>={$ct})) LIMIT 1";
     
      $sqlempty="SELECT *,concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`event_start_time`, '%H%i'))as start,concat(DATE_FORMAT(event_end_date, '%Y%m%d'),TIME_FORMAT(`Event_end_time`, '%H%i'))as end  FROM `Events` Where concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`Event_start_time`, '%H%i'))>='{$ctnew}' and status = 0  order by event_start_date";


        //echo $sqlempty;
    $result=$connection->query($sqlempty);
        if(mysqli_num_rows($result)>0){
        $i=1;
       while($row=mysqli_fetch_assoc($result)){
         $i++;
          $timestamp=$row['event_start_time'];
          $startdate=$row['event_start_date'];
         $date_today=$startdate.' '.$timestamp.":00";
      
 echo" 
         
      <h1 class='title'>{$row['event_name']}&nbsp;just @{$row['price']}&nbsp;Rupees<br><sub>Event starts in&nbsp;<span style='color:goldenrod'  id='demoempty{$i}'></span></sub></h1>

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


} //while
     


     }else{  //if-else
        echo "<div class='main-wrapper'>
  <div class='signboard-wrapper'>
    <div class='signboard'>NO EVENTS</div>
    <div class='string'></div>
    <div class='pin pin1'></div>
    <div class='pin pin2'></div>
    <div class='pin pin3'></div>
  </div>
</div>";

     }

  
         

    
 }//start-elese block
?>
<script>

</script>
</div>












<style type="text/css">
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

  /*    margin: 20px 0;*/
	/* .carousel{		 
        opacity: 0.9;
		position: relative;
    width: 95%;
    height: 450px;

margin-left:2.5% ;
margin-right: 2.5%;
    border-radius:25px ;
    overflow-x: hidden;
    margin-top: 80px;
	}
	.carousel-inner{
		   display: flex;
    width: 100%;
    height: 100%;
    position: relative;
    margin: auto;
	}
	.carousel-item img{
    top: 0;
  left: 0;
     height: 500px;
    object-fit: fill;
    display: block;
  
  } */

  .carousel{
    margin:0;
padding: 0;
  }

  
 .title {
  margin-top: 20px;
  /* added margin-top */
    color: black;
    opacity: 0.9;
/*    padding-left: 4%;*/
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
    cursor: pointer;
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
   cursor: pointer;
 }

.name2 {
    
    font-size: 24px;
    font-weight: 500;
    text-transform: capitalize;
   
    margin-top: 2%;
/*    margin-left:15%;*/
    border:none;
/*    background-color:white;*/
    text-align:center;
    color:black;
    white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis;
font-family: 'Satisfy', cursive;
 border:3px dotted red;

 background-color: rgba(255, 255, 255, 0.08);
  box-shadow: 12px 12px 20px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(243, 243, 243, 0.7);
  border-radius: 8px;
  backdrop-filter: blur(3px);
 }
 .name3 {
   font-size: 34px;
    font-weight: 500;
  margin-top:14px;
 
  height:100px;
  white-space: normal;
  font-family: 'Satisfy', cursive;
  display: flex;
  justify-content: center;align-items: center;
    white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis;


 background-color: rgba(255, 255, 255, 0.08);
  box-shadow: 12px 12px 20px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(243, 243, 243, 0.7);
  border-radius: 8px;
  backdrop-filter: blur(3px);
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
    background: linear-gradient(to right, #eeeeff 0%, #eeeeff00);
 }

 .nxt-btn {
    right: 0;
    background: linear-gradient(to left, #eeeeff 0%, #eeeeff00);
 }

 .pre-btn img,
 .nxt-btn img {
    width: 15px;
    height: 20px;
  
    opacity: 0.5;
 }
 
/* .pre-btn:hover img,
 .nxt-btn:hover img {
    opacity: 1;
 }*/


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
   <style>
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



<script>
  // const startingMinutes=10;
  // let time = startingMinutes * 60;
  // const countdownEl=document.getElementById('countdown');
  // const countdownEl2=document.getElementById('countdown2');
  // const countdownEl3=document.getElementById('countdown3');
  // setInterval(updateCountdown,1000);
  // function updateCountdown(){
  //   const minutes= Math.floor(time / 60);
  //   let seconds=time%60;
  //   seconds =seconds < 10 ? '0' + seconds : seconds;
  //   countdownEl.innerHTML=`${minutes}:${seconds}`; //1crore
  //   countdownEl2.innerHTML=`${minutes}:${seconds}`; //20lakh
  //   countdownEl3.innerHTML=`${minutes}:${seconds}`; //crore
  //   time--;
  // }
</script>



<style type="text/css">
    /*maintence*/
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");
 .main-wrapper {
     font-size: 15vmin;
     background-color: transparent;
     width: 100%;
     height: 100vh;
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
<script>
       
        var myCarousel = document.querySelector('#myCarousel')
var carousel = new bootstrap.Carousel(myCarousel, {
  interval: 2000,
  wrap: false
})
    </script>
</body>
</html>

<?php
//DATE_COLUMN >= '2019-04-01 12:00:00' AND DATE_COLUMN < '2019-04-10 13:00:00'
//SELECT * ,((concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`Event_start_time`, '%H%i')) as start FROM `Events` Where Status=0 And ((concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`Event_start_time`, '%H%i')) <= concat(DATE_FORMAT(event_end_date, '%Y%m%d'),TIME_FORMAT(`Event_end_time`, '%H%i')) AND concat(DATE_FORMAT(event_end_date, '%Y%m%d'),TIME_FORMAT(`Event_end_time`, '%H%i')) >= concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`Event_start_time`, '%H%i')))And(concat(DATE_FORMAT(event_end_date, '%Y%m%d'),TIME_FORMAT(`Event_end_time`, '%H%i'))>= '202310051402'))
//SELECT *,concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`event_start_time`, '%H%i'))as start,concat(DATE_FORMAT(event_end_date, '%Y%m%d'),TIME_FORMAT(`Event_end_time`, '%H%i'))as end  FROM `Events` Where concat(DATE_FORMAT(event_start_date, '%Y%m%d'),TIME_FORMAT(`Event_start_time`, '%H%i'))<='202310051245' and concat(DATE_FORMAT(event_end_date, '%Y%m%d'),TIME_FORMAT(`Event_end_time`, '%H%i'))>='202310051345'
  
 
?>