<?php
include "../includes/config.php";

$id=$_POST['id'];
$title=$_POST['title'];
$img=$_POST['img'];
$text=$_POST['text'];
$Categories_id=$_POST['Categories_id'];


$sql = "UPDATE `artcl` SET `title` = '$title', `img` = '$img', `text` = '$text',`categories_id` ='$Categories_id' WHERE `artcl`.`id` = '$id'";
$ff = mysqli_query($connection,$sql);

header("Location: http://test/admin2/index.php");