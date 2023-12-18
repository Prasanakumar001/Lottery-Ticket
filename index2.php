<?php 
date_default_timezone_set('Asia/kolkata');
include "config/config.php";
session_start();
if(!isset($_SESSION['name'])){
  //header("location : ./login/login.php");
  //echo "<h1>wrong</h1>";
  echo "<script>alert('login')</script>";
  echo "<script>window.location.href='login/login.php'</script>";
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
    <style type="text/css">
    	body{
    	 font-family: 'Roboto',sans-serif;
	     background: #0c111b;
    	}
      .active-nav{
            border-bottom: 1px solid white;
          
          }
    	    </style>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #0c111b;">
  <div class="container">
    <a class="navbar-brand" href="#">L&nbsp;u&nbsp;c&nbsp;k&nbsp;y&nbsp;W&nbsp;i&nbsp;n</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <!-- <span class="navbar-toggler-icon" style=""></span> -->
      <i class="fa-solid fa-bars" style="color: #fafafa;"></i>
    </button>
    <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active-nav" aria-current="page" href="index.php"><i class="fa-solid fa-house" style="color: #ffffff;"></i>&nbsp;Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="results.php">Result</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">Annoucement</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#"><?php echo $_SESSION["name"];?></a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item " href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
	<!--------------carousel------------------->
  <center style="margin-top: 80px;color: white;letter-spacing: 3px;
  /* font-family: 'Archivo Black', sans-serif; */
  font-family: 'Black Ops One', cursive;
  "><h1 class="title">Events of the day</h1></center>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="ticket/pos1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="ticket/pos2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="ticket/pos3.png" class="d-block w-100" alt="...">
    </div>
  </div>
</div> 
<!-- <center>

</center> -->

<!-- <div class="poster-list">


  <div class="poster-container">
    
    <div class="single-poster">
      <img src="ticket/pos1.png" alt="" class="poster-img">
    </div>
    <div class="single-poster">
      <img src="ticket/pos2.png" alt="" class="poster-img">
    </div>
    <div class="single-poster">
      <img src="ticket/pos3.png" alt="" class="poster-img">
    </div>
  </div>
</div> -->
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

<!----------------------------------------- 1 crore------------------------------------------------>

<h1 class="title">1 crore jackpot just @100 Rupees<br><sub>countdown ends in&nbsp;<span style="color:goldenrod" id="countdown3"></span></sub></h1>
<div class="movies-list">
    <button class="pre-btn"><img src="ticket/pre.png" alt=""></button>
    <button class="nxt-btn"><img src="ticket/nxt.png" alt=""></button>
    <div class="card-container">
    <div class="card">
          <img src="ticket/10.png" alt="" class="card-img">
             <div class="card-body2">
                <h2 class="name2">ticket no: 1</h2>
          
             
            </div>
            <div class="card-body">
                <h2 class="name">heading...</h2>
                <h6 class="des">only 2 ticket left!!</h6>
                <button class="watchlist-btn">add to cart</button>
            </div>
        </div>
        <div class="card">
          <img src="ticket/10.png" alt="" class="card-img">
          <div class="card-body">
            <h2 class="name">heading...</h2>
            <h6 class="des">only 2 ticket left!!</h6>
              <button class="watchlist-btn">add to cart</button>
          </div>
      </div>
      <div class="card">
        <img src="ticket/11.png" alt="" class="card-img">
        <div class="card-body">
          <h2 class="name">heading...</h2>
          <h6 class="des">only 2 ticket left!!</h6>
            <button class="watchlist-btn">add to cart</button>
        </div>
    </div>
    <div class="card">
      <img src="ticket/12.png" alt="" class="card-img">
      <div class="card-body">
        <h2 class="name">heading...</h2>
        <h6 class="des">only 2 ticket left!!</h6>
          <button class="watchlist-btn">add to cart</button>
      </div>
  </div>
  <div class="card">
    <img src="ticket/9.png" alt="" class="card-img">
    <div class="card-body">
      <h2 class="name">heading...</h2>
                <h6 class="des">only 2 ticket left!!</h6>
        <button class="watchlist-btn">add to cart</button>
    </div>
</div>
<div class="card">
  <img src="ticket/10.png" alt="" class="card-img">
  <div class="card-body">
    <h2 class="name">heading...</h2>
    <h6 class="des">only 2 ticket left!!</h6> 
      <button class="watchlist-btn">add to cart</button>
  </div>
</div>
<div class="card">
  <img src="ticket/11.png" alt="" class="card-img">
  <div class="card-body">
    <h2 class="name">heading...</h2>
    <h6 class="des">only 2 ticket left!!</h6>
      <button class="watchlist-btn">add to cart</button>
  </div>
</div>
        
      </div>
</div>




<!---------------------------40lakh --------------------------------------------->

<h1 class="title">40 Lakh dhamaka just @40 Rupees<br><sub>countdown ends in&nbsp;<span style="color:goldenrod" id="countdown"></span></sub></h1>
<div class="movies-list">
    <button class="pre-btn"><img src="ticket/pre.png" alt=""></button>
    <button class="nxt-btn"><img src="ticket/nxt.png" alt=""></button>
    <div class="card-container">

        <div class="card">
            <img src="ticket/1.png" alt="" class="card-img">
            <div class="card-body">
                <h2 class="name">heading...</h2>
                <h6 class="des">only 2 ticket left!!</h6>
                <button class="watchlist-btn">add to cart</button>
            </div>
        </div>
        <div class="card">
          <img src="ticket/2.png" alt="" class="card-img">
          <div class="card-body">
            <h2 class="name">heading...</h2>
            <h6 class="des">only 2 ticket left!!</h6>
              <button class="watchlist-btn">add to cart</button>
          </div>
      </div>
      <div class="card">
        <img src="ticket/3.png" alt="" class="card-img">
        <div class="card-body">
          <h2 class="name">heading...</h2>
          <h6 class="des">only 2 ticket left!!</h6>
            <button class="watchlist-btn">add to cart</button>
        </div>
    </div>
    <div class="card">
      <img src="ticket/4.png" alt="" class="card-img">
      <div class="card-body">
        <h2 class="name">heading...</h2>
        <h6 class="des">only 2 ticket left!!</h6>
          <button class="watchlist-btn">add to cart</button>
      </div>
  </div>
  <div class="card">
    <img src="ticket/1.png" alt="" class="card-img">
    <div class="card-body">
      <h2 class="name">heading...</h2>
                <h6 class="des">only 2 ticket left!!</h6>
        <button class="watchlist-btn">add to cart</button>
    </div>
</div>
<div class="card">
  <img src="ticket/2.png" alt="" class="card-img">
  <div class="card-body">
    <h2 class="name">heading...</h2>
    <h6 class="des">only 2 ticket left!!</h6> 
      <button class="watchlist-btn">add to cart</button>
  </div>
</div>
<div class="card">
  <img src="ticket/3.png" alt="" class="card-img">
  <div class="card-body">
    <h2 class="name">heading...</h2>
    <h6 class="des">only 2 ticket left!!</h6>
      <button class="watchlist-btn">add to cart</button>
  </div>
</div>
        
      </div>
</div>
<!-----------------------------------------20lakh------------------------------------------------>

<h1 class="title">20 Lakh dhamaka just @20 Rupees<br><sub>countdown ends in&nbsp;<span style="color:goldenrod" id="countdown2"></span></sub></h1>
<div class="movies-list">
    <button class="pre-btn"><img src="ticket/pre.png" alt=""></button>
    <button class="nxt-btn"><img src="ticket/nxt.png" alt=""></button>
    <div class="card-container">

        <div class="card">
            <img src="ticket/7.png" alt="" class="card-img">
            <div class="card-body">
                <h2 class="name">heading...</h2>
                <h6 class="des">only 2 ticket left!!</h6>
                <button class="watchlist-btn">add to cart</button>
            </div>
        </div>
        <div class="card">
          <img src="ticket/6.png" alt="" class="card-img">
          <div class="card-body">
            <h2 class="name">heading...</h2>
            <h6 class="des">only 2 ticket left!!</h6>
              <button class="watchlist-btn">add to cart</button>
          </div>
      </div>
      <div class="card">
        <img src="ticket/5.png" alt="" class="card-img">
        <div class="card-body">
          <h2 class="name">heading...</h2>
          <h6 class="des">only 2 ticket left!!</h6>
            <button class="watchlist-btn">add to cart</button>
        </div>
    </div>
    <div class="card">
      <img src="ticket/8.png" alt="" class="card-img">
      <div class="card-body">
        <h2 class="name">heading...</h2>
        <h6 class="des">only 2 ticket left!!</h6>
          <button class="watchlist-btn">add to cart</button>
      </div>
  </div>
  <div class="card">
    <img src="ticket/6.png" alt="" class="card-img">
    <div class="card-body">
      <h2 class="name">heading...</h2>
                <h6 class="des">only 2 ticket left!!</h6>
        <button class="watchlist-btn">add to cart</button>
    </div>
</div>
<div class="card">
  <img src="ticket/5.png" alt="" class="card-img">
  <div class="card-body">
    <h2 class="name">heading...</h2>
    <h6 class="des">only 2 ticket left!!</h6> 
      <button class="watchlist-btn">add to cart</button>
  </div>
</div>
<div class="card">
  <img src="ticket/7.png" alt="" class="card-img">
  <div class="card-body">
    <h2 class="name">heading...</h2>
    <h6 class="des">only 2 ticket left!!</h6>
      <button class="watchlist-btn">add to cart</button>
  </div>
</div>
        
      </div>
</div>


<!----------------------------------------- 1 crore php------------------------------------------------>
<?php
   $sql="SELECT * FROM `events` order by `event_start_date`";
   $result=$connection->query($sql);
   if(mysqli_num_rows($result)>0){
    $i=1;
    while($row=mysqli_fetch_assoc($result)){
      ?>
      <?php 
       $timestamp=$row['event_end_time'];
       $enddate=$row['event_end_date'];
       $date_today=$enddate.' '.$timestamp;
       $event_id=$row['id'];
      //  $currenttime=date('H:i');
      //  $difference = date('H:i',strtotime($timestamp)-strtotime($currenttime));
      //  echo $currenttime;
      //  echo "--";
      //  echo $timestamp;
      //  echo "--";
      //  echo $difference;
       
      ?>
  
    <script type="text/javascript">
       var countid ="<?php echo $date_today;?>";
       var countdowndate =new Date(countid).getTime();
       var x = setInterval(() => {
        var now= new Date().getTime();
        var distance = countdowndate - now;
        var days=Math.floor(distance/(1000*60*60*24));
        var hours=Math.floor((distance%(1000*60*60*24))/(1000*60*60));
        var minutes=Math.floor((distance%(1000*60*60))/(1000*60));
        var seconds=Math.floor((distance%(1000*60))/1000);
        document.getElementById("demo<?php echo $i?>").innerHTML= days+" days "+hours+" hours "+minutes+" minutes "+seconds+" seconds ";
        if(distance<0){
          clearInterval(x);
          document.getElementById("demo<?php echo $i?>").innerHTML="Expired";
        }
        

       }, 1000);
    </script>
  
<h1 class="title"><?php echo $row["event_name"];?>&nbsp;just @<?php echo $row["price"];?>&nbsp;Rupees<br><sub>Event ends in&nbsp;<span style="color:goldenrod"  id="demo<?php echo $i?>"></span></sub></h1>

<div class="movies-list">
    <button class="pre-btn"><img src="ticket/pre.png" alt=""></button>
    <button class="nxt-btn"><img src="ticket/nxt.png" alt=""></button>
    <div class="card-container">
<?php

    $sql1="SELECT * FROM `event_tickets` where quantity!=0 and event_id={$event_id}";
    $result1=$connection->query($sql1);
    if(mysqli_num_rows($result1)>0){
     $j=1;
     while($row1=mysqli_fetch_assoc($result1)){
       ?>
       <div class="card">
          <img src="ticket/10.png" alt="" class="card-img">
             <div class="card-body2">
                <h2 class="name2">ticket no: <?php echo $row1["event_ticket"];?></h2>
          
             
            </div>
            <div class="card-body">
                <h2 class="name">ticket no: <?php echo $row1["event_ticket"];?></h2>
                <h6 class="des">only <?php echo $row1["quantity"];?> ticket left!!</h6>
                <a href="addcart.php?id=<?php echo $row1["id"]?>" class="watchlist-btn">add to cart</a>
                <!-- <button class="watchlist-btn">add to cart</button> -->
            </div>
        </div>

      
          
          <?php
        }
      }
        ?>
</div>
</div>





<?php $i++;?>
    <?php }
   }
?>
<script>

</script>













<style type="text/css">
	.navbar { 
/*	 border:1px solid red;*/
	 padding: 15px 0;
	}
	.navbar-brand{
		color: white;
	}
	.nav-item .nav-link{
		color: white;
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
  const startingMinutes=10;
  let time = startingMinutes * 60;
  const countdownEl=document.getElementById('countdown');
  const countdownEl2=document.getElementById('countdown2');
  const countdownEl3=document.getElementById('countdown3');
  setInterval(updateCountdown,1000);
  function updateCountdown(){
    const minutes= Math.floor(time / 60);
    let seconds=time%60;
    seconds =seconds < 10 ? '0' + seconds : seconds;
    countdownEl.innerHTML=`${minutes}:${seconds}`; //1crore
    countdownEl2.innerHTML=`${minutes}:${seconds}`; //20lakh
    countdownEl3.innerHTML=`${minutes}:${seconds}`; //crore
    time--;
  }
</script>
</body>
</html>

