<?php
session_start();
require_once('db.php');
$cartid=$_POST['cart_id'];
$p_id=$_POST['id'];

$_SESSION['c_id']=$_POST['c_email'];
$qty=$_POST['quantity'];


$sql="select * from cart_id where cart_id"=.$cartid;
$query=mysqli_query($con,$sql);
$query_fetch=mysqli_fetch_assoc($query);
$row=mysqli_num_rows($query_fetch);


if ($row>=0)
{
    $insert="INSERT into cart_id(cart_id,c_id) values ('$cartid','$_SESSION['c_id'])";
	$result=mysqli_query($con,$insert);

if ($result)
{
  $select_insert="INSERT into cart_details(cart_id,c_id,p_id,quantity) values('$cartid','$_SESSION','$pid','$qty')";
  $select_query=mysqli_query($con,$select_insert);

 }

}
else
{
     $select_insert="INSERT into cart_details(cart_id,c_id,p_id,quantity) values('$cartid','$_SESSION','$pid','$qty')";
     $select_query=mysqli_query($con,$select_insert);

}

?>


