<?php
include "../includes/config.php";

$artcls_id = $_GET['id'];


$artcls = mysqli_query($connection,"SELECT * FROM `artcl` WHERE `id`='$artcls_id'");
$artcls = mysqli_fetch_assoc($artcls);

?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>UpDate</title>
</head>
<body> <h3>Редактирование</h3>
    <form action="update2.php" method="post">
        <p>Заголовок</p>
        <input type="hidden" name="id" value="<?=$artcls['id']?>" >
        <input type="text" name="title" value="<?=$artcls['title']?>">
        <p>Фото</p>
        <input type="text" name="img" value="<?=$artcls['img']?>">
        <p>Текст</p>
        <textarea name="text"><?= $artcls['text']?></textarea>


         <br><br>
        <button type="submit">Редактировать</button>
    </form>

</body>
</html>