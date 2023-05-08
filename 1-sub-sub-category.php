<?php

session_start();

if(!isset($_SESSION['userid'])){

    header("location: 1-login.php");
    exit();
  }
  

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
   
  <h3>Hello <?php echo $_SESSION['username']; ?>, You are in Sub Category Page</h3>

  
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Select Category
  </button>
  
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>


  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Parent ID</th>
      <th scope="col">Sub Category ID</th>
      <th scope="col">Sub Category Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php
  include "1-db.php";
 
  $get_scat_qry = "select * from subsubcategory";
  $result = mysqli_query($conn, $get_scat_qry);
  while ($qr1 = mysqli_fetch_assoc($result))
  {

  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $qr1['id'];?></th>
      <th scope="row"><?php echo $qr1['parentid'];?></th>
      <td><?php echo $qr1['subcategory_id'];?></td>
      <td><?php echo $qr1['subsubcategory_name'];?></td>
      <td><a href=""><a href="1-sscat-del.php?id=<?php echo $qr1['id'];?>">Delete</a></td>
    </tr>
    
<?php
  }
  ?>
  </tbody>
</table>


<a href="" data-toggle="modal" data-target="#myModal">Add Sub Category</a></td>

<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Sub Category</h4>
            </div>
            <div class="modal-body">
            <form action="add-sub-cat.php" method="post">
            Parent ID: <select name="parentid">
              <option selected="yes" disabled="yes">Select Parent ID</option>
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
            
          </select><br>
            
            <!-- <input type="number" name="parentid" value=""><br> -->
            Sub Category Name: <input type="text" name="subcat_name" value="">
              
              <input type="submit" name="add_subcat">

            </form> 

            
            </div>
        </div>
        </div>
</div>






   <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <div>

    <!-- Modal -->
  </body>

  
</html>

