<?php
session_start();

require_once('db.php');

$admin_name=$_POST['admin_name'];
$admin_password=$_POST['admin_password'];
$admin_type=$_POST['admin_type'];

if (isset($_POST['submit']))
{
    $nameErr=$passErr=$typeErr=$admin_name=$admin_password=$admin_type="";

if (empty($_POST['admin_name'])) 
{
  $nameErr=" Name is required<br>";
}
else
{
 $admin_name=$_POST['admin_name'];
if (!preg_match("/^[a-zA-Z ]*$/",$admin_name))
{
  $nameErr = "Only letters and white space allowed <br>";
}
        
}

   
if (empty($_POST['admin_password'])) 
{
  $passErr=" Password is required<br>";
}
else
{
 $admin_password=$_POST['admin_password'];
if (!preg_match("/^[a-zA-Z ]*$/",$admin_password))
{
  $passErr = "Only letters and white space allowed <br>";
}
        
}

if (empty($_POST['admin_type'])) 
{
  $typeErr=" Admin type is required<br>";
}
else
{
 $admin_type=$_POST['admin_type'];
if (!preg_match("/^[0-9]*$/",$admin_type))
{
  $typeErr = "Only Numbers <br>";
}
        
}

}


if (!empty($nameErr) || !empty($passErr) || !empty($typeErr))
{
    
}
else 
{
 $sql="INSERT into admin_registeration(admin_name,admin_password,admin_type)
  VALUES('$admin_name','$admin_password','$admin_type')";
  $query=mysqli_query($con,$sql);
  if ($query)
  {
      header('Location:admin_dashboard.php');
  }
 else
 {
   // header('Location:admin.php');
 }


}


?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<!-- your html form -->
<h3>Admin Registration</h3>
<form action="admin.php" method="post" style="color:'MidnightBlue'">
    Username:
    <input type="text" name="admin_name"><span class="error"><?php echo $nameErr;?>
    <br />
    Password:
    <input type="password" name="admin_password "><span class="error"><?php echo $passErr;?>
    <br />
    Admin Type:
    <input type="text" name="admin_type"><span class="error"><?php echo $typeErr;?>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>


</body>
</html>




