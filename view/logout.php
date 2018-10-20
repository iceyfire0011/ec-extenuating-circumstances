<?php

session_start();
setcookie("loggin", "", time() + 3600, "/");
session_unset();
session_destroy();
//print_r($_SESSION);
//print_r($_COOKIE);
header("location:login.php");
