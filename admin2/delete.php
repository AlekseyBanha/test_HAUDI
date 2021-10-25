<?php
include "../includes/config.php";


$id=$_GET['id'];

mysqli_query($connection,"DELETE FROM `artcl` WHERE `artcl`.`id` = '$id'");

header("Location: http://test/admin2/main.php");

