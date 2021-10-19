<?php
include "../includes/config.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/media/css/style.css">


    <title>Admin</title>
</head>
<style>
    
    th,td{
        padding: 10px;
    }
    th{background: rgba(9, 1, 1, 0.59);}
    td{background: rgba(58, 58, 58, 0.47);}
    table{padding-right:600px;}

</style>
<body >

    <table class="bad">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Img</th>
            <th>Text</th>
            <th>Categories_id</th>
        </tr>
        <?php

        $artcls = mysqli_query($connection,"SELECT * FROM `artcl`");
        $artcls = mysqli_fetch_all($artcls);
        foreach ($artcls as $artcl){
        ?>
        <tr >
            <td><?=  $artcl[0] ?></td>
            <td><?=  $artcl[1] ?></td>
            <td><?=  $artcl[2] ?></td>
            <td><?=  $artcl[3] ?></td>
            <td><?=  $artcl[4] ?></td>
            <td><a href="update.php?id=<?=  $artcl[0] ?>">Редактировать</a> </td>
            <td><a style="color: red;" href="delete.php?id=<?=  $artcl[0] ?>">Удалить</a> </td>
        </tr>'; <?php
        }
        ?>

    </table>
    <form action="create.php" method="post" class="sas">
        <p>Новая статья</p>
        <input type="text" name="title">
        <p>Фото</p>
        <input type="text" name="img">
        <p>Текст</p>
        <textarea name="text"></textarea>
        <p>Номер категории</p>
        <input type="number" name="Categories_id" > <br><br>
        <button type="submit" >Добавить новую статью</button> <br><br>
        <p>Категории:</p>
        <p>1-Программирование</p>
        <p>2-Безопасность</p>
        <p>3-Хакерство</p>
        <p>4-Разное</p>
    </form>

</body>
</html>