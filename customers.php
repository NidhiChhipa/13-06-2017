<?php 
session_start();
require_once('db.php');

$sql="select * from customers";
$query=mysqli_query($con,$sql);
?>


<!DOCTYPE html>
<html>
<head>
<style >
		table, th,td {
			font-family:arial,sans-serif;
			    

			
		}
	</style>
</head>
<body>
<table border="1">
<tr>
	<th>ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email</th>
	<th>Phone</th>
	<th>DOB</th>
	<th>Address</th>
	<th>State</th>
	<th>City</th>
	<th>Zipcode</th>
	<th>Country</th>

</tr>
	
<?php
while($row=mysqli_fetch_assoc($query))
{
?>
<tr>
<td> <?php echo $row['c_id'] ?> </td>
<td> <?php echo $row['fname'] ?> </td>
<td> <?php echo $row['lname'] ?> </td>
<td> <?php echo $row['c_email'] ?> </td>
<td> <?php echo $row['phone'] ?> </td>
<td> <?php echo $row['dob'] ?> </td>
<td> <?php echo $row['address'] ?> </td>
<td> <?php echo $row['state'] ?> </td>
<td> <?php echo $row['city'] ?> </td>
<td> <?php echo $row['zipcode'] ?> </td>
<td> <?php echo $row['country'] ?> </td>

</tr>

<?php
}
?>

</table>

</body>
</html>
