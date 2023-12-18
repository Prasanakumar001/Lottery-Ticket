<?php 
include "../../config/config.php";


// if the 'username' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['userid'])) {
	$userName = $_GET['userid'];

	// write delete query
	$sql = "DELETE FROM `editor` WHERE `id`='$userName'";

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