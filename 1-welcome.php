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
    <title>Welcome Page</title>
    <style>
      table, th, td {
  border: 1px solid;
}
    </style>
  </head>
  <body>
  <?php require 'files/_nav.php' ?>
  <div class="container">
    
    <h3>Hello <?php echo $_SESSION['username']; ?>, You are in Welcome Page</h3>
    <h4>List of Data </h4>
    <table sborder="1">
      <tr>
        <td><b>ID</b></td>
       
        <td><b>Username</b></td>
        <td><b>Password</b></td>
        <td><b>Date & Time</b></td>
        <td><b>Edit</b></td>
        <td><b>Delete</b></td>
      </tr>
  <?php

if(isset($_SESSION['userid']))
{
  include '1-db.php';
  include "1-wel-del.php";
  $query1 = mysqli_query($conn, "select * from users");
  while ($qq1 = mysqli_fetch_assoc($query1))
  {

  ?>

    <tr>
      <td><?php echo $qq1['id'];?></td>
      <td><?php echo $qq1['username'];?></td>
      <td><?php echo $qq1['password'];?></td>
      <td><?php echo $qq1['date'];?></td>
      <td><a href="" data-toggle="modal" data-target="#myModal<?php echo $qq1['id'];?>">Edit</a></td>
      <td><a href="1-wel-del.php?id=<?php echo $qq1['id'];?>">Delete</a></td>

      <div class="modal fade" id="myModal<?php echo $qq1['id'];?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
            <form action="1-welcome.php" method="post">
              <input type="hidden" name="id" value="<?php echo $qq1['id'];?>">
              <input type="text" name="username" value="<?php echo $qq1['username'];?>">
              <input type="text" name="password" value="<?php echo $qq1['password'];?>">
              <input type="submit" name="add">

            </form> 

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>
<?php


  }
  
}
  ?>

    </table>
<br>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <div>

    <!-- Modal -->
  </body>

  
</html>


<?php

if(isset($_POST['add']))
{
    $id = $_POST['id'];
   $name = $_POST['username'];
   $pass = $_POST['password'];

   $result = mysqli_query($conn,"update users set username='$name',password ='$pass' where id ='$id'");
}

?>