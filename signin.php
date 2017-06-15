<?php
session_start();
require_once('db.php');
require_once('header.php');

$email=$_POST['c_email'];
$password=$_POST['c_password'];
$_SESSION['c_id']=$_POST['c_email'];



if (isset($_POST['submit']))
{
	$emailErr=$passErr=$email=$password="";


if (empty($_POST['c_email']))
{
	$emailErr="Email is required <br>";
}
else
{	
$email = $_POST["c_email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
$emailErr = "Invalid email format <br>";
}
}

if (empty($_POST['c_password']))
{
	$passErr="Password is required <br>";
}

else{
$password=$_POST['c_password'];
}


}


if (!empty($emailErr || !empty($passErr)))
{

}

else{

$sql="Select * from customers_login where c_email='$email' and c_password='$password'";
$query=mysqli_query($con,$sql);

$row=mysqli_num_rows($query);

if($row>0) 
 {
	header('Location:home.php');
 }

else
{
	///echo"signup first";
}


}

?>





<!DOCTYPE html>
<html>
<body>
<h2><caption> SignIn</caption><h2>
<form action="signin.php" method="post"> 
<span style="color:DarkSlateGrey">Email:</span> <input type="text" name="c_email"><span class="error"><?php echo $emailErr;?> </span><br>
<span style="color:DarkSlateGrey">Password:</span> <input type="password" name="c_password"><span class="error"><?php echo $passErr;?> </span><br>
<input type="submit" name="submit" value="submit">	
</form>
</body>
</html>


