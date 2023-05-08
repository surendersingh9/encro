<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Signup Form</h2>
    <p>Enter your required information for creating an account</p>
<form method="post" action="signup.php">
Username : <input type="text" name="username" id="username"> <br><br>
Password : <input type="text" name="password" id="password">  <br><br>
<input type="submit" name="submit" value="Signup" > <input type="button" name="clear" value="Clear" onclick="clearText();" >
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


mysqli_close($conn);
?>
<br>
<a href="login.php"> Login </a>
</body>
<?php
if(isset($_SESSION['msg']))
{
    print_r($_SESSION['msg']);
}
?>
</html>