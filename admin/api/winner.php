<?php
include "../../config/config.php";
//print_r($_POST);
date_default_timezone_set('Asia/kolkata');
$updated=date("Y-m-d H:i:s");
if(isset($_POST['submit'])){
	echo "hello";
	$event_id=$_POST['event_id'];
	
	$sql2="INSERT INTO `winnerlist`( `ticket_id`, `event_id`) VALUES "; 
	   $rows=[];
	   echo $sql2;

	
	for($i=0;$i<count($_POST["ticket_id"]);$i++)
            {
       
              $ticket_id=mysqli_real_escape_string($connection,$_POST["ticket_id"][$i]);
               $rows[]="('{$ticket_id}','{$event_id}')";

	}
	 $sql2.=implode(",",$rows);
             echo $sql2;

            if($connection->query($sql2)){
            	echo "success";
            	$sql="UPDATE `events` SET `status`= 1 ,`updated`='{$updated}' WHERE `id`='{$event_id}'";
            	echo "cool";
                 if($connection->query($sql)){
                     echo "<script> window.location.href = '../adminresult.php'</script>";  
                 }else{
                 	echo "error";
                 	echo $sql;
                 }
                }

	
}
?>