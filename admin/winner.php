<?php
session_start();
include "../config/config.php";
if(!isset($_SESSION['name'])){
  //header("location : ./login/login.php");
  //echo "<h1>wrong</h1>";
  echo "<script>alert('login')</script>";
  //echo "<script>window.location.href='./../ind.php'</script>";
  echo "<script>window.location.href='login/login.php'</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>winner</title>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">



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
          text-transform: capitalize;
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
   <?php
        $sqllogo="select * from logo where status=1";
        $resultlogo=$connection->query($sqllogo);
       if(mysqli_num_rows($resultlogo)>0){
       $i=1;
       if($row=mysqli_fetch_assoc($resultlogo)){
        ?>
        <a class="navbar-brand" href="index.php" style="display: flex;justify-content: flex-start;align-items: center;">

    <img src="logo/uploads/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>"  width="52" height="38"  class="navbarlogo">
    &nbsp;
     <span  style="letter-spacing: 5px;text-transform: uppercase;font-size: 24px;" class="fw-bold"><?php echo $row['title'] ?></span>
    </a>
        <?php 
    }}else{
        echo "
               <a class='navbar-brand' href='#' style='display: flex;justify-content: center;align-items: center;'>

    <img src='logo/uploads/1696430114.png' alt='3024' width='52' height='38' class='navbarlogo'>
    &nbsp;
     <span style='letter-spacing: 5px;text-transform: uppercase;font-size: 24px;' class='fw-bold'>LuckyWin</span>
    </a>
        ";
    }
    ?>
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
          
        <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" href="logo/index.php"><ion-icon name="settings-sharp"></ion-icon>&nbsp;Settings

          </a>
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


<form method='post' action='excel.php'>";

<div class="container" style="margin-top:80px ;">

  <center>    
<input type="text" name="filename" placeholder="Filename" required>
<button name="export"  type="submit" class="btn btn-success">Export</button>
</center>
     <div class="table-responsive" style="width:100%">


<?php
$sql1="select * from events where status=1 order by id desc";
    //echo $sql;
    $result1=$connection->query($sql1);
   
    if(mysqli_num_rows($result1)>0){
      $i=1;
      echo"
          <table id='myTable' class='display'>
          <thead>
          <tr>
  <th></th>
  <th>s.no</th>
  <th>event name</th>
  <th>price</th>
   <th>start date</th>
   <th>start time</th>
    <th>end date</th>
    <th>end time</th>
     <th>Result</th>
     </tr>
     </thead>
       <tbody>

      ";
     
       while($row1=mysqli_fetch_assoc($result1)){

?>
 
    <tr>
           <td><input type="checkbox" name="excel[]" value=<?php echo $row1["id"];?> ></td>
           <td><?php echo $i++;?></td>
           <td><?php echo $row1["event_name"];?></td>
            <td><?php echo $row1["price"];?></td>
            <td><?php echo $row1["event_start_date"];?></td>
             <td><?php echo $row1["event_start_time"];?></td>
              <td><?php echo $row1["event_end_date"];?></td>
               <td><?php echo $row1["event_end_time"];?></td>
                <td>
                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row1["id"];?>">
  show
</button>
                </td>

</tr>

   


<?php 
}


}else{
   echo "<table><center><h1 class='title'>Result is empty </h1></center></table>";
}
?>
</tbody>

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




<?php
$sql12="select * from events where status=1";
    //echo $sql;
    $result21=$connection->query($sql12);
   
    if(mysqli_num_rows($result21)>0){
      $i=1;
     
       while($row21=mysqli_fetch_assoc($result21)){

?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop<?php echo $row21["id"];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><?php echo $row21["event_name"];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div style="display:block;">
          <p class="title1">Winner of these tickets</p>
        <?php
            $sql42="select wl.ticket_id, wl.event_id ,ev.event_name, et.event_ticket from winnerlist wl INNER JOIN events ev on ev.id=wl.event_id INNER JOIN event_tickets et on et.id = wl.ticket_id where wl.event_id={$row21['id']}";
            $res24=$connection->query($sql42);
                         if($res24->num_rows>0){

                            // $row3=$res3->fetch_assoc();
                              while($row5=mysqli_fetch_assoc($res24)){
                                    // echo "<button class='btn btn-success btn-sm m-2'>";
                                    // echo $row2["event_ticket"];
                                    // echo "</button>";
                                    echo "<details>";
                                    echo "<summary>Ticket No: {$row5["event_ticket"]}</summary>";
  

                                    $sql35="SELECT * FROM orders o INNER join register r on r.id=o.userid WHERE ticket={$row5['event_ticket']} and event_id={$row21['id']}";

                                      $res36=$connection->query($sql35);
                          if($res36->num_rows>0){
                            echo "<ol>";
               while($row37=mysqli_fetch_assoc($res36))
              {

                echo "<li><h6>Name : {$row37['name']}</h6><p>Ph.no :{$row37['phonenumber']}</p></li>";
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
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>

<?php }}?>


</form>

<style type="text/css">
  .dataTables_filter input {
  color: white;
}
  .dataTables_filter label {
  color: white;
}

div.dataTables_length select {
  color: white !important;
  background-color: black !important; 
}
.dataTables_length label{
  color: white;
}
</style>

<script type="text/javascript">
  let table = new DataTable('#myTable', {
    responsive: true,
      rowReorder: {
        selector: ' td:nth-child(3)'
    }
});
</script>

</body>
</html>