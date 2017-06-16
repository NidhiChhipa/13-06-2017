<?php
session_start();
require_once('db.php');

$s_id=$_GET['s_id'];

$sql="select * from products where s_id=".$s_id;
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
<a href="addproduct.php"><input type="button" name="addproduct" value="ADD PRODUCT"></a>


<table border="1">
	<tr>
	<th>PID</th>
	<th>P_Name</th>
	<th>P_Brand</th>
	<th>P_Description</th>
	<th>P_Prices</th>
	<th>P_Image</th>
    </tr>
<?php
while($row=mysqli_fetch_assoc($query))
{
?>
<tr>
<td> <?php echo $row['p_id'] ?> </td>
<td> <?php echo $row['p_name'] ?> </td>
<td> <?php echo $row['p_brand'] ?> </td>
<td> <?php echo $row['p_description'] ?> </td>
<td> <?php echo $row['p_prices'] ?> </td>
<td> <img src="<?php echo $row['p_image'] ?>"> </td>
</tr>

<?php
}
?>
</table>

</body>
</html>

