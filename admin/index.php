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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

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

            </style>
<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #0c111b;">
  <div class="container">
     <?php
        $sqllogo="select * from logo where status=1 ";
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
          <a class="nav-link active-nav  d-flex align-items-center"  href="index.php"><ion-icon name="home"></ion-icon>&nbsp;Home</a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" aria-current="page" href="adminresult.php"><ion-icon name="bookmark"></ion-icon>&nbsp;Result Annocement</a>
        </li>

          <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" href="winner.php"><ion-icon name="trophy"></ion-icon>&nbsp;Event Winners</a>
        </li> 
        
        <li class="nav-item ">
          <a class="nav-link   d-flex align-items-center" href="logo/index.php"><ion-icon name="settings-sharp"></ion-icon>&nbsp;Settings

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

<style type="text/css">
   
</style>
<div class="container" style="margin-top:80px ;width: 100%;height: 60px;">
  <div  style="float: right;">
    <!-- Button trigger modal -->
    
<button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add Event
</button>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="api/add_event.php" class="form-control">
        <!--eventname event_ticket_start and event_ticketend startdate and time ened date and time quantiy -->
    
    <label>Event name:</label>
    <input type="text" name="event_name" class="form-control" required/><br>
    <label>Ticket serial start</label>
    <input type="number" min=0 name="ticket_serial_start" class="form-control" required/><br>
    <label>Ticket serial end</label>
    <input type="number" min=0 name="ticket_serial_end" class="form-control" required/><br>
    <label>Event start Date</label>
    <input type="date" name="event_start_date" class="form-control" min="<?= date('Y-m-d'); ?>" required/><br>
    <label>Event start Time</label>
    <input type="time" name="event_start_time" class="form-control" required/><br>
    <label>Event End Date</label>
    <input type="date" name="event_end_date" class="form-control" min="<?= date('Y-m-d'); ?>" required/><br>
    <label>Event end Time</label>
    <input type="time" name="event_end_time" class="form-control" required/><br>
    <label>Quantity of Each Ticket</label>
    <input type="number"  min=1 name="quantity" class="form-control" value=1   required/><br>
    <label>price</label>
    <input type="number"  min=1 name="price" class="form-control" value=1   required/><br>
    <label>Catergory</label>
    <select name="event_cat" class="form-control">
      <option value="OneDay">One Day</option>
      <option value="Days">Days</option>
      <option value="Monthly">Monthly</option>
      <option value="Week">Weekly</option>
    </select>

      </div>
      <div class="modal-footer">
      <!--   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button> -->
        <input type="submit" name="add_event" class="form-control btn btn-warning"  value="Add Event">
   
  
    
    </form>
      </div>
    </div>
  </div>
</div>



</div>
</div>




<div class="container" style="margin-top:5px">
<!-- <div class="table-responsive" style="width:100%"> -->
<?php

$sql = "SELECT * FROM `events` order by id desc ";
$resultset = mysqli_query($connection, $sql) or die("database error:". mysqli_error($connection));
if(mysqli_num_rows($resultset)>0){
$i=1;
echo " <table id='myTable' class='display ' >
          <thead>
          <tr><th>s/n</th><th>Catergory</th><th>name of the event</th><th>start date</th><th>start time</th><th>end date</th><th>end time</th><th>price </th><th>status</th></tr></thead><tbody>";
while( $rows = mysqli_fetch_assoc($resultset) ) { 
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $rows["event_cat"]; ?></td>
<td><?php echo $rows["event_name"]; ?></td>
<td><?php echo $rows["event_start_date"]; ?></td>
<td><?php echo $rows["event_start_time"]; ?></td>
<td><?php echo $rows["event_end_date"]; ?></td>
<td><?php echo $rows["event_end_time"]; ?></td>
<td><?php echo $rows["price"]; ?></td>
<?php 
if($rows["status"]==1){
    echo "<td><button class='btn btn-success'>Declared</button></td>";
}else{
    echo "<td><button class='btn btn-danger'>Yet To Declared</button></td>";
} 

?>
</tr>
<?php } 
}?>
</tbody>
</table>

<!-- </div> -->
</div>


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
  // $(document).ready(function(){
  //   var t=$('#example').DataTable(
  //   {
  //    order:[[3,'desc'],[0,'asc']]
  //   })
  // })
//   $(document).ready( function () {
//     $('#myTable').DataTable();
// } );
  let table = new DataTable('#myTable', {
    responsive: true,
      rowReorder: {
        selector: ' td:nth-child(3)'
    }
});
//  selector: ':not(td:nth-child(9))'  td:nth-child(3)
</script>
</body>
</html>