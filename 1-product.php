<?php

// https://www.youtube.com/watch?v=5IZV6eYui28
session_start();

if(!isset($_SESSION['userid'])){

    header("location: 1-login.php");
    exit();
  }
  

 error_reporting(0); ?>

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
   
  <h3>Hello <?php echo $_SESSION['username']; ?>, You are in Products Page</h3>

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Category ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Description</th>
      <th scope="col">Product Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php

      include '1-db.php';

      $get_pro_data = "select * from product";
      $result = mysqli_query($conn, $get_pro_data);
      while ($pr = mysqli_fetch_assoc($result))
      {

      ?>
    <tr>
      <td><?php echo $pr['id']; ?></td>
      <td><?php echo $pr['category_id']; ?></td>
      <td><?php echo $pr['product_name']; ?></td>
      <td><?php echo $pr['product_discription']; ?></td>
      <td><img src='<?php echo $pr['product_image_source']; ?>' height='100px' width='100px'> </td>
      <td><a href="1-pro-edit.php?id=<?php echo $pr['id']; ?>">Edit</a> | <a href="1-pro-del.php?id=<?php echo $pr['id'];?>">Delete</a></td>
    </tr>

    <?php
      }
      ?>
  
  </tbody>
  
    </table>


   <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    

    <!-- Modal -->

    
  <a href="1-add-product.php" >Add Product</a></td>
  </body>

</html>


