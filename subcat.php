<?php
session_start();
require_once('db.php');


$category_id=$_GET['category_id'];

$sql="select * from subcategories where category_id=".$category_id;
$query=mysqli_query($con,$sql);

?>


<!DOCTYPE html>
<html>
<head>

<h2 align="center" style="color:'MidnightBlue'">SubCategories</h2>

<style >
		table, th,td {


			font-family:arial,sans-serif;
			    

			
		}
	</style>
</head>
<body>
<a href="adminlogout.php" align="right" style="color:'MidnightBlue'">Logout</a> 
<hr>

<table width="1000px" cellpadding="5" cellspacing="5"  border="1">
<tr>
<th>SubCatergory</th>
<th>Update</th>
<th>Delete</th>
</tr>

<?php 
while($row=mysqli_fetch_assoc($query))
{
?>

<tr>
<td><a href="admin_product.php?s_id=<?php echo $row['s_id'];?>"><?php echo $row['s_name'];?></td>

<td><a href="Edit.php?s_id=<?php echo $row['s_id'];?>">Edit</a></td>
<td><a href="delete1.php?s_id=<?php echo $row['s_id'];?>">Delete</a></td>
</tr>

<?php
}
?>

</table>

</body>
</html>
