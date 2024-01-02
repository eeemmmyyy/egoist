<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Каталог</title>
    <link rel="stylesheet" href="main.css">

</head>
<body>

<header>
    <div class="wrapper">
        <div class="header_inner">
            <a href="index.php"><img src="img/images/logo.png" alt="logo"></a>
            <a href="catalog.php">Каталог</a>
            <a href="about.php">О нас</a>
            <a href="LK.php">Личный кабинет</a>
            <div class="icons">
                <a href="basket.php"><img src="img/images/basket.png" alt="logo"></a>
                <div class="icons_inner">
                    <img src="img/images/tg.png" alt="logo">
                    <img src="img/images/vk.png" alt="logo">
                </div>
            </div>
        </div>
    </div>

</header>
<section class="section_catalog">
    <?php
    if (!empty( $_SESSION['auth']) and !empty($_SESSION['login']=='admin'))  {
        echo '<a href="createProduct.php">Добавить продукт или акцию</a>';}
    ?>
    <?php
    if(isset($_GET['message'])){
        echo '<h3 style="color: red">'.$_GET['message'].'</h3>';
    }
    ?>
    <h1>Выберите категорию</h1>
    <div class="sections">
    <a href="tea.php" class="tea">
        <h2>Чай</h2>
        <h3>Посмотреть</h3>
    </a>
    <a href="coffee.php" class="coffee">
        <h2>Кофе</h2>
        <h3>Посмотреть</h3>
    </a>
    </div>
</section>

<footer>
    <div class="footer1">
        <div>
            <h2>Навигация</h2>
            <p><a href="index.php">Главная</a>
                <a href="about.php">О нас</a>
                <a href="catalog.php">Каталог</a>
                <a href="login.php">Вход</a>
                <a href="regist.php"> Регистрация</a>
                <a href="LK.php">ЛК</a>
            </p>
        </div>
        <div>
            <h2>Производители</h2>
            <p>Akbar Jacobs Nescafe Lipton Ahmad Другие</p>
        </div>
    </div>
    <div class="footer2">
        <p>©️EmilyProject</p>
    </div>
</footer>
<script src="index.js" defer></script>
</body>
</html>



