<?php
session_start();
require_once('db.php');
require_once('header.php');

$email=$_POST['c_email'];
$password=$_POST['c_password'];
$_SESSION['c_id']=$_POST['c_email'];



if (isset($_POST['submit']))
{

$sql="Select * from customers_login where c_email='$email' and c_password='$password'";
$query=mysqli_query($con,$sql);

$row=mysqli_num_rows($query);

if($row>0) 
{
	$_SESSION['c_id']=$_POST['c_email'];
	header('Location:home.php');
}
else
{
	header('Location:signin.php');
}

}

?>





<!DOCTYPE html>
<html>
<body>
<h2><caption> SignIn</caption><h2>
<form action="signin.php" method="post"> 
<span style="color:DarkSlateGrey">Email:</span> <input type="text" name="c_email"><br>
<span style="color:DarkSlateGrey">Password:</span> <input type="password" name="c_password"><br>
<input type="submit" name="submit" value="submit">	
</form>
</body>
</html>


