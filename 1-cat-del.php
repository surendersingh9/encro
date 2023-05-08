<?php
include'1-db.php';

if(isset($_GET['id']))
{
$category_id = $_GET['id'];
$result = mysqli_query($conn,"DELETE FROM subcategory where parentid='$category_id'");
$result1 = mysqli_query($conn,"DELETE FROM category where id='$category_id'");

if($result)
{
    
        header("location: 1-category.php");
}

}
?>