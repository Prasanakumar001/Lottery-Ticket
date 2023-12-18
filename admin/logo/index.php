<?php
session_start();
include "../../config/config.php";
if(!isset($_SESSION['name'])){
  //header("location : ./login/login.php");
  //echo "<h1>wrong</h1>";
  echo "<script>alert('login')</script>";
 //echo "<script>window.location.href='./../ind.php'</script>";
  echo "<script>window.location.href='../login/login.php'</script>";
}
?>
<?php
include "../../config/config.php";
if(isset($_POST['submit'])){  
     //print_r($_POST);
    $name = $_FILES['image']['name'];  
    list($txt, $ext) = explode(".", $name);  
    $image_name = time().".".$ext;  
    $tmp = $_FILES['image']['tmp_name'];  
  
   if(move_uploaded_file($tmp, 'uploads/'.$image_name)){  
  
        $sql = "INSERT INTO logo (title, image) VALUES ('".$_POST['title']."', '".$image_name."')";  
         //   echo $sql;
        $connection->query($sql);  
         echo "<script>alert('successfully added')</script>";
        echo "<script>location.href='index.php'</script>";
    
    }else{   
         echo "<script>alert('Uploading of image is failed')</script>";
        echo "<script>location.href='index.php'</script>";

    }  
}
if(isset($_POST['submit_login_admin'])){
    $name=mysqli_real_escape_string($connection,$_POST["name"]);
     $email=mysqli_real_escape_string($connection,$_POST["email"]);

    $password=mysqli_real_escape_string($connection,$_POST["password"]);
    $phonenumber=mysqli_real_escape_string($connection,$_POST["phonenumber"]);
    $sql="INSERT INTO `admin`( `name`,`email` ,`password`,`phonenumber`) VALUES ('$name','$email','$password','$phonenumber')";
    
    if($connection->query($sql)){
        
        echo "<script>";
        echo "window.location.href='index.php'";
        echo "</script>";
    }
}


if(isset($_POST['submitoffer'])){  
     //print_r($_POST);
    $name = $_FILES['image']['name'];  
    list($txt, $ext) = explode(".", $name);  
    $image_name = time().".".$ext;  
    $tmp = $_FILES['image']['tmp_name'];  
  
   if(move_uploaded_file($tmp, 'posters/'.$image_name)){  
  
        $sql = "INSERT INTO offer (title, image) VALUES ('".$_POST['title']."', '".$image_name."')";  
            //echo $sql;
        $connection->query($sql);  
         echo "<script>alert('successfully added')</script>";
        echo "<script>location.href='index.php'</script>";
    
    }else{   
         echo "<script>alert('Uploading of image is failed')</script>";
        echo "<script>location.href='index.php'</script>";

    }  
}




