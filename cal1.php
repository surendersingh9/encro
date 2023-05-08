<?php

if(isset($_POST['cal'])){
    $x = $_POST['num1'];
    $y = $_POST['num2'];
    $op = $_POST['cal'];

    if(is_numeric($x) && is_numeric($y)){
        switch($op){
            case 'Addition' : $result = $x + $y;
            break;
    
            case 'Substraction' : $result = $x - $y;
            break;
    
            case 'Multiplication' : $result = $x * $y;
            break;
    
            case 'Division' : $result = $x / $y;
            break;
        }     
    }
    else{
        echo "Enter two numbers";
    }
   
}


?>

<html>

<body>

<h1>Calculator in PHP</h1><br>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
Number 1 :<input type="number" name="num1" value="<?= $x ?>"><br><br>
Number 2 :<input type="number" name="num2" value="<?= $y ?>"><br><br>
Result :<input type="number" name="result" value="<?= $result ?>" disabled><br><br>

<input type="submit" value="Addition" name="cal">
<input type="submit" value="Substraction" name="cal">
<input type="submit" value="Multiplication" name="cal">
<input type="submit" value="Division" name="cal">
</form>
</body>
</html>