<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>carousel</title>
   
</head>
  <style type="text/css">
     
            </style>
<body>
 






<div class="container" style="margin-top: 5px;">

<form class="row g-3" action="index.php"  method="POST" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4"  class="title form-label">Poster Name</label>
      <input type="text" name="title" class="form-control" placeholder="Name of the poster" required>  
          
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class=" title form-label">poster</label>
    <input type="file" name="image" class="form-control" required>  
            
  </div>
  <div class="col-12">
    <button type="submit" name="submitads" class="btn btn-primary">submit</button>
  </div>
</form>

</div>



<form action="../dynamicCarosual/include.php" method='post'>
  <div class="container" style="margin-top:15px;display:flex;justify-content:center;align-items: center;">
    <h1 class="title">advertise</h1>
</div>
  <div class="container" style="display: flex;justify-content: center;align-items: center;flex-wrap: wrap;margin-top: 10px;border-radius: 15px;">
<?php
$i=0;
$result = mysqli_query($connection, "SELECT * FROM images ");
if ($result->num_rows > 0) {
while($row = mysqli_fetch_array($result)) {
?>


<div class="card"  style="max-width: 20rem;width:  220px;margin: 5px;">
 
  <div class="card-body ">
    <h5 class="card-title"><?=$row["title"];?> </h5>
    <p style="text-align:center;">
  <img src="<?php echo '../dynamicCarosual/uploads/'.$row['image'].'';?>" alt="<?php echo $row['image'];?>" style="width: 100%;height:120px ;object-fit: contain;">
</p>
  </div>
  <div class="card-footer bg-transparent border-success" style="width: 100%;text-align: center;">
    
    <?php
         if($row['status']==1){
            echo "<a href='../dynamicCarosual/activetoinactive.php?userid={$row['id']}' onclick='return confirm('Do you want to inactive')' class='btn btn-sm btn-outline-success'>Active</a>";
         }else{
             echo "<a href='../dynamicCarosual/inactivetoactive.php?userid={$row['id']}' onclick='return confirm('Do you want to active')' class='btn btn-sm btn-outline-danger'>Inactive</a>";
         }
    ?>
    <a href="../dynamicCarosual/delete_item.php?userid=<?php echo $row['id']?>" class="btn btn-sm btn-outline-warning" onclick="return confirm('sure to Delete');">Delete</a>
   </div>
   

</div>

<?php
$i++;
}

}else{echo "<center>No Data Found</center>";}
?>
<br>
<br>


</div>

</form>


</body>
</html>