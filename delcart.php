<?php
session_start();
print_r($_SESSION["cart"]);

    if(isset($_GET["del"])){
        //  foreach($_SESSION["cart"] as $keys=>$values){
        //     if($values["id"] == $_GET["del"]){
        //           unset($_SESSION["cart"][$keys]);
        //            //echo "<script>grand_total()</script>";
        //    }
        // }
        if(count($_SESSION['cart'])<=1){
              unset($_SESSION['cart']);

          }else{
          // $key = array_search($_GET['del'], $_SESSION['cart']);	
	      
          //     unset($_SESSION['cart'][$key]);

   $proid = $_GET['del'];
   unset($_SESSION['cart'][$proid]);
          }

  // $proid = $_GET['del'];
  // unset($_SESSION['cart'][$proid]);
  //header("location: cart.php");

         
    //    if(!empty($_SESSION["cart"])) {
    //     foreach($_SESSION["cart"] as $k => $v) {
    //         if($_GET["del"] == $k)
    //             unset($_SESSION["cart"][$k]);              
    //         if(empty($_SESSION["cart"]))
    //             unset($_SESSION["cart"]);
    //     }
    // }

        echo "<script>";
        echo "window.location.href='cart.php'";
        echo "</script>";
       
    }
    ?>