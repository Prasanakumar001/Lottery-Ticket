<?php
session_start();
include "../config/config.php";
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
	<title>winner</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
  <style type="text/css">
        body{
         font-family: 'Roboto',sans-serif;
         background: #0c111b;
         
        }
        table,tr,td{
          

    color: white;
    opacity: 0.9;
    padding-left: 4%;
    text-transform: capitalize;
    font-size: 22px;
    font-weight: 500;
        }
      .active-nav{
            border-bottom: 1px solid white;
          
          }
          ion-icon {
  color: white;
  font-size:20px
}
.navbar { 
/*   border:1px solid red;*/
     padding: 15px 0;
    }
    .navbar-brand{
        color: white;
    }
    .nav-item .nav-link{
        color: white;
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
 .title1 {
  
  /* added margin-top */
    color: black;
    opacity: 0.9;
    padding-left: 1%;
    text-transform: capitalize;
    font-size: 22px;
    font-weight: 500;
 }

            </style>
<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #0c111b;">
  <div class="container">
    <a class="navbar-brand" href="#">L&nbsp;u&nbsp;c&nbsp;k&nbsp;y&nbsp;W&nbsp;i&nbsp;n</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <!-- <span class="navbar-toggler-icon" style=""></span> -->
      <i class="fa-solid fa-bars" style="color: #fafafa;"></i>
    </button>

    <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
     
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link   d-flex align-items-center"  href="index.php"><ion-icon name="home"></ion-icon>&nbsp;Home</a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" aria-current="page" href="adminresult.php"><ion-icon name="bookmark"></ion-icon>&nbsp;Result Annocement</a>
        </li>

          <li class="nav-item ">
          <a class="nav-link  active-nav d-flex align-items-center" href="winner.php"><ion-icon name="trophy"></ion-icon>&nbsp;Event Winners</a>
        </li> 

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  d-flex align-items-center" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <ion-icon name="person-circle"></ion-icon>&nbsp;
          <?php echo $_SESSION["name"];?>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li> <a class="dropdown-item" href="login/logout.php">Logout</a></li>
            <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </li>
       
        
      </ul>
        
      
     
    </div>
  </div>
</nav>
<!-- <div class="container" style="margin-top:80px ;">

     <div class="table-responsive" style="width:100%"> -->
<?php

// $sql = "select wl.ticket_id, wl.event_id ,ev.event_name, et.event_ticket ,o.userid ,r.name,r.phonenumber from winnerlist wl INNER JOIN events ev on ev.id=wl.event_id INNER JOIN event_tickets et on et.id = wl.ticket_id INNER JOIN orders o INNER JOIN register r on r.id=o.userid WHERE wl.event_id=o.event_id and et.event_ticket=o.ticket ";
// $resultset = mysqli_query($connection, $sql) or die("database error:". mysqli_error($connection));
// if(mysqli_num_rows($resultset)>0){
// $i=1;
// echo "<table class='table'><th>s/n</th><th>name of the event</th><th>ticket no</th><th>name of the participant</th><th>phone number</th>";
// while( $rows = mysqli_fetch_assoc($resultset) ) { 
?>
<!-- <tr>
<td><?php// echo $i++;?></td>
<td><?php //echo $rows["event_name"]; ?></td>
<td><?php// echo $rows["event_ticket"]; ?></td>
<td><?php// echo $rows["name"]; ?></td>
<td><?php// echo $rows["phonenumber"]; ?></td>

</tr> -->
<?php //} 
//}?>
<!-- </table>

</div>

</div> -->




<div class="container" style="margin-top:80px ;">

     <div class="table-responsive" style="width:100%">


<?php
$sql1="select * from events where status=1";
    //echo $sql;
    $result1=$connection->query($sql1);
   
    if(mysqli_num_rows($result1)>0){
      $i=1;
      echo"
          <table class='table '>
  <th>s.no</th>
  <th>event name</th>
  <th>price</th>
   <th>start date</th>
   <th>start time</th>
    <th>end date</th>
    <th>end time</th>
     <th>Result</th>
      ";
       while($row1=mysqli_fetch_assoc($result1)){

?>
           <tr>
           <td><?php echo $i++;?></td>
           <td><?php echo $row1["event_name"];?></td>
            <td><?php echo $row1["price"];?></td>
            <td><?php echo $row1["event_start_date"];?></td>
             <td><?php echo $row1["event_start_time"];?></td>
              <td><?php echo $row1["event_end_date"];?></td>
               <td><?php echo $row1["event_end_time"];?></td>
                <td>
                  <!-- Button trigger modal -->

<button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row1["id"];?>">
 show
</button>


                </td>
         </tr>

         <!-- Modal -->
    
    <div class="modal fade" id="exampleModal<?php echo $row1["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $row1["id"];?>" aria-hidden="true">
 
  <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><?php echo $row1["event_name"];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div style="display:block;">
          <p class="title1">Winner of these tickets</p>
        <?php
            $sql2="select wl.ticket_id, wl.event_id ,ev.event_name, et.event_ticket from winnerlist wl INNER JOIN events ev on ev.id=wl.event_id INNER JOIN event_tickets et on et.id = wl.ticket_id where wl.event_id={$row1['id']}";
            $res2=$connection->query($sql2);
                         if($res2->num_rows>0){

                            // $row3=$res3->fetch_assoc();
                              while($row2=mysqli_fetch_assoc($res2)){
                                    // echo "<button class='btn btn-success btn-sm m-2'>";
                                    // echo $row2["event_ticket"];
                                    // echo "</button>";
                                    echo "<details>";
                                    echo "<summary>Ticket No: {$row2["event_ticket"]}</summary>";
  

                                    $sql3="SELECT * FROM orders o INNER join register r on r.id=o.userid WHERE ticket={$row2['event_ticket']} and event_id={$row1['id']}";

                                      $res3=$connection->query($sql3);
                          if($res3->num_rows>0){
                            echo "<ol>";
               while($row3=mysqli_fetch_assoc($res3))
              {

                echo "<li><h6>Name : {$row3['name']}</h6><p>Ph.no :{$row3['phonenumber']}</p></li>";
              }
              echo "</ol>";
            }else{
              echo "<p>no one bought this ticket</p>";
            }
               echo "</details>";





                            }   
                          }
        ?>
        
        

     






       </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>



<?php 
}
}else{
   echo "<table><center><h1 class='title'>Result is empty </h1></center></table>";
}
?>
</table>

<style type="text/css">
  .title {
  
  /* added margin-top */
    color: #fff;
    opacity: 0.9;
    padding-left: 1%;
    text-transform: capitalize;
    font-size: 22px;
    font-weight: 500;
 }

details > summary {
  padding: 4px;
  width: 200px;
  background-color: lightgreen;
  border: none;
  box-shadow: 1px 1px 2px #bbbbbb;
  cursor: pointer;
  margin-bottom: 3px;
}
</style>


</div>
</div>

</body>
</html>