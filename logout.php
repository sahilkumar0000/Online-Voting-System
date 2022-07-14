<?php
session_start();
unset($_SESSION['user_email']);
unset($_SESSION['user_name']);
unset($_SESSION['user_image']);
session_destroy();
header("location:index.php");


?>  