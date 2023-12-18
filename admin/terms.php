
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>privacy policy</title>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
  <!-- <textarea>Next, use our Get Started docs to setup Tiny!</textarea> -->

  <form method="post" action="termsinsert.php">
    <textarea name="editor" id="editor" rows="10" cols="80" required>
    
    </textarea>
    <center style="margin: 3px;">
    <input type="submit" class="btn btn-primary" name="submitterms" value="SUBMIT">
    </center>
</form>

<?php
$sql = "SELECT * FROM `terms`";
$resultset = mysqli_query($connection, $sql) or die("database error:". mysqli_error($connection));
if(mysqli_num_rows($resultset)>0){

while( $rows = mysqli_fetch_assoc($resultset) ) { 
?>
<div class="container" style="background:white;margin-top:5px ;padding: 5px;border-radius: 15px;padding-left:15px">
       <?php 
       echo  $rows['content'];
       ?>
      <?php
         if($rows['status']==1){
            echo "<a href='termsactivetoinactive.php?userid={$rows['id']}' onclick='return confirm('Do you want to inactive')' class='btn btn-sm btn-outline-success'>Active</a>";
         }else{
             echo "<a href='termsinactivetoactive.php?userid={$rows['id']}' onclick='return confirm('Do you want to active')' class='btn btn-sm btn-outline-danger'>Inactive</a>";
         }

    ?>
    <a href="termsdelete_item.php?userid=<?php echo $rows['id']?>" class="btn btn-sm btn-outline-warning" onclick="return confirm('sure to Delete');">Delete</a>
</div>
<?php
}
}
else{
	echo "<center>No Data Found</center>";
}
?>
</body>
</html>