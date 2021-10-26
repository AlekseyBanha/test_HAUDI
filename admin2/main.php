<?php
$server = 'localhost'; // Имя или адрес сервера
$user = 'root'; // Имя пользователя БД
$password = ''; // Пароль пользователя
$db = 'test_blog';
$db = mysqli_connect($server, $user, $password, $db); // Подключение
// Check connection
// Проверка на подключение
if (!$db) {
    // Если проверку не прошло, то выводится надпись ошибки и заканчивается работа скрипта
    echo "Не удается подключиться к серверу базы данных!";
    exit;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

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
    a {
        text-decoration: none;
    }

</style>
<body class="sew">

    <table class="bad">
        <tr id="foot1">
            <th>ID</th>
            <th>Заголовок</th>
            <th>Фото</th>
            <th>Текст</th>
            <th>Категория</th>
            <th>Редактирование</th>
            <th>Удаление</th>
        </tr><?php
        if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
        } else {
        $pageno = 1;
        }
        $size_page =4;
        $offset = ($pageno-1) * $size_page;

        // SQL запрос для получения количества элементов
        $count_sql = "SELECT COUNT(*) FROM `artcl`";
        // Отправляем запрос для получения количества элементов
        $result = mysqli_query($db, $count_sql);
        // Получаем результат
        $total_rows = mysqli_fetch_array($result)[0];

        // Вычисляем количество страниц
        $total_pages = ceil($total_rows / $size_page);
        // Создаём SQL запрос для получения данных
        $sql = "SELECT * FROM `artcl` LIMIT $offset, $size_page";
        // Отправляем SQL запрос
        $res_data = mysqli_query($db, $sql);
        // Цикл для вывода строк
//        while($row = mysqli_fetch_array($res_data)){
//            // Выводим логин пользователя
//            echo $row['title'] . '</br>';
//        }
        while($row = mysqli_fetch_array($res_data)){
            ?>
            <tr >
                <td><?=  $row[0] ?></td>
                <td><?=  $row[1] ?></td>
                <td><?=  $row[2] ?></td>
                <td><?=  mb_substr($row[3], 0, 200, 'utf-8') . '...' ?></td>
                <td><?=  $row[4] ?></td>
                <td><a style="color: rgba(238,10,234,0.7);" href="update.php?id=<?=  $row[0] ?>">Редактировать</a> </td>
                <td><a style="color: red;" href="delete.php?id=<?=  $row[0] ?>">Удалить</a> </td>
            </tr> <?php
        }

//?><!--     <div class="pagin">-->
<!--            <table >-->
<!--                <tr><a href="?pageno=1">Первая</a></tr>-->
<!--                <tr class="--><?php //if($pageno <= 1){ echo 'disabled'; } ?><!--">-->
<!--                    <a href="--><?php //if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?><!--">Пред.</a>-->
<!--                </tr>-->
<!--                <tr class="--><?php //if($pageno >= $total_pages){ echo 'disabled'; } ?><!--">-->
<!--                    <a href="--><?php //if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?><!--">След.</a>-->
<!--                </tr>-->
<!--                <tr><a href="?pageno=--><?php //echo $total_pages; ?><!--">Последняя</a></tr>-->
<!--            </table>-->
<!--        </table>-->
<!--        </div>-->
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button type="button" class="sex"><a href="?pageno=1" style="color: #f6a206;" >ПЕРВАЯ</a></button>
        <button type="button" class="sex"><a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" style="color: #ff0000; ">ПРЕДИДУЩАЯ</a></button>
        <button type="button" class="sex"><a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " style="color: #ffea00" >СЛЕДУЮЩАЯ</a></button>
        <button type="button" class="sex"><a href="?pageno=<?php echo $total_pages; ?>" style="color: #00bee1">ПОСЛЕДНЯЯ</a></button>
    </div>

    <div class="sas"><form  enctype="multipart/form-data"  action="create.php" method="post" >
            <p>Новая статья</p>
            <input type="text" name="title"><br>
            <br><p>Фото</p>
            <input type="file" name="file"><br>
            <br><p>Текст</p>
            <textarea name="text"></textarea><br>
            <br><p>Категория</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />

            <select  name="Categories_id" >
                <option value="1">Программирование</option>
                <option value="2">Безопасность</option>
                <option value="3">Хакерство</option>
                <option value="4">Разное</option>
            </select> <br><br>
            <button type="submit" >Добавить новую статью</button> <br><br>

        </form></div>
        <div class="duck" >



        </div>



</body>
</html>

<?php  mysqli_close($db); ?>