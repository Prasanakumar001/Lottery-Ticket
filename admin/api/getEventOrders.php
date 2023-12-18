<?php
include_once("../../config/config.php");

if($_REQUEST['eventid']) {
// 	$sql = "SELECT id, event_id, userid, ticket FROM orders 
// WHERE event_id='".$_REQUEST['eventid']."'";
    $sql="select  o.id,o.userid,o.event_id,o.qty,o.ticket,r.name,r.phonenumber,ev.event_name from orders o INNER JOIN register r on r.id = o.userid INNER JOIN events ev on ev.id=o.event_id where o.event_id='".$_REQUEST['eventid']."'";
	$resultset = mysqli_query($connection, $sql) or die("database error:". mysqli_error($connection));	
	$data = array();
	while( $rows = mysqli_fetch_assoc($resultset) ) {
		$data[] = $rows;
	}
	echo json_encode($data);
	// echo $data;
} else {
	echo 0;	
}
?>




//select wl.ticket_id, wl.event_id ,ev.event_name, et.event_ticket from winnerlist wl INNER JOIN events ev on ev.id=wl.event_id INNER JOIN event_tickets et on et.id = wl.ticket_id;
//select wl.ticket_id, wl.event_id ,ev.event_name, et.event_ticket ,o.userid from winnerlist wl INNER JOIN events ev on ev.id=wl.event_id INNER JOIN event_tickets et on et.id = wl.ticket_id INNER JOIN orders o WHERE wl.event_id=o.event_id and et.event_ticket=o.ticket;
//select wl.ticket_id, wl.event_id ,ev.event_name, et.event_ticket ,o.userid ,r.name from winnerlist wl INNER JOIN events ev on ev.id=wl.event_id INNER JOIN event_tickets et on et.id = wl.ticket_id INNER JOIN orders o INNER JOIN register r on r.id=o.userid WHERE wl.event_id=o.event_id and et.event_ticket=o.ticket;