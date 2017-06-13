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
  $sql="INSERT INTO customers (fname,lname,c_email,c_password,phone,address,state,city,zipcode,country,dob) 
	VALUES ('$fname','$lname','$email','$password','$phone','$add','$state','$city','$zipcode','$country','$dob')"; 
    $query=mysqli_query($con,$sql);
    if ($query) 
    {
    	header('Location:home.php');
    }
    else
    {
    	header('Location:signup.php');
    }
}
else
   {
	//echo "failed to insert";
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

