
<?php 
session_start();

require('db.php');
require('header.php');


$select_query="select * from categories_id";
$select_query_execute=mysqli_query($con,$select_query);
?>

<?php 
while ($row=mysqli_fetch_assoc($select_query_execute)) 
{	 
?>
	
<a href="home.php?id=<?php echo $row['category_id']?>"> <span style="color:DarkSlateGrey"> <?php echo $row['category_name']?> </span></a><br>

<?php

 $sql="select * from subcategories a inner join categories_id  b on a.category_id=b.category_id where a.category_id =".$row['category_id'];

$result=mysqli_query($con,$sql); 

while($row=mysqli_fetch_assoc($result))
{ 
?>

<a href="subcategory.php?s_id=<?php echo $row['s_id']?>&category_id=<?php echo $row['category_id']?>"> &nbsp;&nbsp;&nbsp;<?php echo $row['s_name']?><br> 

<?php
}
?>

<?php
}
?>

