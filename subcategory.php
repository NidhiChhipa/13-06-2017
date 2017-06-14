<?php
session_start();
require_once('db.php');
require_once('header.php');


$s_id=$_GET['s_id'];
$category_id=$_GET['category_id'];

$sql="Select * from subcategories a inner join products b on a.s_id=b.s_id where a.s_id=".$s_id; 
$query=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($query))
{
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<a href="products.php?s_id=<?php echo $s_id ?>&p_id=<?php echo $row['p_id'];?>"><img src="<?php echo $row['p_image'];?>"></a>
<?php echo $row['s_name'];?>

</body>
</html>









<?php
}	
?>
