<?php
session_start();
include "config/config.php";
$qty=1;
if(isset($_GET["id"])){
    $sql="select * from event_tickets where id={$_GET["id"]}";
    $res=$connection->query($sql);
    if($res->num_rows>0){
        $row=$res->fetch_assoc();
        print_r($row);
       
        $sql1="select * from events where id={$row["event_id"]}";
        $price=0;
        $res1=$connection->query($sql1);
        if($res1->num_rows>0){
            $row1=$res1->fetch_assoc();
            //$price=< $row1["price"];
            print_r($row1);
        }
        if($_SESSION["cart"]){
                  $id_array= array_column($_SESSION["cart"],"id");
                  if(!in_array($_GET["id"],$id_array)){
                    //    $index=count($_SESSION["cart"]);
                       $item= array(
                        'id' => $_GET["id"],
                        'ticket_no' => $row["event_ticket"],
                        'event_name'=>$row1["event_name"],
                        'event_id'=>$row1["id"],
                        'price' => $row1["price"],
                        'qty'  =>$qty
                       );
                    //    $_SESSION["cart"][]=$item;
                    array_push($_SESSION['cart'], $item);
                      // echo "<script>alert('ticket added')</script>";
                      // echo "<script>window.location.href='index.php'</script>";

                  }else{
                    //echo "<script>alert('already added')</script>";
                    //echo "<script>window.location.href='index.php'</script>";
                  }
        }
        else{
           $item= array(
            'id' => $_GET["id"],
            'ticket_no' => $row["event_ticket"],
            'event_name'=>$row1["event_name"],
            'event_id'=>$row1["id"],
            'price' => $row1["price"],
            //'qty'  =>$row["quantity"]
            'qty'  =>$qty
           );
           $_SESSION["cart"][0]=$item;
        //   echo "<script>alert('ticket added')</script>";
        //echo "<script>window.location.href='index.php'</script>";
        }
    }

     $count= count($_SESSION['cart']);
     echo $count;
}

?>