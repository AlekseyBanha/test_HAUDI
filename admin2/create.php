<?php
include "../includes/config.php";

$title=$_POST['title'];
$img=$_POST['img'];
$text=$_POST['text'];
$Categories_id=$_POST['Categories_id'];

mysqli_query($connection, "INSERT INTO `artcl` (`id`, `title`, `img`, `text`, `categories_id`, `pubdate`, `views`) VALUES (NULL, '$title', '$img', '$text', '$Categories_id', CURRENT_TIMESTAMP, '0')");




header( 'Location: ../admin2/main.php');