<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<?php

session_start();
//print_r($_SESSION);

if (!$_SESSION["logined"]) {
    ?>
    <form action="/admin2/login.php" method="post" class="bad1">
        <input name="login" type="text" placeholder="You login..">
        <br><br>
        <input name="password" type="text" placeholder="You password..">
        <br><br>
        <input type="submit">
    </form>


    <?php
}else{
    header("Location: http://test/admin2/main.php");
    exit();
}
?>