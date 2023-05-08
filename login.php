<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login Form</h2>
    <p>Enter your login details</p>
<form method="post" action="login.php">
Username : <input type="text" name="username" id="username"> <br><br>
Password : <input type="text" name="password" id="password">  <br><br>
<input type="submit" name="submit1" value="Login" > <input type="button" name="clear" value="Clear" onclick="clearText();" >
</form>

<script>
function clearText()  
{
    document.getElementById('username').value = "";
    document.getElementById('password').value = "";
}  

</script>
<?php 
include "db1.php";

print_r($_SESSION);
mysqli_close($conn);
?>
<br>
<a href="signup.php"> Signup </a>
</body>
<?php
if(isset($_SESSION['msg']))
{
    print_r($_SESSION['msg']);
}
?>
</html>