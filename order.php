<?php
       //print_r($_POST);

       include "config/config.php";
       $cd=date("Y-m-d"); $ct=date("H:i");
       $cd="'".$cd."'";
       $updatecount=0;

        if(isset($_POST["submit"])){
            $grand_total=mysqli_real_escape_string($connection,$_POST["grand_total"]);
            $userid=mysqli_real_escape_string($connection,$_POST["userid"]);
          // print_r($_POST);
        $sql="SELECT * FROM `events` where  ((`event_start_date` <= `event_end_date` AND `event_end_date` >= `event_start_date`)and(`event_end_date`>={$cd}))";
          if($connection->query($sql)){
            //print_r($_POST);

            // quantity check start
            for($i=0;$i<count($_POST["event_id"]);$i++)
            {
              $ticket=mysqli_real_escape_string($connection,$_POST["ticket"][$i]);
              $event_id=mysqli_real_escape_string($connection,$_POST["event_id"][$i]);
              $qty=mysqli_real_escape_string($connection,$_POST["qty"][$i]);
            
            $sqlcheckquantity = "select quantity,event_ticket,id from `event_tickets` WHERE event_id={$event_id} and  event_ticket={$ticket}";
              $result=$connection->query($sqlcheckquantity);
                if(mysqli_num_rows($result)>0){
                  //$i=1;
                  if($row=mysqli_fetch_assoc($result)){
                     $qtydb=$row['quantity'];
                     $ticketid=$row['id'];
                  }
                }
                 if($qty <= $qtydb){
                    //  $qty1=$qtydb-$qty;
                     
                    // $sqlupdate="UPDATE `event_tickets` SET `quantity`='{$qty1}' WHERE id={$ticketid}";
                    $updatecount++;
                
                 }else{
                   echo "<script>alert('Ticketno:$updatecount out of stock')</script>";
                   echo "<script>window.location.href='cart.php'</script>";

                 }

                          

                }
             // quantity check end
           

           if($updatecount == count($_POST["event_id"]) ){





          for($i=0;$i<count($_POST["event_id"]);$i++)
            {
              $ticket=mysqli_real_escape_string($connection,$_POST["ticket"][$i]);
              $event_id=mysqli_real_escape_string($connection,$_POST["event_id"][$i]);
              $qty=mysqli_real_escape_string($connection,$_POST["qty"][$i]);
            
            $sqlcheckquantity = "select quantity,event_ticket,id from `event_tickets` WHERE event_id={$event_id} and  event_ticket={$ticket}";
              $result=$connection->query($sqlcheckquantity);
                if(mysqli_num_rows($result)>0){
                  //$i=1;
                  if($row=mysqli_fetch_assoc($result)){
                     $qtydb=$row['quantity'];
                     $ticketid=$row['id'];
                  }
                }
                 if($qty <= $qtydb){
                      $qty1=$qtydb-$qty;
                     
                     $sqlupdate="UPDATE `event_tickets` SET `quantity`='{$qty1}' WHERE id={$ticketid}";
                     $connection->query($sqlupdate);
                    //$updatecount++;
                
                 }else{
                   echo "<script>alert('Ticketno:$ out of stock')</script>";
                   echo "<script>window.location.href='cart.php'</script>";

                 }

             }














            $sql2="insert into `orders`( `userid`, `event_id`, `price`, `qty`, `total`, `grandtotal`,`ticket`) values ";
           // $sqlupdate="UPDATE `event_tickets` SET `quantity`='{$qty1}' WHERE id={$ticketid}";
            
            $rows=[];
            $update=[];
            for($i=0;$i<count($_POST["event_id"]);$i++)
            {
       
              $ticket=mysqli_real_escape_string($connection,$_POST["ticket"][$i]);
              $event_id=mysqli_real_escape_string($connection,$_POST["event_id"][$i]);
              $price=mysqli_real_escape_string($connection,$_POST["price"][$i]);
              $qty=mysqli_real_escape_string($connection,$_POST["qty"][$i]);
              $total=mysqli_real_escape_string($connection,$_POST["total"][$i]);
             
          
              $rows[]="('{$userid}','{$event_id}','{$price}','{$qty}','{$total}','{$grand_total}','{$ticket}')";

            
           // $fg=('{$userid}','{$event_id}','{$price}','{$qty}','{$total}','{$grand_total});
            }
            $sql2.=implode(",",$rows);
             //echo $sql2;

            if($connection->query($sql2)){
                session_start();
              unset($_SESSION['cart']);
                echo "<script> window.location.href = 'cart.php'</script>";  
                 
              
            }else{
              echo "<div class='alert alert-danger'>order Failed.</div>";
         
            }


           }else{
            echo "<script>alert('Ticketno: part2 out of stock')</script>";
                   echo "<script>window.location.href='cart.php'</script>";

           }
            













          }else{
            echo "<div class='alert alert-danger'>order Failed.</div>";
          }
        }
        
      ?>