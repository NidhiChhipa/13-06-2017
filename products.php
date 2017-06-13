<?php 
session_start();

require_once('db.php');
require_once('header.php');

$s_id=$_GET['id'];
$category_id=$_GET['category_id'];

$sql="Select * from products a inner join categories b on a.category_id = b.category_id inner join subcategories c on a.s_id = c.s_id where c.s_id = ".$s_id;

$result=mysqli_query($con,$sql);


while($row=mysqli_fetch_assoc($result))
{
?>

<!DOCTYPE html>
<html>
<head>

<script >

    $("button").click(function(){

	var quantity=$(#quantity).val;
    var category_id=<?php echo $row['category_id']; ?>;
    var p_id<?php echo $row['p_id']; ?>;

    $.ajax({
    	url:"cart.php",
    	type:"POST",
    	data:{category_id:category_id,p_id:p_id,quantity:quantity},

    	success : function(result){
    		$("#div").html(result)


    	},
    	error : function(){


    	}

    	});



    });

</script>
</head>

<body>
<div>
</div>

<table>
<tr>
<td> <img src="<?php echo $row['p_image']?>"> </td>
<td> Product Name:<?php echo $row['p_name']?><br>
     Product Brand:<?php echo $row['p_brand']?><br>
     Description:<?php echo $row['p_description']?><br>
     Quantity:<input type="text" name="quantity" id="quantity"><br>
     Price:<?php echo $row['p_prices']?> </td>

<td><br><a href="home.php"><input type="button" value="Buy"></a><br><input type="button"  value="Add to cart"></a></td>
</tr>
</table>
</body>
</html>


<?php
}
?>



<?php 
require('footer.php');
?>


