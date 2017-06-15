<?php
require_once('db.php');
require_once('header.php');

$c_email=$_SESSION['c_id'];
$cart_id=$_GET['cart_id'];

 $sql="select * from cart_id where c_email='".$c_email."'";
$query=mysqli_query($con,$sql);
$row=mysqli_num_rows($query);
 



if($row==1) 
{
 $sql1="select cart_id from cart_id where c_email='".$c_email."'";
 $query1=mysqli_query($con,$sql1);
$result=mysqli_fetch_assoc($query1);


$sql2="SELECT * from cart_details a INNER JOIN products b on a.p_id=b.p_id where a.cart_id=".$result['cart_id'];


$query2=mysqli_query($con,$sql2);



while ($row2=mysqli_fetch_assoc($query2)) 
{
?>


<!DOCTYPE html>
<html>
<head>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!--
<script >
$(document).ready(function()
{

    $("#button").click(function(){

    var p_id=<?php echo $row2['p_id'];?>;



    $.ajax({
        url:"delete.php",
        type:"POST",
        data:{p_id:p_id},

        success : function(result){
             alert("deleted from cart");
            $("#div").html(result);
        },
        error : function(){
            alert("error");
        }

        });
    });
   }); 
</script>
-->

</head>

<body>
<h3 id="div" name="div"></h3>

<table>
<tr>
<td> <img src="<?php echo $row2['p_image']?>"> </td>
<td> Product Name:<?php echo $row2['p_name']; ?><br>
     Product Brand:<?php echo $row2['p_brand']; ?><br>
     Description:<?php echo $row2['p_description']; ?><br>
     Price:<?php echo $row2['p_prices']?> </td>
     <td><br><a href="delete.php?p_id=<?php echo $row2['p_id'];?>">Delete</a></td>  
</tr>
</table>
</body>
</html>  

<?php
}
?>


<?php

}
else
{
	echo "NO entry";
}
?>


