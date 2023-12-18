<?php 
session_start();
include '../../config/config.php';?>
<?php
//session_start();

//$result = mysqli_query($connection," update  set include=0,stock=0 where 1");
foreach($_POST as $x => $x_value) {
$temp = str_replace("_"," ","$x");

$age[$temp] = $x_value;


echo "<script>alert('xvalue:{$x_value}agetemp:{$age[$temp]} x:{$x} temp:{$temp}')</script>";
if($x_value=="on"){
$result = mysqli_query($connection," update images set status=1 where id='" . $temp . "'");
}esle{
	$result = mysqli_query($connection," update images set status=0 where not id='" . $temp . "'");
}

}

echo "<script>location.href='../logo/index.php'</script>";







 ?>

