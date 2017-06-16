<?php
session_start();
require_once('db.php');


$p_id=$_GET['p_id'];


$sql1="delete from cart_details where p_id=".$p_id ; 
$query1=mysqli_query($con,$sql1);

if ($query1) 
{
	echo "Deleted";
	header('Location:cart_view.php');	
}	
else
{
	echo "Not deleted";
}
?>
