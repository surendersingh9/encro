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
    <title>Category Page</title>
    <style>
      table, th, td {
  border: 1px solid;
}
    </style>
  </head>
  <body>
  <?php require 'files/_nav.php' ?>
  <div class="container">
    
  <h3>Hello <?php echo $_SESSION['username']; ?>, You are in Category Page</h3>
  
  

    
 
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category Name</th>
      <th scope="col"> Sub Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php
  include "1-db.php";
 
  $get_cat_qry = "select * from category";
  $result = mysqli_query($conn, $get_cat_qry);
  while ($qr1 = mysqli_fetch_assoc($result))
  {

  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $qr1['id'];?></th>
      <td><?php echo $qr1['categoryname'];?></td>
      <td><a href="1-sub-category.php?id=<?php echo $qr1['id']; ?>">View Sub Category</a></td>
      <td><a href="del-cat.php?id=<?php echo $qr1['id'];?>">Edit</a> | <a href="1-cat-del.php?id=<?php echo $qr1['id'];?>">Delete</a></td>
    </tr>
    
<?php
  }
  ?>
  </tbody>
</table>


<a href="" data-toggle="modal" data-target="#myModal">Add Category</a></td>
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
            <form action="1-category.php" method="post">
              <input type="text" name="cat_name" value="">
              
              <input type="submit" name="add_cat">

            </form> 
    <?php
        include '1-db.php';

        if(isset($_POST['add_cat'])){

           $catname = $_POST['cat_name'];
          $insert_cat_qry = "insert into category(categoryname) values('$catname')";

          $action = mysqli_query($conn,$insert_cat_qry );

          if($action){
            header("location: 1-category.php");
          }
        }

    ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
      </div>



      <!--- Model for Edit-->
      <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Category</h4>
            </div>
            <div class="modal-body">
            <form action="1-category.php" method="get">
            <input type="hidden" name="id" value="">
              <input type="text" name="cat_name" value="">
              
              <input type="submit" name="update_cat">

            </form> 
    <?php
        include '1-db.php';

        if(isset($_POST['update_cat'])){

          
           $catname = $_POST['cat_name'];
          $update_cat_qry = "update category set categoryname='$catname' where id ='$id'";

          $action = mysqli_query($conn,$update_cat_qry );

          if($action){
            header("location: 1-category.php");
          }
        }

    ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
   
    <!-- Modal -->
  </body>

  

  </html>


