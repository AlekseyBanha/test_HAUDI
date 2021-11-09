<?php
require "includes/config.php";
require "Logger.php";
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Обо мне</title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="/media/css/style.css">

</head>
<body>

<div id="wrapper">

    <?php include "includes/header.php"; ?>


    <?php
    $article = mysqli_query($connection, "SELECT * FROM `artcl` WHERE `id`= " . (int)($_GET['id']));

    if (mysqli_num_rows($article) <= 0)
    {

    ?>

    <div id="content">
        <div class="container">
            <div class="row">
                <section class="content__left col-md-8">
                    <div class="block">
                        <h3>Статья не найдена!</h3>
                        <div class="block__content">
                            <div class="full-text">
                                Запрашиваемая Вами статья не существует!
                            </div>
                        </div>
                    </div>
                    <?php
                    } else {
                        $art = mysqli_fetch_assoc($article);

                        mysqli_query($connection, "UPDATE `artcl` SET `views` =`views` + 1 WHERE `id` =" . (int)$art['id']);

                        ?>
                        <div id="content">
                            <div class="container">
                                <div class="row">
                                    <section class="content__left col-md-8">
                                        <div class="block">
                                            <a><?php echo $art['views']; ?> просмотров</a>
                                            <h3><?php echo $art['title']; ?></h3>
                                            <div class="block__content">
                                                <img id="ph" src="/static/images/<?php echo $art['img']; ?>"
                                                     style="min-width: 25%; max-width: 50%; padding-bottom: 20px;">
                                                <div class="full-text">
                                                    <?php echo $art['text']; ?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="block">
                                            <a href="#comment-add-form">Добавить свой</a>

                                            <h3>Комментарии</h3>
                                            <div class="block__content">
                                                <div class="articles articles__vertical">

                                                    <?php
                                                    $comments = mysqli_query($connection, "SELECT * FROM `coments` WHERE `articles_id` =" . (int)$art['id'] . " ORDER BY `id` DESC ");

                                                    if (mysqli_num_rows($comments) <= 0) {
                                                        echo "Коментариев нет!";
                                                    }

                                                    while ($comment = mysqli_fetch_assoc($comments)) {
                                                        ?>

                                                        <article class="article">
                                                            <div class="article__image"
                                                                 style="    background-image: url(https://www.gravatar.com/avatar/<?php echo md5($comment['email']); ?>?s=125 );"></div>
                                                            <div class="article__info">
                                                                <a href="/article.php?id=<?php echo $comment['articles_id']; ?>"><?php echo $comment['autor']; ?></a>
                                                                <div class="article__info__meta">
                                                                    <div class="article__info__preview"><?php echo $comment['text']; ?></div>
                                                                </div>
                                                        </article>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="block" id="comment-add-form">
                                            <h3>Добавить комментарий</h3>
                                            <div class="block__content">
                                                <form class="form" method="POST"
                                                      action="/article.php?id=<?php echo $art['id']; ?> #comment-add-form">
                                                    <?php
                                                    if (isset($_POST['do_post'])) {
                                                        $error = array();

                                                        if ($_POST['name'] == '') {
                                                            $arror[] = 'Введите имя!';

                                                        }
                                                        if ($_POST['nickname'] == '') {
                                                            $arror[] = 'Введите никнейм!';

                                                        }
                                                        if ($_POST['email'] == '') {
                                                            $arror[] = 'Введите почту!';

                                                        }
                                                        if ($_POST['text'] == '') {
                                                            $arror[] = 'Введите текст комментария !';

                                                        }
                                                        if (empty($error)) {


                                                            mysqli_query($connection, " INSERT INTO `coments` (`autor`,`nickname`,`email`,`text`,`pubdate`,`articles_id` ) VALUES ('" . $_POST['name'] . "','" . $_POST['nickname'] . "','" . $_POST['email'] . "','" . $_POST['text'] . "',NOW(),'" . $art['id'] . "') ");

                                                            echo '<span  style="color: green;font-weight: bold; margin-bottom: 10px; display: block;"> Коментарий успешно добавлен!</span>';
                                                            echo "<meta http-equiv='refresh' content='0'>";
                                                        } else {
                                                            echo '<span  style="color: red;font-weight: bold; margin-bottom: 10px; display: block;"> ' . $error['0'] . ' </span>';
                                                        }
                                                    }
                                                    ?>
                                                    <div class="form__group">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="text" class="form__control" required=""
                                                                       name="name" placeholder="Имя" ">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form__control" required=""
                                                                       name="nickname" placeholder="Никнейм" " >
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="email" class="form__control" required=""
                                                                       name="email" placeholder="Email" " >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form__group">
                                                        <textarea name="text" required class="form__control"
                                                                  placeholder="Текст комментария ..."></textarea>
                                                    </div>
                                                    <div class="form__group">
                                                        <input type="submit" class="form__control" name="do_post"
                                                               value="Добавить комментарий">
                                                        <meta http-equiv="refresh" content="article.php">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                    </section>
                                    <section class="content__right col-md-4">
                                        <?php include "includes/sidebar.php"; ?>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>


                    <?php include "includes/footer.php";
                    Logger::$PATH = dirname(__FILE__);
                    Logger::getLogger($name)->log($data);?>
            </div>

</body>
</html>