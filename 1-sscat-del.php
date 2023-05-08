<?php
include'1-db.php';

if(isset($_GET['id']))
{
$id = $_GET['id'];
$result = mysqli_query($conn,"DELETE FROM subsubcategory where id='$id'");

if($result)
{
    
        header("location: 1-sub-sub-category.php");
}

}




?>