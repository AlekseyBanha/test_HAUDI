<header id="header">
    <div class="header__top">
        <div class="container">
            <div class="header__top__logo">
                <h1><?php  echo $config['title']  ;   ?></h1>
            </div>
            <nav class="header__top__menu">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/pages/about_me.php" target="_blank">Обо мне</a></li>
                    <li><a href="<?php   echo  $config['vk_url']; ?>" target="_blank">Я Вконтакте</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <?php
    $categories = mysqli_query($connection, "SELECT * FROM `categories` ");

    ?>
    <div class="header__bottom">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="../articles.php?categories=1">Программирование</a></li>
                    <li><a href="../articles.php?categories=2">Безопасность</a></li>
                    <li><a href="../articles.php?categories=3">Хакерство</a></li>
                    <li><a href="../articles.php?categories=4">Разное</a></li>

                </ul>
            </nav>
        </div>
    </div>
</header>