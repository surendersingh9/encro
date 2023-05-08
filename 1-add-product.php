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
   
  <h3>Hello <?php echo $_SESSION['username']; ?>, You are in Products Page</h3>


  <form action="#" method="post" enctype="multipart/form-data">
  <br><br>
            Upload Product Image: <input type="file" name="uploadfile"> 

            
              
              
          <br><br>
          <label for="category">Choose Category:</label>
            <select name="parentid">
                      <option selected="yes" disabled="yes">Select Category</option>
                      <?php 
                        include '1-db.php';
                        $get_scat_qry1 = "select * from category";
                        $result1 = mysqli_query($conn, $get_scat_qry1);
                        while ($qr2 = mysqli_fetch_assoc($result1))
                        {
                          ?>
                          <option value="<?php echo $qr2['id'];?>"><?php echo $qr2['categoryname'];?></option>
                        <?php
                          }
                        ?>
                    
            </select>
  <br><br>

            Product  Name: <input type="text" name="productname"><br><br>

    
              Product  Description: <input type="text" name="description"><br><br>

              <input type="submit" name="submit1" value="Add Product"><br><br>
    
  </form>

  <?php

// 
// if(isset($_POST['submit'])){
// $filename = $_FILES["uploadfile"]["name"];
// $tempname = $_FILES["uploadfile"]["tmp_name"];
// $folder = "images/".$filename;

// move_uploaded_file($tempname, $folder);

// echo "<img src='$folder' height='100px' width='100px'>";
// }

  
  if(isset($_POST['submit1'])){

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$filename;
    move_uploaded_file($tempname, $folder);


    $parentid = $_POST['parentid'];
    $productname = $_POST['productname'];
    $description = $_POST['description'];

    $add_cat_qry = "INSERT INTO `product`(`category_id`, `product_name`, `product_image_source`, `product_discription`) VALUES ('$parentid','$productname','$folder','$description')";
    $action = mysqli_query($conn, $add_cat_qry);

    if($action){
      echo "Product has been submitted!!!";
      header("location: 1-product.php");
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



