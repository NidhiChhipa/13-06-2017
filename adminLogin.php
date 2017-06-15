<?php 
session_start();





























<!DOCTYPE html>
<html>
<head>
    <title>Admin login</title>
</head>
<body>
<!-- your html form -->
<h2> Login Page</h2>
<form action="adminLogin.php" method="post">
    username:
    <input type="text" name="admin_name">
    <br />
    Password:
    <input type="password" name="admin_password ">
    <br />
    
    <input type="submit" name="submit" value="Submit">
</form>


</body>
</html>




