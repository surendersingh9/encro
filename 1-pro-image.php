<?php


if(isset($_POST['save'])){

  include'1-db.php';
  echo "hii";
  
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "images/".$filename;
  move_uploaded_file($tempname, $folder);

  echo $id = $_POST['id'];

    
    $img_qry = "UPDATE `product` SET `product_image_source`='$folder' WHERE `id`='$id'";
    $imgresult = mysqli_query($conn, $img_qry);

    if($imgresult){
      header("location: 1-pro-edit.php?id=$id");
    }

}
?>