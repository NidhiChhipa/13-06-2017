<?php
session_start();
require_once('db.php');


$pid=$_POST['p_id'];
$qty=$_POST['quantity'];

$c_email=$_SESSION['c_id'];


$sql="select * from cart_id where c_email='".$c_email."'";
$query=mysqli_query($con,$sql);
$result=mysqli_fetch_assoc($query);

$row=mysqli_num_rows($query);


if($row<=0)                               
{
 echo  $insert="INSERT into cart_id (c_email) values ('$c_email')";
  echo $result1=mysqli_query($con,$insert);
  //$result_fetch=mysqli_fetch_assoc($result1);
 if($result1)
{
   $sql1="select cart_id from cart_id where c_email='".$c_email."'";
   $query1=mysqli_query($con,$sql1);
   $row1=mysqli_fetch_assoc($query1);

   $select_insert="INSERT into cart_details (cart_id,c_email,p_id,quantity) values('".$row1['cart_id']."','$c_email','$pid','$qty')";

    $select_query=mysqli_query($con,$select_insert);  
 } 

}


else
{  
   $sql1="select cart_id from cart_id where c_email='".$c_email."'";
   $query1=mysqli_query($con,$sql1);
   $row1=mysqli_fetch_assoc($query1);

   $select_insert="INSERT into cart_details (cart_id,c_email,p_id,quantity) values('".$row1['cart_id']."','$c_email','$pid','$qty')";

   $select_query=mysqli_query($con,$select_insert);  
}

?>


