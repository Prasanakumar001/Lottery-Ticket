<?php
include "../config/config.php";
if($_REQUEST['eventid'])
{
$eventid=$_REQUEST['eventid'];
$sql="select id,event_ticket,event_id from event_tickets where event_id='".$_REQUEST['eventid']."'";
echo $sql;
$resultset = mysqli_query($connection, $sql);
if(mysqli_num_rows($resultset)>0){

//echo "<input type='text' name='event_id' value='".$eventid."'/>'";

while( $row = mysqli_fetch_assoc($resultset) ) 
{
$id=$row['id'];
$data=$row['event_ticket'];
echo '<option value="'.$id.'">'.$data.'</option>';
}
}

}

?>