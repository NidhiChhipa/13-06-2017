<?php
session_start();
require_once('db.php');


$cat_name=$_POST['category_name'];


if(isset($_POST['submit']))
{	
$sql="INSERT into categories_id(category_name) VALUES('$cat_name')";
$query=mysqli_query($con,$sql);
if ($query) 
{
  header('Location:admin_dashboard.php');
}
else
{}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form>
	
Category:<input type="text" name="category_name">
<input type="submit" name="submit" value="Submit">

</form>



</body>
</html>