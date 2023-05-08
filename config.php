<?php
session_start();

function db($sql)
{
    $conn = mysqli_connect("localhost", "root", "", "encrobytes") or die("Connection Failed!!!");
    $result = mysqli_query($conn, $sql);
    
    mysqli_close($conn);
}
?>