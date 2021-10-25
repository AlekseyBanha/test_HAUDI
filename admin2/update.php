<?php
include "../includes/config.php";

$artcls_id = $_GET['id'];


$artcls = mysqli_query($connection,"SELECT * FROM `artcl` WHERE `id`='$artcls_id'");
$artcls = mysqli_fetch_assoc($artcls);

?>


<link rel="stylesheet" type="text/css" href="/media/css/style.css">

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>UpDate</title>
</head>
<body><div class="sas2">
    <h3>Редактирование</h3> <br>
    <form action="update2.php" method="post" >
        <p>Заголовок</p>
        <input type="hidden" name="id" value="<?=$artcls['id']?>" > <br>
        <input type="text" name="title" value="<?=$artcls['title']?>"> <br>
        <p>Категория</p>
        <select  name="Categories_id" " >
        <option value="<?=$artcls['categories_id']?>">Программирование</option>
        <option value="<?=$artcls['categories_id']?>">Безопасность</option>
        <option value="<?=$artcls['categories_id']?>">Хакерство</option>
        <option value="<?=$artcls['categories_id']?>">Разное</option>
        </select> <br>
        <br> <p>Фото</p><br>
        <input type="text" name="img" value="<?=$artcls['img']?>"><br>
        <br><p>Текст</p><br>
        <textarea name="text"><?= $artcls['text']?></textarea>


        <br><br>
        <button type="submit">Редактировать</button>
    </form>
</div>

</body>
</html>