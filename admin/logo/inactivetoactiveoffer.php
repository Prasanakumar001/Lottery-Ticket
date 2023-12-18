<?php 
//session_start();
include '../../config/config.php';?>
<?php
//session_start();

// //$result = mysqli_query($connection," update  set include=0,stock=0 where 1");
// foreach($_POST as $x => $x_value) {
// $temp = str_replace("_"," ","$x");

// $age[$temp] = $x_value;


// echo "<script>alert('xvalue:{$x_value}agetemp:{$age[$temp]} x:{$x} temp:{$temp}')</script>";
// if($x_value=="on"){
// $result = mysqli_query($connection," update images set status=1 where id='" . $temp . "'");
// }esle{

// 	$result = mysqli_query($connection," update images set status=0 where not id='" . $temp . "'");
// }

// }

// echo "<script>location.href='index.php'</script>";
// if the 'username' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['userid'])) {
	$userName = $_GET['userid'];

	// write delete query
	  $sql = "update offer set status=0 where 1";

	// Execute the query

	$result = $connection->query($sql);


	$sql = "update offer set status=1 where id='" . $userName . "'";

	// Execute the query

	$result = $connection->query($sql);

  

	if ($result == TRUE) {
		//echo "Record deleted successfully.";
		 echo "<script>location.href='index.php'</script>";
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}







 ?>

