<?php
session_start();
include "config/config.php";
if(!isset($_SESSION['name'])){
  
  //echo "<script>alert('login')</script>";
  echo "<script>window.location.href='ind.php'</script>";
}
// print_r($_SESSION["cart"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
       /* table,tr,td{
          

    color: black;
    opacity: 0.9;
    padding-left: 4%;
    text-transform: capitalize;
    font-size: 22px;
    font-weight: 500;
        }*/
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
    color: black;
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
<body >

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
          <a class="nav-link active-nav d-flex align-items-center" aria-current="page" href="purchased.php"><ion-icon name="bookmark"></ion-icon>&nbsp;Purchased</a>
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

<div  style="margin-top:120px;"></div>
	<div class="container">
    <h1 class="title">purchased History</h1>
  
    <?php
    $sql="select * from orders where userid={$_SESSION['id']} order by id desc";
    //echo $sql;
    $result1=$connection->query($sql);
   
    if(mysqli_num_rows($result1)>0){
          $ticketno=0;
         // echo $ticketno;
        $j=1;
          echo "<table class='table table-hover'>
        <th>s.no</th>
        <th>Event name</th>
        <th>ticket no</th>
        <th>qty</th>
         <th>Time</th>
         <th>Date</th>
         <th>Status</th>
         <th>result</th>";
        
        while($row1=mysqli_fetch_assoc($result1)){
          ?>
          <tr>
              <td><?php echo $j++;?></td>
            
           
                   <?php
                       $sql2="select event_name from events where id={$row1['event_id']}";
           
                        $res1=$connection->query($sql2);
                         if($res1->num_rows>0){
                            $row2=$res1->fetch_assoc();
                            echo "<td>";
                            echo "{$row2['event_name']}";
                            echo "</td>"; 
                         }
                    ?>
             
            <td><?php echo $row1["ticket"];  $ticketno=$row1["ticket"]; //echo $ticketno;?></td>
            <td><?php echo $row1["qty"];?></td>
      
           <?php  
           $datetime = new DateTime($row1["created"]);

$date = $datetime->format('Y-m-d');
$time = $datetime->format('H:i:s');
echo "<td>";
echo $time;
echo "</td>";

echo "<td>";
echo $date;
echo "</td>";

            ?>
             <?php

             $sql="select event_name from events where id={$row1['event_id']} and status=1";
             $res2=$connection->query($sql);
                         if($res2->num_rows>0){
                            $row2=$res2->fetch_assoc();
                             echo "<td>";
                            echo "<button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal{$row1['event_id']}' >Declared</button>";
                            echo "</td>"; 
                           // echo "hello->".$row1['ticket'];
                            //$ticketno=$row1['ticket'];



echo"
<div class='modal fade' id='exampleModal{$row1['event_id']}' tabindex='-1' aria-labelledby='exampleModalLabel{$row1['event_id']}' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>{$row2['event_name']}</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body' id='finalresult{$row1['event_id']}'>";
    

$sql3="select wl.ticket_id, wl.event_id ,ev.event_name, et.event_ticket from winnerlist wl INNER JOIN events ev on ev.id=wl.event_id INNER JOIN event_tickets et on et.id = wl.ticket_id where wl.event_id={$row1['event_id']}";
 $res3=$connection->query($sql3);
 $ticketnoexternal=0;
                         if($res3->num_rows>0){
                                   echo "<center>Winning Tickets Are</center>";
                            // $row3=$res3->fetch_assoc();
                              while($row3=mysqli_fetch_assoc($res3)){
                                    echo "<center>";
                                    echo $row3["event_ticket"];
                                    echo "</center>";


                            }   
                          }



         
         // echo $row1['ticket'];          
      //    echo "<p id='finalresult{$row1['event_id']}'></p>";      
   echo "
      
      </div>
      
    </div>
  </div>
</div>
";









                          }else{

                             echo "<td>";
                            echo "<button class='btn btn-danger'>Yet to Declare</button>";
                            echo "</td>"; 

                          }
             ?>



<?php 
 $sql5="select wl.ticket_id, wl.event_id ,ev.event_name, et.event_ticket ,o.userid ,r.name from winnerlist wl INNER JOIN events ev on ev.id=wl.event_id INNER JOIN event_tickets et on et.id = wl.ticket_id INNER JOIN orders o INNER JOIN register r on r.id=o.userid WHERE (wl.event_id=o.event_id and et.event_ticket=o.ticket)and (o.event_id={$row1['event_id']} and et.event_ticket=".$ticketno." and o.userid={$_SESSION['id']})";
       //echo $sql5; 
      // echo $row1['ticket'];
                 $res5=$connection->query($sql5);
                         if($res5->num_rows>0){
                             $row5=$res5->fetch_assoc();
                                    echo "<td><button class='btn btn-success'>Won</button></td>";


                               
                          }else{
                             $sql6="select event_name from events where id={$row1['event_id']} and status=1";
                              $res6=$connection->query($sql6);
                             if($res6->num_rows>0){
                            $row6=$res6->fetch_assoc();
                                 echo "<td><button class='btn btn-danger'>Lose</button></td>"; 
                            }else{
                                
                                 echo "<td><button class='btn btn-warning'>Waiting</button></td>";
                            }
                          }

?>

          <tr>
          <?php 
        

        }
    }else{
        echo "<table><center><h1 class='title'>your purchase is empty </h1></center></table>";
    }
    ?>

</body>
</html>