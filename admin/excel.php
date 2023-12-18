<?php
// print_r($_POST['excel'])
include "../config/config.php";

if(isset($_POST['export'])){
     $filename=$_POST['filename'].".xls";
    
          
      if(empty($_POST['excel'])){
        echo "<script>alert('Kindly select the event to export')</script>";
      echo "<script>window.location.href='winner.php'</script>";
     }else{
        
        header("Content-Disposition: attachment;filename=\"$filename\"");
      header("Content-Type: application/vnd.ms-excel");


        $data = $_POST['excel'];
          
     }

     if(sizeof($data)>0){
      $init=0;
         
           echo "S/no\t";
           echo "Event Name\t";
           echo "Price\t";
            echo "Start Date\t";
             echo "Start Time\t";
              echo "End Date\t";
               echo "End Time\t";
                echo "Ticket No\t";
                 echo "Candidate Name\t"; echo "Candidate Ph.no\t\r\n";
                  echo "\t\r\n";

          for ($x = 0; $x < sizeof($data); $x++) {
 // echo "The number is: $data[$x] <br>";
            
$sql1="select * from events where id={$data[$x]}";
    //echo $sql;
    $result1=$connection->query($sql1);
   
    if(mysqli_num_rows($result1)>0){
             echo "WinnerList of ";
        // if($rowheading1=mysqli_fetch_assoc($result1)){
        //           echo $rowheading1["event_name"]."\t\r\n";
        //   }

       $i=0;

       while($row1=mysqli_fetch_assoc($result1)){
            if($i==0){
              echo  $row1["event_name"]."\t\r\n";
            }
           // echo $row1["event_name"];
           //   echo $row1["price"];
           //   echo $row1["event_start_date"];
           //    echo $row1["event_start_time"];
           //    echo $row1["event_end_date"];
           //      echo $row1["event_end_time"];



           $sql42="select wl.ticket_id, wl.event_id ,ev.event_name, et.event_ticket from winnerlist wl INNER JOIN events ev on ev.id=wl.event_id INNER JOIN event_tickets et on et.id = wl.ticket_id where wl.event_id={$row1['id']}";
            $res24=$connection->query($sql42);
                         if($res24->num_rows>0){

                            // $row3=$res3->fetch_assoc();
                              while($row5=mysqli_fetch_assoc($res24)){
                                    // echo "<button class='btn btn-success btn-sm m-2'>";
                                    // echo $row2["event_ticket"];
                                    // echo "</button>";
                                   
                                    //echo "{$row5["event_ticket"]}";
  

                                    $sql35="SELECT * FROM orders o INNER join register r on r.id=o.userid WHERE ticket={$row5['event_ticket']} and event_id={$row1['id']}";

                                      $res36=$connection->query($sql35);
                          if($res36->num_rows>0){
                            // echo "<ol>";
               while($row37=mysqli_fetch_assoc($res36))
              {
            


                echo ++$i."\t";
              
                echo $row1["event_name"]."\t";
             echo $row1["price"]."\t";
             echo $row1["event_start_date"]."\t";
              echo $row1["event_start_time"]."\t";
              echo $row1["event_end_date"]."\t";
                echo $row1["event_end_time"]."\t";
                echo $row5["event_ticket"]."\t";
                  echo $row37['name']."\t";
                echo $row37['phonenumber']."\t\r\n";
              }
            //  echo "</ol>";
            }else{

             //  echo "<p>no one bought this ticket</p>";
             // echo $row1["event_name"];
             // echo $row1["price"];
             // echo $row1["event_start_date"];
             //  echo $row1["event_start_time"];
             //  echo $row1["event_end_date"];
             //    echo $row1["event_end_time"];
              echo ++$i."\t";
              
                echo $row1["event_name"]."\t";
             echo $row1["price"]."\t";
             echo $row1["event_start_date"]."\t";
              echo $row1["event_start_time"]."\t";
              echo $row1["event_end_date"]."\t";
                echo $row1["event_end_time"]."\t";
                echo $row5["event_ticket"]."\t";
                  echo "None\t";
                echo "None\t\r\n";
            }
               //echo "</details>";





                            }   
            }
                          }


}


$sqlTickets="SELECT * FROM `event_tickets` et INNER JOIN events ev on ev.id=et.event_id  WHERE et.event_id={$data[$x]}";
$resTickets=$connection->query($sqlTickets);
   
    if(mysqli_num_rows($resTickets)>0){
            $j=0;
              echo "Purchased List of ";
              if($rowheading=mysqli_fetch_assoc($resTickets)){
                  echo $rowheading["event_name"]."\t\r\n";
               }
               
        while($rowTickets=mysqli_fetch_assoc($resTickets)){

        $sqlDetails="SELECT * FROM orders o INNER join register r on r.id=o.userid WHERE ticket={$rowTickets['event_ticket']} and event_id={$data[$x]}";
         $resDetails=$connection->query($sqlDetails);
       
         if(mysqli_num_rows($resDetails)>0){

               while($rowTicketsDetails=mysqli_fetch_assoc($resDetails)){
                 echo ++$j."\t";
                 echo $rowTickets["event_name"]."\t";
                 echo $rowTickets["price"]."\t";
                 echo $rowTickets["event_start_date"]."\t";
                 echo $rowTickets["event_start_time"]."\t";
                 echo $rowTickets["event_end_date"]."\t";
                 echo $rowTickets["event_end_time"]."\t";
                 echo $rowTickets["event_ticket"]."\t";
                 echo $rowTicketsDetails['name']."\t";
                 echo $rowTicketsDetails['phonenumber']."\t\r\n";
              }


               }
         else{
                 echo ++$j."\t";
                 echo $rowTickets["event_name"]."\t";
                 echo $rowTickets["price"]."\t";
                 echo $rowTickets["event_start_date"]."\t";
                 echo $rowTickets["event_start_time"]."\t";
                 echo $rowTickets["event_end_date"]."\t";
                 echo $rowTickets["event_end_time"]."\t";
                 echo $rowTickets["event_ticket"]."\t";
                 echo "none"."\t";
                 echo "none"."\t\r\n";

         }


      }
    }


}//for end  loop
      //echo "<script>alert('Exported Successfully')</script>";
    //  echo "<script>window.location.href='winner.php'</script>";
     }else{
       echo "<script>alert('selected none')</script>";
       echo "<script>window.location.href='winner.php'</script>";
     }
}
?>