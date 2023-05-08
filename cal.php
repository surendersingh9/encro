<html>
<body>
<form action="form.php" method="post">
Number 1 : <input type="number" name="num1"><br><br>
Number 2 : <input type="number" name="num2"><br><br>

<input type="submit" name="add" value="Addition">  
<input type="submit" name="sub" value="Substraction">
<input type="submit" name="multi" value="Multiplication">
<input type="submit" name="div" value="Division">
<input type="submit" name="mod" value="Modulus">

<form>
</body>

</html>
<?php
if(isset($_POST["add"]))
{
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $add = $num1 + $num2;
    echo "<br><br>Addion of $num1 and $num2 is:".$add;
}

if(isset($_POST["sub"]))
{
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $sub = $num1 - $num2;
    echo "<br><br>Substraction of $num1 and $num2 is:".$sub;
}

if(isset($_POST["multi"]))
{
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $multi = $num1 * $num2;
    echo "<br><br>Multiplication of $num1 and $num2 is:".$multi;
}

if(isset($_POST["div"]))
{
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $div = $num1 / $num2;
    echo "<br><br>Division of $num1 and $num2 is:".$div;
}

if(isset($_POST["mod"]))
{
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $mod = $num1 % $num2;
    echo "<br><br>Modulo of $num1 and $num2 is:".$mod;
}


?>