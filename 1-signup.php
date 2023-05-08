<?php

session_start();

 if(isset($_SESSION['userid'])){
  header("location: 1-welcome.php");
}

else{

 $showAlert = false;
 $showError = false;

if(isset($_POST['signup'])){

 
  include '1-db.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if($password == $cpassword){
    $sqlin = "INSERT INTO `users`(`username`, `password`) VALUES ('$username','$password')";
    $result = mysqli_query($conn, $sqlin);

    if($result){
      $showAlert = true;
    }
    
  }
  else{
    $showError = true;
  }
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

    <title>Signup Page</title>
  </head>
  <body>
    <?php require 'files/_nav.php' ?>

    <?php
    if($showAlert){
      echo '
    <div class="alert alert-success" role="alert">
      <strong>Message </strong> Your account is created, now you can login!!!
    </div>
    ';
  }

  if($showError){
    echo '
  <div class="alert alert-danger" role="alert">
    <strong>Error </strong> Check your Password & try Again!!!
  </div>
  ';
}
    ?>
    <div class="container">
    <h1 class="text-center">Signup to our website</h1>
    <form action="1-signup.php" method="post">
  <div class="mb-3 col-md-6">
    <label for="username" class="form-label">User Name</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3 col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3 col-md-6">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="cpassword" class="form-control" id="rpassword" name="cpassword">
    <div id="emailHelp" class="form-text">Make sure password is same</div>
  </div>
  
  <button type="submit" name="signup" class="btn btn-primary">Signup</button>
  <button type="clear" name="clear" class="btn btn-primary" onclick="clearText();"> Clear</button>
</form>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
  function clearText()  
  {
      document.getElementById('username').value = "";
      document.getElementById('password').value = "";
  }  
  
  </script>
</html>
<?php
}
?>