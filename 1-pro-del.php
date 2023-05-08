<?php

if(isset($_GET['id'])){

    include '1-db.php';
    $id = $_GET['id'];
    $delqry = "delete from product where id=$id";
    $result = mysqli_query($conn, $delqry);

    if($result){
        header("location:1-product.php");
    }

}


?>