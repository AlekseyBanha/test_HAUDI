<?php
include "../includes/config.php";

$artcls_id = $_GET['id'];

$artcls = mysqli_query($connection, "SELECT * FROM `artcl` WHERE `id`='$artcls_id'");
$artcls = mysqli_fetch_assoc($artcls);

$categories = mysqli_query($connection, "SELECT * FROM `categories`");

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="/media/css/style.css">

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>UpDate</title>
</head>
<body id="foot2">
<div class="sas2">
    <h3>Редактирование</h3> <br>
    <form action="update2.php" method="post">
        <p>Заголовок</p>
        <input type="hidden" name="id" value="<?= $artcls['id'] ?>"> <br>
        <input type="text" name="title" value="<?= $artcls['title'] ?>"> <br>
        <br><p>Категория</p>
        <select name="Categories_id" " >
        <?php
        while ($categorie = mysqli_fetch_assoc($categories)) { ?>
            <?php if ($artcls['categories_id'] == $categorie['id']): ?>
                <option selected value="<?= $categorie['id'] ?>"><?= $categorie['title'] ?></option>
            <?php else: ?>
                <option value="<?= $categorie['id'] ?>"><?= $categorie['title'] ?></option>
            <?php endif; ?>
            <?php
        }
        ?>


        </select><br>
        <br>
        <p>Текст</p><br>
        <textarea name="text"><?= $artcls['text'] ?></textarea>


        <br><br>
        <button type="submit">Редактировать</button>
    </form>
</div>

</body>
</html>