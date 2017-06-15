<?php 
session_start();

require_once('db.php');
require_once('header.php');

$s_id=$_GET['s_id'];
$p_id=$_GET['p_id'];

$c_email=$_SESSION['c_id'];





$sql="Select * from products a inner join subcategories b on a.s_id=b.s_id where a.p_id=".$p_id;

$result=mysqli_query($con,$sql);


while($row=mysqli_fetch_assoc($result))
{
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script >

$(document).ready(function()
{

    $("#button").click(function(){

    var quantity=$("#quantity").val();
    var p_id=<?php echo $p_id;?>;
    $.ajax({
        url:"cart.php",
        type:"POST",
        data:{p_id:p_id,quantity:quantity},

        success : function(result){
             alert("added to cart");
            $("#div").html(result);
        },
        error : function(){
            alert("error");
        }

        });
    });
   }); 
</script>

<script>
    $(document).ready(function()
    {
        $("#button1").click(function(){
        
        var quantity=$("#quantity").val();
        var  p_prices=<?php echo $row['p_prices'];?>;
        $.ajax({
          url:"buy.php",
          type:"POST",
          data:{quantity:quantity,p_prices:p_prices},

          success: function(result){
                $("#div1").html(result);
          }, 
          error: function(){
            alert("error");
          }

        });


        });
    
    });

</script>


</head>

<body>
<h3 id="div" name="div"></h3>
<h3 id="div1" name="div1"></h3>
<table>
<tr>
<td> <img src="<?php echo $row['p_image']?>"> </td>
<td> Product Name:<?php echo $row['p_name']?><br>
     Product Brand:<?php echo $row['p_brand']?><br>
     Description:<?php echo $row['p_description']?><br>
     Quantity:<input type="text" name="quantity" id="quantity"><br>
     Price:<?php echo $row['p_prices']?> </td>

<td><br><a href="buy.php?p_id=<?php echo $p_id ?>"><input type="button" value="Buy"></a><br><input type="button" id="button"  value="Add to cart"></a></td>







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


