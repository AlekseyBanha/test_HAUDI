<?php
include "../includes/config.php";

$id=$_POST['id'];
$title=$_POST['title'];
$img=$_POST['img'];
$text=$_POST['text'];
$Categories_id=$_POST['categories_id'];

mysqli_query($connection,"UPDATE `artcl` SET `title` = '$title', `img` = '$img', `text` = '$text',`categories_id` ='$Categories_id' WHERE `artcl`.`id` = '$id'");

header("Location: http://test/admin2/index.php");