<?php

require 'db.php';
session_start();

$username=$_POST['admin_name'];
$password=$_POST['admin_password'];
$type=$_POST['admin_type'];
$_SESSION['adminID']=$_POST['admin_name'];


if(isset($_POST['submit']))
{



  $sql="Select * from admin where admin_name='$username', admin_password='$password' and admin_type=$type" ;
      $query=mysqli_query($con,$sql);
     $row=mysqli_num_rows($query);
     if($row==1)
     {   $_SESSION['adminID']=$_POST['admin_name'];
         header('Location:home.php');

     }
    else
    {
      header('Location:admin.php');
    }
    
?>
