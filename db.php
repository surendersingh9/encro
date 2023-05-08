<?php
session_start();
$conn = mysqli_connect("localhost","root","","encrobytes") or die("connection error");
if(isset($_POST['add']))
{
    $id = $_SESSION['userid'];
   $name = $_POST['name'];
   $pass = $_POST['password'];

   $result = mysqli_query($conn,"update users set username ='$name',password ='$pass' where id ='$id'");
//    $result = mysqli_query($conn,"select * admin where name ='$name' and password ='$pass'");
   if($result)
   {
       $_SESSION['msg'] = "updated!!";
    //    print_r($_SESSION);
        header("location: index1.php");
    }
    else{
        $_SESSION['msg'] = "fail!!";
       header("location: index1.php");
   }
}
// mysqli_close($conn);
$id = $_GET['id'];
$result = mysqli_query($conn,"DELETE FROM users where id='$id'");
if($result)
{
    $_SESSION['msg'] = "updated!!";
    //    print_r($_SESSION);
        header("location: index1.php");
}
else{
    $_SESSION['msg'] = "fail!!";
   header("location: index1.php");
}
?>