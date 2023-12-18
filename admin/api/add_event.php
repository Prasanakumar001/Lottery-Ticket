<?php
include "../../config/config.php";
date_default_timezone_set('Asia/kolkata');
//print_r($_POST);
if(isset($_POST['add_event'])){
    $event_name=mysqli_real_escape_string($connection,$_POST["event_name"]);
    $ticket_serial_start=mysqli_real_escape_string($connection,$_POST["ticket_serial_start"]);
    $ticket_serial_end=mysqli_real_escape_string($connection,$_POST["ticket_serial_end"]);
    $event_start_date=mysqli_real_escape_string($connection,$_POST["event_start_date"]);
    $event_start_time=mysqli_real_escape_string($connection,$_POST["event_start_time"]);
    $event_end_date=mysqli_real_escape_string($connection,$_POST["event_end_date"]);
    $event_end_time=mysqli_real_escape_string($connection,$_POST["event_end_time"]);
    $ticket_quantity=mysqli_real_escape_string($connection,$_POST["quantity"]);
    $price=mysqli_real_escape_string($connection,$_POST["price"]);
    $event_cat=mysqli_real_escape_string($connection,$_POST["event_cat"]);
    $ticket_serial_end=$ticket_serial_end+1;

   $startdate=date_format(date_create($event_start_date),"Ymd");
   $enddate=date_format(date_create($event_end_date),"Ymd");
   $starttime =date_format(date_create($event_start_time),"Hi");
   $endtime =date_format(date_create($event_end_time),"Hi");


    // echo $startdate."\n";
    //     echo $enddate."\n";
    //         echo $starttime."\n";
    //             echo $endtime."\n";
    if( ($startdate==$enddate )&& ($starttime > $endtime)){
         //echo "go"; 

       echo "<script>";
       echo "alert('check the time')
             window.location.href='../index.php'";
       echo "</script>";
   }else if($startdate>$enddate){
            echo "<script>";
       echo "alert('check the date')
             window.location.href='../index.php'";
       echo "</script>";
   }
   else if($ticket_serial_start<$ticket_serial_end){

        $counter=$ticket_serial_start;
        $sql="INSERT INTO `events`( `event_name`, `event_start_date`, `event_start_time`, `event_end_date`, `event_end_time`,`price`,`event_cat`) VALUES ('{$event_name}','{$event_start_date}','{$event_start_time}','{$event_end_date}','{$event_end_time}','{$price}','{$event_cat}')";
      
        if($connection->query($sql))
        {
            $id=$connection->insert_id;
            while($counter<$ticket_serial_end){
                $sql1="INSERT INTO `event_tickets`( `event_id`, `event_ticket`, `quantity`)VALUES ('{$id}',{$counter},'{$ticket_quantity}')";
                $result=$connection->query($sql1);
                $counter+=1;
            }

        }
        
       
  //  echo $result;  

    
    echo "<script>window.location.href='../index.php'</script>"; 









    }else{
        echo "<script>alert('check the serial number')</script>";
        echo "<script>window.location.href='../index.php'</script>";
    }
   
}
?>