if(isset($_POST['submitads'])){  
    // print_r($_POST);
    $name = $_FILES['image']['name'];  
    list($txt, $ext) = explode(".", $name);  
    $image_name = time().".".$ext;  
    $tmp = $_FILES['image']['tmp_name'];  
  
   if(move_uploaded_file($tmp, '../dynamicCarosual/uploads/'.$image_name)){  
  
        $sql = "INSERT INTO images (title, image) VALUES ('".$_POST['title']."', '".$image_name."')";  
            echo $sql;
        $connection->query($sql);  
         echo "<script>alert('successfully added')</script>";
        echo "<script>location.href='index.php'</script>";
    
    }else{   
         echo "<script>alert('Uploading of image is failed')</script>";
        echo "<script>location.href='index.php'</script>";

    }  
}





  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings</title>
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

    <img src="uploads/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>"  width="52" height="38"  class="navbarlogo">
    &nbsp;
     <span  style="letter-spacing: 5px;text-transform: uppercase;font-size: 24px;" class="fw-bold"><?php echo $row['title'] ?></span>
    </a>
        <?php 
    }}else{
        echo "
               <a class='navbar-brand' href='#' style='display: flex;justify-content: center;align-items: center;'>

    <img src='uploads/1696430114.png' alt='3024' width='52' height='38' class='navbarlogo'>
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
          <a class="nav-link   d-flex align-items-center"  href="../index.php"><ion-icon name="home"></ion-icon>&nbsp;Home</a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" aria-current="page" href="../adminresult.php"><ion-icon name="bookmark"></ion-icon>&nbsp;Result Annocement</a>
        </li>

          <li class="nav-item ">
          <a class="nav-link   d-flex align-items-center" href="../winner.php"><ion-icon name="trophy"></ion-icon>&nbsp;Event Winners</a>
        </li> 
       <!--  <li class="nav-item ">
          <a class="nav-link  d-flex align-items-center" href="../dynamicCarosual/index.php"><ion-icon name="image-sharp"></ion-icon>&nbsp;Advertisement</a>
        </li>  -->
        <li class="nav-item ">
          <a class="nav-link  active-nav d-flex align-items-center" href="index.php"><ion-icon name="settings-sharp"></ion-icon>&nbsp;Settings

          </a>
        </li> 
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  d-flex align-items-center" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <ion-icon name="person-circle"></ion-icon>&nbsp;
          <?php echo $_SESSION["name"];?>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li> <a class="dropdown-item" href="../login/logout.php">Logout</a></li>
            <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </li>
       
        
      </ul>
        
      
     
    </div>
  </div>
</nav>



















<!-- <form action="index.php"  method="POST" enctype="multipart/form-data">  
      
                <strong>webiste name:</strong>  
                <input type="text" name="title" class="form-control" placeholder="Title" required>  
          
                <strong>Image:</strong>  
                <input type="file" name="image" class="form-control" required>  
            
                <button type="submit" name="submit" class="btn btn-success">Upload</button>  
           
  
    </form>   --> 
<div class="container" style="margin-top: 80px;">


  <button type="button" class="collapsible"><ion-icon name="color-palette"></ion-icon>Manage Logo</button>
  <div class="content">
    <form class="row g-3" action="index.php"  method="POST" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4"  class="title form-label">display name</label>
      <input type="text" name="title" class="form-control" placeholder="name to be displayed" required>  
          
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class=" title form-label">Logo</label>
    <input type="file" name="image" class="form-control" required>  
            
  </div>
  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary">submit</button>
  </div>
</form>




<form action="include.php" method='post'>
     <div class="container" style="margin-top:15px;display:flex;justify-content:center;align-items: center;">
    <h1 class="title">choose your Logo</h1>
   </div>
  <div class="container" style="display: flex;justify-content: center;align-items: center;flex-wrap: wrap;margin-top: 10px;border-radius: 15px;">
<?php
$i=0;
$result = mysqli_query($connection, "SELECT * FROM logo ");
if ($result->num_rows > 0) {
while($row = mysqli_fetch_array($result)) {
?>


<div class="card" style="max-width: 20rem;width:  220px;margin: 5px;">
 
  <div class="card-body ">
    <h5 class="card-title"><?=$row["title"];?> </h5>
    <p style="text-align:center;">
  <img src="<?php echo 'uploads/'.$row['image'].'';?>" alt="<?php echo $row['image'];?>" style="width: 100%;height:120px ;object-fit: contain;">
</p>
  </div>
  <div class="card-footer bg-transparent border-success" style="width: 100%;text-align: center;">
    
    <?php
         if($row['status']==1){
            //echo "<a href='activetoinactive.php?userid={$row['id']}' onclick='return confirm('Do you want to inactive')' style='background:green'>Active</a>";
            echo "<a href='activetoinactive.php?userid={$row['id']}' onclick='return confirm('Do you dont want to use')'  class='btn btn-sm btn-outline-success'>used</a>";
         }else{
             echo "<a href='inactivetoactive.php?userid={$row['id']}' onclick='return confirm('Do you want to use')' class='btn btn-sm btn-outline-danger'>not in use</a>";
         }
    ?>
    <a href="delete_item.php?userid=<?php echo $row['id']?>" class="btn btn-sm btn-outline-warning" onclick="return confirm('sure to Delete');">Delete</a>
   </div>
   

</div>

<?php
$i++;
}

}else{echo "<center>No Data Found</center>";}
?>
<br>
<br>
<!-- </div> -->



</form>






<!-----------------------content------------------->



  </div>


</div>




  <button type="button" class="collapsible"><ion-icon name="pencil-outline"></ion-icon>Manage Offer Poster</button>
  <div class="content">
    <form class="row g-3" action="index.php"  method="POST" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4"  class="title form-label">offer name</label>
      <input type="text" name="title" class="form-control" placeholder="name to be displayed" required>  
          
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class=" title form-label">offer image</label>
    <input type="file" name="image" class="form-control" required>  
            
  </div>
  <div class="col-12">
    <button type="submit" name="submitoffer" class="btn btn-primary">submit</button>
  </div>
</form>




<form action="" method='post'>
     <div class="container" style="margin-top:15px;display:flex;justify-content:center;align-items: center;">
    <h1 class="title">choose your Offer popup</h1>
   </div>
  <div class="container" style="display: flex;justify-content: center;align-items: center;flex-wrap: wrap;margin-top: 10px;border-radius: 15px;">
<?php
$i=0;
$result = mysqli_query($connection, "SELECT * FROM offer ");
if ($result->num_rows > 0) {
while($row = mysqli_fetch_array($result)) {
?>


<div class="card" style="max-width: 20rem;width:  220px;margin: 5px;">
 
  <div class="card-body ">
    <h5 class="card-title"><?=$row["title"];?> </h5>
    <p style="text-align:center;">
  <img src="<?php echo 'posters/'.$row['image'].'';?>" alt="<?php echo $row['image'];?>" style="width: 100%;height:120px ;object-fit: contain;">
</p>
  </div>
  <div class="card-footer bg-transparent border-success" style="width: 100%;text-align: center;">
    
    <?php
         if($row['status']==1){
            //echo "<a href='activetoinactive.php?userid={$row['id']}' onclick='return confirm('Do you want to inactive')' style='background:green'>Active</a>";
            echo "<a href='activetoinactiveoffer.php?userid={$row['id']}' onclick='return confirm('Do you dont want to use')'  class='btn btn-sm btn-outline-success'>used</a>";
         }else{
             echo "<a href='inactivetoactiveoffer.php?userid={$row['id']}' onclick='return confirm('Do you want to use')' class='btn btn-sm btn-outline-danger'>not in use</a>";
         }
    ?>
    <a href="delete_itemoffer.php?userid=<?php echo $row['id']?>" class="btn btn-sm btn-outline-warning" onclick="return confirm('sure to Delete');">Delete</a>
   </div>
   

</div>

<?php
$i++;
}

}else{echo "<center>No Data Found</center>";}
?>
<br>
<br>
<!-- </div> -->



</form>






<!-----------------------content------------------->



  </div>

</div>

<!-- <div style="background: rgba(255, 255, 255, 0.6);margin-top: 10px;border-radius: 15px;text-align: center;" class="container"> -->
<!--  <div style="border: 1px solid ghostwhite;margin-top: 10px;border-radius: 15px;text-align: center;" class="container"> 


</div>
 -->

<style type="text/css">
  .collapsible {
      font-family: 'Roboto',sans-serif;
         background: #0c111b;
/*  background-color: #777;*/
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: center;
  outline: none;
  font-size: 20px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
 padding: 0 18px;
  background-color: transparent;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

.collapsible:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: white;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}
</style>

<div class="container" style="margin-top:2px;">

<button type="button" class="collapsible"><ion-icon name="image-sharp"></ion-icon>&nbsp;<span>Manage Ads</span></button>
<div class="content">
  <br>
<?php 
echo "<div style='text-transform:'>";
include "../dynamicCarosual/index.php";
echo "</div>";?>
</div>




<button type="button" class="collapsible"><ion-icon name="lock-closed"></ion-icon>&nbsp;<span>Manage Policy</span></button>
<div class="content">
  <br>
<?php 
echo "<div style='text-transform:'>";
include "../privacy.php";
echo "</div>";?>
</div>


<button type="button" class="collapsible"><ion-icon name="newspaper"></ion-icon>&nbsp;<span>Manage Terms & Conditions</span></button>
<div class="content">
  <br>
<?php 
echo "<div style='text-transform:'>";
include "../terms.php";
echo "</div>";?>
</div>



<button type="button" class="collapsible"><ion-icon name="people-circle-outline"></ion-icon>&nbsp;<span>Manage Admin Users</span></button>
<div class="content">
  <br>
  <div style="background-color:white;padding: 20px;">
 <form method="post" >
        <label>name</label>
        <input type="text" class="form-control" name="name" ></input>
         <label>email</label>
        <input type="text" class="form-control" name="email" ></input>

        <label>password</label>
        <input type="text" class="form-control" name="password"></input>
        <label>phonenumber</label>
        <input type="text" class="form-control" name="phonenumber"></input>
        <br>
        <input type="submit" name="submit_login_admin">
    </form>
   </div>
   <div class="table-responsive">
     <table class="table">
      <tr>
       <th>s.no</th>
       <th>name</th>
       <th>email</th>
       <th>phonenumber</th>
       <th>Delete</th>
      </tr>
      <?php
       $i=1;
      $result = mysqli_query($connection, "SELECT * FROM admin limit 1,100 ");
     if ($result->num_rows > 0) {
while($row = mysqli_fetch_array($result)) {
?>
<tr>
  <td><?php echo $i++;?></td>
  <td><?php echo $row["name"];?></td>
  <td><?php echo $row["email"];?></td>
  <td><?php echo $row["phonenumber"];?></td>
  <td>
      <a href="delete_itemuser.php?userid=<?php echo $row['id']?>" class="btn btn-sm btn-outline-warning" onclick="return confirm('sure to Delete');">Delete</a>

  </td>
</tr>
<?php }
}else{
  echo "<tr>
  <td colspan='5' align='center'>no data</td></tr>";
}

?>



     </table>
   </div>
</div>










</div>







<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}
</script>




</body>
</html>