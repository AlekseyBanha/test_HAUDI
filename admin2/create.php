<?php
include "../includes/config.php";

$title=$_POST['title'];

$name_file = $_FILES['file']['name'];
$name_file  = explode('.',$name_file);

$name_file = $name_file[0] . time() . "." . $name_file[1];
$img=move_uploaded_file($_FILES['file']['tmp_name'], '../static/images/' . $name_file);
if(isset($name_file)){
    $name_file='esport1635186193.jpg';
}

$text=$_POST['text'];
$Categories_id=$_POST['Categories_id'];

mysqli_query($connection, "INSERT INTO `artcl` (`id`, `title`, `img`, `text`, `categories_id`, `pubdate`, `views`) VALUES (NULL, '$title', '$name_file', '$text', '$Categories_id', CURRENT_TIMESTAMP, '0')");


header( 'Location: ../admin2/main.php');?>

