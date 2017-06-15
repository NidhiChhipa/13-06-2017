<?php


session_start();
require_once('db.php');
require_once('header.php');

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['c_email'];
$password=$_POST['c_password'];
$phone=$_POST['phone'];
$add=$_POST['address'];
$state=$_POST['state'];
$city=$_POST['city'];
$zipcode=$_POST['zipcode'];
$country=$_POST['country'];
$dob=$_POST['dob'];

if(isset($_POST['submit']))
{
 $fnameErr=$lnameErr=$emailErr=$passErr=$phoneErr=$addErr=$stateErr=$cityErr=$zipErr=$countryErr=$dobErr=$fname=$lname=$email=$password=$phone=$add=$state=$city=$zipcode=$country=$dob="";

if (empty($_POST['fname'])) {
  $fnameErr="First name is required<br>";
}
else{ $fname=$_POST['fname'];
if (!preg_match("/^[a-zA-Z ]*$/",$fname))
{
 $fnameErr = "Only letters and white space allowed <br>";
}
}

if (empty($_POST['lname'])) {
  $lnameErr="Last name is required<br>";
}
else{ $lname=$_POST['lname'];
if (!preg_match("/^[a-zA-Z ]*$/",$lname))
{
 $lnameErr = "Only letters and white space allowed <br>";
}
}

if (empty($_POST["c_email"]))
{
 $emailErr = "Email is required <br>";
} 
else
{
$email = $_POST["c_email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
 $emailErr = "Invalid email format <br>";
 }
 }

if (empty($_POST["c_password"]))
{
 $passErr="Password is required <br>";  
}
else
{
  $password=$_POST['c_password'];
if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["pass"]) === 0)
{  
$passErr = "Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit <br>";
}

}  

if(empty($_POST['phone']))
{
 $phoneErr="Enter mobile number <br>";
}
else
{ 
$phone=$_POST['phone'];
if(!preg_match("/^\d{10}$/",$phone))
{
$phoneErr="Invalid number <br>";
}
}

if (empty($_POST['address']))
{
$addErr="Address is required <br>";
}
else
{
$add = $_POST["address"]; 
}

if (empty($_POST['state']))
{
$stateErr="state is required <br>";
}
else
{
$state = $_POST["state"]; 
}

if (empty($_POST['city']))
{
$cityErr="city is required <br>";
}
else
{
$city = $_POST["city"]; 
}

if (empty($_POST['zipcode']))
{
$zipErr="zipcode is required <br>";
}
else
{
$zipcode = $_POST["zipcode"]; 
}

if (empty($_POST['country']))
{
$countryErr="country is required <br>";
}
else
{
$country = $_POST["country"]; 
}


if (empty($_POST['dob']))
{
$dobErr="DOB is required <br>";
}
else 
{
$dob=$_POST['dob'];
if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$dob))
{
 $dobErr = "Invalid DOB <br>";
}
} 

 }
 
 if (!empty($fnameErr) || !empty($lnameErr) || !empty($emailErr) || !empty($passErr) || !empty($phoneErr) || !empty($addErr) || !empty($stateErr) || !empty($cityErr) || !empty($zipErr) || !empty($countryErr) || !empty($dobErr)) {
  
 }
else
{
  $sql="INSERT INTO customers (fname,lname,c_email,c_password,phone,address,state,city,zipcode,country,dob) 
	VALUES ('$fname','$lname','$email','$password','$phone','$add','$state','$city','$zipcode','$country','$dob')"; 
    $query=mysqli_query($con,$sql);
    if ($query) 
    {
    	header('Location:home.php');
    }
    else
    {
    	//header('Location:signup.php');
    }
}


?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$( function() {
$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
} );
</script>
</head>



<body>
<caption align="center"> <Span style="color:'DarkSlateGrey'"> SignUp </Span></caption>
<form action="signup.php" method="post">

First Name:<input type="text" name="fname"><br>
Last Name:<input type="text" name="lname"><br>
Email:<input type="text" name="c_email"><br>
Password:<input type="password" name="c_password"><br>
Mobile:<input type="text" name="phone">	<br>
Address:<input type="textarea" name="address"><br>
State:<input type="text" name="state"><br>
City:<input type="text" name="city"><br>
Zipcode:<input type="text" name="zipcode"><br>
Country:<input type="text" name="country"><br>
DOB:<input type="text" id="datepicker" name="dob"><br>
Submit:<input type="submit" name="submit" value="submit">

</form>
</body>
</html>

<?php
require_once('footer.php');
?>

