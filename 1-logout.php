<?php

session_start();
unset($_SESSION['userid']);
unset($_SESSION['msg']);
header("Location:1-login.php");
?>
