<?php
include "../../config/config.php";

if($_REQUEST['eventid']) {
	$sql = "SELECT userid,count(userid) as num FROM `orders` WHERE event_id='".$_REQUEST['eventid']."' GROUP BY userid";

	$resultset = mysqli_query($connection, $sql) or die("database error:". mysqli_error($connection));	
	$data = array();
	while( $rows = mysqli_fetch_assoc($resultset) ) {
		$data[] = $rows;
	}
	 echo json_encode($data);
         //echo $data;
} else {
	echo 0;	
}
?>