<?php
session_start();
require_once('db.php');

$sql="select * from categories_id";
$query=mysqli_query($con,$sql);

?>


<!DOCTYPE html>
<html>
<head>

<h2 align="center" style="color:'MidnightBlue'">Admin Panel</h2>
<h3 align="right" style="color: 'MidnightBlue'"><a href="logout1.php">Logout</a></h3>
<style >
		table, th,td {


			font-family:arial,sans-serif;
			    

			
		}
	</style>
</head>
<body>

<hr>

<a href="customers.php"><input type="button" name="customers" value="Customers"></a>

<br><a href="add_category.php"><input type="button" name="addcategory" value="Add Category"></a><br>

<table width="500px" cellpadding="5" cellspacing="5"  border="1">
<tr>
<th>Catergory</th>
<th>Update</th>
<th>Delete</th>
</tr>

<?php 
while($row=mysqli_fetch_assoc($query))
{
?>
<tr>
<td><a href="subcat.php?cat_id=<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></td>
<td><a href="Edit.php?category_id=<?php echo $row['category_id'];?>">Edit</a></td>
<td><a href="catdelete.php?category_id=<?php echo $row['category_id'];?>">Delete</a></td>
</tr>


<?php
}
?>

</table>

</body>
</html>