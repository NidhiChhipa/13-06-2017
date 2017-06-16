<?php 
session_start();
require_once('db.php');

$username=$_POST['admin_name'];
$password=$_POST['admin_password'];

$_SESSION['adminID']=$_POST['admin_name'];


/*if(isset($_POST['Submit']))
{
    $nameErr=$passErr=$username=$password="";


if (empty($_POST['admin_name']))
{
    $nameErr="Admin name is required <br>";
}
else{   

    $username = $_POST["admin_name"];
    if (!preg_match("/^[a-zA-Z ]*$/",$username))
     {
        $nameErr = "Only letters and white space allowed <br>";
     }
    }


  if (empty($_POST['admin_password']))
   {
    $passErr="Password is required <br>";
   }
   else
    {
      $password=$_POST["admin_password"];
    } 


}

if(!empty($nameErr)|| !empty($passErr))
{

}
else
{
}
*/

  $sql="Select * from admin_login where admin_name='$username' and admin_password='$password'" ;
  
      $query=mysqli_query($con,$sql);
     $row=mysqli_num_rows($query);
    
     if($row>0)
     {  

         header('Location:admin_dashboard.php');

     }
    else
    {
      //header('Location:admin.php');
    }


?>


<!DOCTYPE html>
<html>
<h2 style="color:'MidnightBlue'"> Admin login</h2>
<body>
<!-- your html form -->


<form action="adminLogin.php" method="post">
    Admin name:
    <input type="text" name="admin_name"><span class="error"><?php echo $nameErr?></span>
    <br />
    Password:
    <input type="password" name="admin_password"><span class="error"><?php echo $passErr?></span>
    <br />
    <br />
    
    <input type="submit" name="submit" value="Submit">
</form>


</body>
</html>




