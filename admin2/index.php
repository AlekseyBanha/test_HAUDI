<?php

session_start();
//print_r($_SESSION);

if (!$_SESSION["logined"]) {
    ?>
    <form action="/admin2/login.php" method="post">
        <input name="login" type="text">
        <br>
        <input name="password" type="text">
        <br>
        <input type="submit">
    </form>


    <?php
}else{
    header("Location: http://test/admin2/main.php");
    exit();
}
?>