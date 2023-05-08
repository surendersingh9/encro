<?php

// https://www.youtube.com/watch?v=UAQHAUABc6c


session_start();

if(!isset($_SESSION['userid'])){

    header("location: 1-login.php");
    exit();
  }
  

  include '1-db.php';
  ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Sub Category Page</title>
    <style>
      table, th, td {
  border: 1px solid;
}
    </style>
  </head>
  <body>
  <?php require 'files/_nav.php' ?>
  <div class="container">
   
  <h3>Hello <?php echo $_SESSION['username']; ?>, Update Product Details</h3>

  <?php

if(isset($_GET['id'])){
    include "1-db.php";
  $id = $_GET['id'];

  $sqr = "select * from category where id='$id'";
  $data = mysqli_query($conn, $sqr);
  $qr1 = mysqli_fetch_assoc($data);
  
  
  $sqr1 = "select * from product where id='$id'";
  $data1 = mysqli_query($conn, $sqr1);
  $qr2 = mysqli_fetch_assoc($data1);


 ?>
<form action="1-pro-image.php" method="post">
<div class="modal" tabindex="-1" role="dialog" id="myModal<?php echo $qr2['id'];?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cahnge Product Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="file" name="uploadfile">        
            <img src='<?php echo $qr2['product_image_source']; ?>' height='100px' width='100px'>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="save">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>



  <form action="#" method="post" enctype="multipart/form-data">
  <br><br>
            Upload Product Image: <a href="" data-toggle="modal" data-target="#myModal<?php echo $qr2['id'];?>">Change Image</a>
            
          <br><br>

          <label for="category">Choose Category:</label>
            <select name="parentid">
                      <option selected="yes" disabled="yes">Select Category</option>
                      <?php 
                        include '1-db.php';
                        $get_scat_qry1 = "select * from category";
                        $result1 = mysqli_query($conn, $get_scat_qry1);
                        while ($qr22 = mysqli_fetch_assoc($result1))
                        {
                          ?>
                          <option value="<?php echo $qr22['id'];?>" <?php echo ($qr2['category_id'] == $qr22['id'])?'selected':'';?>><?php echo $qr22['categoryname'];?></option>
                        <?php
                          }
                        ?>
                    
            </select>
  <br><br>

            Product  Name: <input type="text" name="productname" value="<?php echo $qr2['product_name'];?>"><br><br>

    
              Product  Description: <input type="text" name="description" value="<?php echo $qr2['product_discription'];?>"><br><br>

              <input type="submit" name="submit1" value="Update Product"><br><br>
    
  </form>

  <?php
}


  
  if(isset($_POST['submit1'])){

    

    $parentid = $_POST['parentid'];
    $productname = $_POST['productname'];
    $description = $_POST['description'];

    $add_cat_qry = "UPDATE `product` SET `category_id`='$parentid',`product_name`='$productname',`product_discription`='$description' WHERE `id`='$id'";
    $action = mysqli_query($conn, $add_cat_qry);

    if($action){
      echo "Product details has been updated!!!";
      header("location: 1-product.php");
    }
    else{
      echo "error";
    }



  }
  
  ?>
  
   <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   

    <!-- Modal -->
  </body>

  
</html>



