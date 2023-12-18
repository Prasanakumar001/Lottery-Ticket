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
	<title>order</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<!-- <script type="text/javascript" src="script/getData.js"></script> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
    	.navbar-brand:hover{
    color:white;
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
/*	 border:1px solid red;*/
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
          <a class="nav-link d-flex  active-nav align-items-center" aria-current="page" href="adminresult.php"><ion-icon name="bookmark"></ion-icon>&nbsp;Result Annocement</a>
        </li>



        <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" href="winner.php"><ion-icon name="trophy"></ion-icon>&nbsp;Event Winners</a>
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


<div class="container" style="margin-top: 80px;justify-content: center;align-items: center;display: flex;flex-direction: column;">

<div class="page-header">

<select id="event" name="eventname" class="eventname form-select form-select-lg mb-3 ">

<optgroup label="previous days">
	<?php
$today=date("Ymd");

$sql = "SELECT * FROM `events`  WHERE `status`=0 and  DATE_FORMAT(event_start_date, '%Y%m%d') < {$today} ORDER BY event_cat ";

$resultset = mysqli_query($connection, $sql) or die("database error:". mysqli_error($connection));
$group_model=array();
while( $rows = mysqli_fetch_assoc($resultset) ) { 
	$group_model[$rows['event_cat']][] = $rows;

}


foreach ($group_model as $key => $values)
{

echo '<optgroup label="'.$key.'">';
foreach ($values as $value) 
{
	$start_date =date("d/m/Y", strtotime($value['event_start_date']));
	$end_date=date("d/m/Y", strtotime($value['event_end_date']));
	echo '<option value="'.$value['id'].'">Start_date:'.$start_date.'&nbsp;&nbsp;Event name: '.$value['event_name'].'&nbsp;&nbsp;End_date:'.$end_date.'</option>';
	

}

echo '</optgroup>';
}

?>
</optgroup>
<option value="" selected="selected">Select Event </option>
<optgroup label="Current & Upcoming Days">
	

<?php
$today=date("Ymd");

$sql = "SELECT * FROM `events`  WHERE `status`=0 and  DATE_FORMAT(event_start_date, '%Y%m%d') >= {$today} ORDER BY event_cat ";
$resultset = mysqli_query($connection, $sql) or die("database error:". mysqli_error($connection));
$group_model=array();
while( $rows = mysqli_fetch_assoc($resultset) ) { 
	$group_model[$rows['event_cat']][] = $rows;
}


foreach ($group_model as $key => $values)
{

echo '<optgroup label="'.$key.'">';
foreach ($values as $value) 
{
	$start_date =date("d/m/Y", strtotime($value['event_start_date']));
	$end_date=date("d/m/Y", strtotime($value['event_end_date']));
	echo '<option value="'.$value['id'].'">Start_date:'.$start_date.'&nbsp;&nbsp;Event name: '.$value['event_name'].'&nbsp;&nbsp;End_date:'.$end_date.'</option>';

}

echo '</optgroup>';
}

?>
</optgroup>
</select>



</div>	



<!-- <table id="heading" class="table table-bordered hidden">
	<th>s.no</th>
	<th>event name </th>
	<th>participant name</th>
	<th>phonenumber</th>
	<th>ticket no</th>
	<tbody>
		<tr>no one participated</tr>
	</tbody>
	
</table> -->
<div id="heading1" style="color: white;" class="hidden">
	</div>
<script type="text/javascript">
	$(document).ready(function(){  
	// code to get all records from table via select box
	$("#event").change(function() {    
		var id = $(this).find(":selected").val();
		var input= id;
		document.getElementById("event_id_form").value=input;
		console.log(id);
		var dataString = 'eventid='+ id;   
		console.log(dataString); 
		$.ajax
({
type: "POST",
url: "sortedticket.php",
data: dataString,
cache: false,
success: function(html)
{
$(".sortedticket").html(html);
}
});
		$.ajax({
			url: 'api/getEventOrders.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(eventData) {
				  console.log("success");
				  console.log(eventData);
				   var data='';
				   var count=1; 
			   if(eventData) {
			   	     console.log(eventData);
                     $("#heading").removeClass("hidden");
					$("#heading tbody").remove();

			   	     $.each(eventData,function(key,value){
			   	     	//console.log(eventData.event_name);
                       //     data+='<tr>';
                       //     data+='<td>'+count+'</td>';
                       //     data+='<td>'+value.event_name+'</td>';
                       //       data+='<td>'+value.name+'</td>';
                       //         data+='<td>'+value.phonenumber+'</td>';
			   	             // data+='<td>'+value.ticket+'</td>';
                       //        data+='</tr>';
                       //        count++;
                              

			   	     });
			   	    
			   	     console.log(data);
			   	     $('#heading').append(data);
			   						
					
				} else {
				     $("#heading").addClass("hidden");
					
				}   	
			} 





		});
 	
         $.ajax({
			url: 'api/participant.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(eventData) {
				  //console.log("success");
				  //console.log(eventData);
				   var data=''; 
			   if(eventData) {
			   	     // console.log(eventData);
                     $("#heading1").removeClass("hidden");
					var count=0;
			   	     $.each(eventData,function(key,value){
			   	     	count++;
			   	     });

			   	     data+='Total Participant:'+count+'';
			   	     console.log(data);
			   	     $('#heading1').text(data);
			   						
					
				} else {
				     $("#heading1").addClass("hidden");
					
				}   	
			} 
		});
 	
 	}) 
});
</script>



<form method="post" action="api/winner.php" >
	<input type="hidden" name="event_id" id="event_id_form" value="">
<h3 style="color:white;">Declare Winning Ticket:</h3>
<select  class="sortedticket js-example-basic-multiple form-control " name="ticket_id[]" multiple="multiple" required placeholder="select the tickets">

</select>
<center>
<input type="submit" name="submit" class="btn btn-warning mt-3" value="Annouce">
</center>
</form>
<script type="text/javascript">
	$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>


</div>
 
</body>
</html>