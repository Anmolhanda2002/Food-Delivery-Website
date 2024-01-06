<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['user']);
echo "<script>window.location.assign('admin_login.php?msg=logout succesfully')</script>";
// echo header('location:login.php?msg=logout succesfully');

?>