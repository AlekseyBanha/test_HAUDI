
<?php
require "includes/config.php";
require "Logger.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php  echo $config['title']  ;   ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
    <link rel="shortcut icon" href="/media/images/icon.png" type="image/png">

</head>
<body>

  <div id="wrapper">

    <?php  include "includes/header.php";  ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="/articles.php">Все записи!</a>
              <h3>Новейшее_в_блоге</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                    <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `artcl` ORDER BY `id` DESC LIMIT 4");


                        while ($art = mysqli_fetch_assoc($articles))
                        {
                    ?>

                  <article class="article">
                    <div class="article__image" style="background-image: url(/static/images/<?php echo $art['img']; ?> );"></div>
                    <div class="article__info">
                      <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title'];?></a>
                      <div class="article__info__meta">

                          <?php
                          $art_cat = false;
                          foreach ($categories as $cat )
                          {
                              if ($cat ['id']==$art['categories_id']){
                                  $art_cat=$cat;
                                  break;
                              }
                          }
                          ?>
                        <small>Категория: <a href="/articles.php?categories=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title'];?></a></small>
                      </div>
                      <div class="article__info__preview"><?php   echo mb_substr($art['text'],0,50,'utf-8') . ' ...'?></div>
                    </div>
                  </article>
                            <?php
                        }
                    ?>


                </div>
              </div>
            </div>

            <div class="block">

              <a href="/articles.php?categories=2">Все записи!</a>
              <h3>Безопасность [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                    <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `artcl` WHERE `categories_id` = 2 ORDER BY `id` DESC LIMIT 4");

                    while ($art = mysqli_fetch_assoc($articles))
                    {
                        ?>

                        <article class="article">
                            <div class="article__image" style="background-image: url(/static/images/<?php echo $art['img']; ?> );"></div>
                            <div class="article__info">
                                <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title'];?></a>
                                <div class="article__info__meta">

                                    <?php
                                    $art_cat = false;
                                    foreach ($categories as $cat )
                                    {
                                        if ($cat ['id']==$art['categories_id']){
                                            $art_cat=$cat;
                                            break;
                                        }
                                    }
                                    ?>
                                    <small>Категория: <a href="/articles.php?categories=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title'];?></a></small>
                                </div>
                                <div class="article__info__preview"><?php   echo mb_substr($art['text'],0,50,'utf-8') . ' ...'?></div>
                            </div>
                        </article>
                        <?php
                    }
                    ?>
                </div>
              </div>
            </div>

            <div class="block">
              <a href="/articles.php?categories=1">Все записи</a>
              <h3>Программирование [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">


                    <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `artcl` WHERE `categories_id` =1 ORDER BY `id` DESC LIMIT 4");


                    while ($art = mysqli_fetch_assoc($articles))
                    {
                        ?>

                        <article class="article">
                            <div class="article__image" style="background-image: url(/static/images/<?php echo $art['img']; ?> );"></div>
                            <div class="article__info">
                                <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title'];?></a>
                                <div class="article__info__meta">

                                    <?php
                                    $art_cat = false;
                                    foreach ($categories as $cat )
                                    {
                                        if ($cat ['id']==$art['categories_id']){
                                            $art_cat=$cat;
                                            break;
                                        }
                                    }
                                    ?>
                                    <small>Категория: <a href="/articles.php?categories=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title'];?></a></small>
                                </div>
                                <div class="article__info__preview"><?php   echo mb_substr($art['text'],0,50,'utf-8') . ' ...'?></div>
                            </div>
                        </article>
                        <?php
                    }
                    ?>
                </div>
              </div>
            </div>
              <div class="block">
                  <a href="/articles.php?categories=3">Все записи</a>
                  <h3>Хакерство [Новейшее]</h3>
                  <div class="block__content">
                      <div class="articles articles__horizontal">


                          <?php
                          $articles = mysqli_query($connection, "SELECT * FROM `artcl` WHERE `categories_id` =3 ORDER BY `id` DESC LIMIT 4");


                          while ($art = mysqli_fetch_assoc($articles))
                          {
                              ?>

                              <article class="article">
                                  <div class="article__image" style="background-image: url(/static/images/<?php echo $art['img']; ?> );"></div>
                                  <div class="article__info">
                                      <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title'];?></a>
                                      <div class="article__info__meta">

                                          <?php
                                          $art_cat = false;
                                          foreach ($categories as $cat )
                                          {
                                              if ($cat ['id']==$art['categories_id']){
                                                  $art_cat=$cat;
                                                  break;
                                              }
                                          }
                                          ?>
                                          <small>Категория: <a href="/articles.php?categories=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title'];?></a></small>
                                      </div>
                                      <div class="article__info__preview"><?php   echo mb_substr($art['text'],0,50,'utf-8') . ' ...'?></div>
                                  </div>
                              </article>
                              <?php
                          }
                          ?>
                      </div>
                  </div>
              </div>
              <div class="block">
                  <a href="/articles.php?categories=4">Все записи</a>
                  <h3>Разное [Новейшее]</h3>
                  <div class="block__content">
                      <div class="articles articles__horizontal">


                          <?php
                          $articles = mysqli_query($connection, "SELECT * FROM `artcl` WHERE `categories_id` =4 ORDER BY `id` DESC LIMIT 4");


                          while ($art = mysqli_fetch_assoc($articles))
                          {
                              ?>

                              <article class="article">
                                  <div class="article__image" style="background-image: url(/static/images/<?php echo $art['img']; ?> );"></div>
                                  <div class="article__info">
                                      <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title'];?></a>
                                      <div class="article__info__meta">

                                          <?php
                                          $art_cat = false;
                                          foreach ($categories as $cat )
                                          {
                                              if ($cat ['id']==$art['categories_id']){
                                                  $art_cat=$cat;
                                                  break;
                                              }
                                          }
                                          ?>
                                          <small>Категория: <a href="/articles.php?categories=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title'];?></a></small>
                                      </div>
                                      <div class="article__info__preview"><?php   echo mb_substr($art['text'],0,50,'utf-8') . ' ...'?></div>
                                  </div>
                              </article>
                              <?php
                          }
                          ?>
                      </div>
                  </div>
              </div>
          </section>
          <section class="content__right col-md-4">
            <?php  include "includes/sidebar.php";   ?>
          </section>
        </div>
      </div>
    </div>
<div hidden='hidden'>
    <?php
    Logger::$PATH = dirname(__FILE__);
    Logger::getLogger($name)->log($data);


    ?>
</div>
<?php include "includes/footer.php" ;

?>

  </div>

</body>
</html>