<?php
session_start();
require_once('db.php');
require_once('header.php');

$p_id=$_GET['p_id'];
$quantity=$_GET['quantity'];
//$prices=$_POST['p_prices'];
$c_email=$_SESSION['c_id'];


$sql="select * from orders where c_email='".$c_email."'";
$query=mysqli_query($con,$sql);
$row=mysqli_num_rows($query);



if($row>=0)
{
	$insert="INSERT into orders(c_email,p_id) values('$c_email','$p_id')";
	$query1=mysqli_query($con,$insert);


if($query1) 
{		$sql="select * from orders a inner join customers b on a.c_email=b.c_email inner join products c on a.p_id=c.p_id where a.p_id=".$p_id;
       $query=mysqli_query($con,$sql);
		$result=mysqli_fetch_assoc($query);
       


      //$insert1="INSERT into order_details('oid',oname,oaddress,prices,quantity,tax,deliverycharges,Total_prices)"



?>


<!DOCTYPE html>
<html>
<body>

<table>
<tr>
<td>
First Name:<input type="text" name="fname" value="<?php echo $result['fname'];?>"><br>
Last  Name:<input type="text" name="lname" value="<?php echo $result['lname'];?>"><br>
Mobile:<input type="text" name="phone" value="<?php echo $result['phone'];?>"><br>
Address:<input type="textarea" name="address" value="<?php echo $result['address'];?>"><br>
State:<input type="text" name="state" value="<?php echo $result['state'];?>"><br>
City:<input type="text" name="city" value="<?php echo $result['city'];?>"><br>
Zipcode:<input type="text" name="zipcode" value="<?php echo $result['zipcode'];?>"><br>
Country:<input type="text" name="country" value="<?php echo $result['country'];?>"><br>
</td>
<td> <img src="<?php echo $result['p_image']?>"> <br>
	 Product Name:<?php echo $result['p_name']; ?><br>
     Product Brand:<?php echo $result['p_brand']; ?><br>
     Description:<?php echo $result['p_description']; ?><br>
     Price:<?php echo $result['p_prices']:?>
 </td>



 <?php


?>


<td></td>








</tr>









</table>
</body>
</html>

<?php
}
}

?>
