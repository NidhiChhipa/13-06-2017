<?php
session_start();
if(array_key_exists('c_id', $_SESSION))
{
$login="0";
}
else
{
$login="1";
}

?>
<html>
	<head>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body>
		<table width="1200px" height="150px" cellpadding="5" cellspacing="5" border="0" align="center" bgcolor="MidnightBlue">
			<tr>
				<td width="250" align="center">
						<a style='text-decoration:none; color:white;' href="home.php"><img src="web/logo.jpg" width="250" height="100"></a>
				</td>
				<td width="850" align="center">
						<input type="text" name="search" id="search" placeholder="Search" size="75"/>
				</td>
				<td width="250" align="center">
					<ul type="none" style="font-size:20px; color:white";>
						<li>

						<?php
					
						if($login=="1")
						{								
							echo "<li><a href='signin.php' style='text-decoration:none; color:white';>Login</a></li>";
							echo "<li><a href='signup.php' style='text-decoration:none; color:white';>Signup</a></li>";
						}
						else
						{
							if(array_key_exists('c_id', $_SESSION))
							{
							echo "<li>Welcome ".$_SESSION['c_id']."</li>";
							echo "<a href='logout.php' style='text-decoration:none; color:white';>logout</a>";
							echo "<br>";
							echo "<a href='home.php'style='text-decoration:none; color:white';>My Account</a>";
							}
						}
						?>
						</li>
						<li>&nbsp;</li>
						<li><a style='text-decoration:none; color:white;' href="cart_view.php">View Cart</a></li>
					</ul>
				</td>
			</tr>
		</table>
