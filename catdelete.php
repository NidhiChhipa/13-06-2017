<?php
session_start();

require_once('db.php');

$category_id=$_POST['category_id'];

$sql="delete from categories_id where category_id=".$category_id;
$query=mysqli_query($con,$sql);
if ($query)
{
   echo "Deleted";
   header('Location:admin_dashboard.php');
}
else
{
	echo "Not Deleted";
}

?>
