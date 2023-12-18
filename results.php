<?php 
include "config/config.php";
session_start();
if(!isset($_SESSION['name'])){
  echo "<script>alert('login')</script>";
  echo "<script>window.location.href='ind.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
   <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
   <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
    *{
      margin: 0;
    padding: 0;
      }
    	body{
    	 font-family: 'Roboto',sans-serif;
	     background-color: #eeeeff;
       text-transform: capitalize;
    	}
         .active-nav{
            border-bottom: 3px solid black;
          
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
           .navbarlogo {
 /* width: 100%;
  height: 500px;
  object-fit: cover*/;
/*  aspect-ratio: 16:9;*/
  object-fit: cover;
}
.navbar-brand:hover{
    color:white;
}
   ion-icon {
  color: goldenrod;
  font-size:20px
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

          
        </style>
       
</head>
<body>
    
	 
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #eeeeff;">
  <div class="container"
  style="  background-color: rgba(255, 255, 255, 0.08);
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
          <a class="nav-link  d-flex align-items-center"  href="index.php"><ion-icon name="home"></ion-icon>&nbsp;Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" href="cart.php"><ion-icon name="cart"></ion-icon>&nbsp;Cart&nbsp;<sup>
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
          <a class="nav-link  active-nav d-flex align-items-center" aria-current="page" href="results.php"><ion-icon name="trophy"></ion-icon>&nbsp;Result</a>
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
     


<div style="margin-top:120px;">
    <center>
      <h1 class="title">Winners Of the day</h1>
    </center>
    </div>

    
   

  <?php
    $sql1="select event_name,id,event_start_date,event_end_date from events where status=1 ORDER by updated desc";
           
    $res1=$connection->query($sql1);
    if($res1->num_rows>0){
                            
       while($row1=mysqli_fetch_assoc($res1))
       {
          ?>
          <h1 class="title">winners of <?php echo "{$row1["event_name"]}";?></h1>
          <p class="titleparagraph"><span style="color:goldenrod;">Start&nbsp;Date:&nbsp;</span><span><?php echo "{$row1["event_start_date"]}";?></span><span style="color:goldenrod;">&nbsp;End&nbsp;Date:&nbsp;</span><span><?php echo "{$row1["event_start_date"]}";?></span></p>
          

          <?php 
              $sql2="select wl.ticket_id, wl.event_id ,ev.event_name, et.event_ticket from winnerlist wl INNER JOIN events ev on ev.id=wl.event_id INNER JOIN event_tickets et on et.id = wl.ticket_id where wl.event_id={$row1['id']}";
              if($res1->num_rows>0){
                echo "
                  <div class='movies-list' style='display:flex'>
    
     <div style='width: 20px;height: 100%;z-index: 3;'>
      <button class='pre-btn'><img src='ticket/pre.png' alt=''></button>
    </div>
    <button class='nxt-btn'><img src='ticket/nxt.png' alt=''></button>
    <div class='card-container'>
                ";
                $ticket_no="";
                $res2=$connection->query($sql2);
               while($row2=mysqli_fetch_assoc($res2))
              {
                echo '
                   <div class="card" style="background-color:goldenrod;
                                            background-image: url(trail.jpg);
                                            background-blend-mode: screen;
                                            background-size: 500px 300px;
                   ">';
          echo "
            <div class='card-body2' >
                <div class='name3'>{$row2['event_name']}</div>
                
                <div class='name2'>ticket no:{$row2['event_ticket']}</div>
          
             
            </div>
            <div class='card-body'>
                  
              <button class='watchlist-btn'  data-bs-toggle='modal' data-bs-target='#exampleModal{$row1['id']}{$row2['event_ticket']}'>view</button>
            </div>
        </div>";



                echo"
                <div class='modal fade' id='exampleModal{$row1['id']}{$row2['event_ticket']}' tabindex='-1' aria-labelledby='exampleModalLabel{$row1['id']}{$row2['event_ticket']}' aria-hidden='true'>
 
  <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title'>{$row1['event_name']}</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>";
            
                  $sql3="SELECT * FROM orders o INNER join register r on r.id=o.userid WHERE ticket={$row2['event_ticket']} and event_id={$row1['id']}";
              //    echo $sql3;
                          $res3=$connection->query($sql3);
                          if($res3->num_rows>0){
               while($row3=mysqli_fetch_assoc($res3))
              {
                echo "<p>{$row3['name']}</p>";
              }
            }else{
              echo "no one bought this ticket";
            }
                
     echo " </div>
    
    </div>
  </div>
</div>
";



              
                


              }

              echo "
               </div>
               </div>


              ";
           
    
            }

          ?>
                         
          <?php
        }
      }
                            
?>

</div></div>










<style>
  .flex-container {
    display: flex;
    flex-wrap: wrap;
    /*background-color: white; */
    flex-direction:row ;
    justify-content: center;
    padding: 0;
    margin: 0;
  }
  
 
  </style>















    

    <style>
    .collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
 
}

.collapsible_active, .collapsible:hover {
  background-color: #555;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.collapsible_active:after {
  content: "\2212";
}

.content {
  padding: 0 18px;
  max-height: 0;
  margin-bottom: 10px;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
      </style>
      <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;
        
        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("collapsible_active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
              content.style.maxHeight = null;
            } else {
              content.style.maxHeight = content.scrollHeight + "px";
            } 
          });
        }
        </script>
  
    <script>
     // var divs = ["Div1", "Div2", "Div3", "Div4"];
      var divs = ["Div1", "Div2", "Div3"];
    var visibleDivId = null;
    function divVisibility(divId) {
      if(visibleDivId === divId) {
        visibleDivId = null;
      } else {
        visibleDivId = divId;
      }
      hideNonVisibleDivs();
    }
    function hideNonVisibleDivs() {
      var i, divId, div;
      for(i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        if(visibleDivId === divId) {
          div.style.display = "block";
        } else {
          div.style.display = "none";
        }
      }
    }
    </script>
    <style>
       .title {
  /* margin-top: 20px; */
  /* added margin-top */
    color: black;
    opacity: 0.9;
    padding-left: 4%;
    text-transform: capitalize;
    font-size: 22px;
    font-weight: 500;
 }
 .titleparagraph{
   color: black;
    opacity: 0.9;
    padding-left: 4%;
    text-transform: capitalize;
    font-size: 16px;
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
     /* min-width: 150px;
    width: 150px;
    height: 200px;  */
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

 .name {
    color: #fff;
    font-size: 15px;
    font-weight: 500;
    text-transform: capitalize;
    margin-top: 23%;
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
    margin-top: 35%;
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
 
 .pre-btn:hover img,
 .nxt-btn:hover img {
    opacity: 1;
 }



 .res_card {
    position: relative;
     min-width: 350px;
    width: 350px;
    height: 190px; 
    border-radius: 5px;
    overflow: hidden;
    margin-left: 20px;
    margin-bottom: 10px;
    transition: .5s;
    background: #000;
 }
 .res_card:hover {
    transform: scale(0.9);
 }

 .res_img {
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

</body>
</html>