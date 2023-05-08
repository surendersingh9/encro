<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "encrobytes") or die("Connection Failed!!!");

if(isset($_POST['submit'])){
    $uname = $_POST['username'];
    $pass = $_POST['password'];

   
$result = mysqli_query($conn, "insert into users(username, password) values('$uname', '$pass')");


if($result){
    $_SESSION['msg'] = "Account has been created successfully";
    header("location:login.php");
}
else{
    $_SESSION['msg'] = "Please check al details";
    header("location:signup.php");
}

}

if(isset($_POST['submit1'])){
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $result1 = mysqli_query($conn, "select * from users where username='$uname' and password='$pass'");

    $rows = mysqli_num_rows($result1);
    if($rows > 0 )
    {
        $data = mysqli_fetch_assoc($result1);
    

    if($result1){
        $_SESSION['userid'] = $data['id'];
        $_SESSION['msg'] = "Login successfully";
        header("location: index1.php");
    }
    else{
        $_SESSION['msg'] = "Login fail";
        header("location: login.php");
    }
}
    
}
?>