<?php
include "../includes/config.php";
session_start();



$users = mysqli_query($connection, "SELECT * FROM `users` where `login` = '".$_POST['login']. "' and `password` = '".$_POST['password']. "' ");

$total_count = mysqli_fetch_assoc($users);

if ($total_count) {
    $_SESSION["logined"] = 'true';
}
header("Location: http://test/admin2/index.php");
exit();

