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
    <title>Эгоист</title>
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
    <div class="header_inner1">
        <h1>Эгоист</h1>
        <h2>Магазин чая и кофе</h2>
    </div>
</header>
<section class="section_product">
    <h1>Популярные товары</h1>

    <div style="display:flex; align-items: center;">
        <img src="img/images/left.png" alt="left" class="button-next">
        <div class="slider">
            <div class="Slider-items">

                <?php
                require_once 'php/DB.php';
                $db = new DB();
                $conn = $db->getConnection();
                $sql = "SELECT * FROM Products LIMIT 7;";
                if ($result = $conn->query($sql)) {
                    $rowsCount = $result->num_rows;
                    foreach ($result as $row) {
                        echo    "<a target='_blank' class='Slider-item' href='product.php'>
                                 <img src='$row[img]'>
                                 <p style='font-weight: bold'>$row[name]</p></a>";

                    }
                    $result->free();
                }
                $conn->close();
                ?>
            </div>
        </div>
        <img src="img/images/right.png" class="button-prev" alt="right">
    </div>
    <h1>Скидки и Акции</h1>
    <div style="display:flex; align-items: center;">
        <div class="slider">
            <div class="Slider-items">
                <?php
                require_once 'php/DB.php';
                $db = new DB();
                $conn = $db->getConnection();
                $sql = "SELECT * FROM Sales ORDER BY id DESC LIMIT 3";
                if ($result = $conn->query($sql)) {
                    $rowsCount = $result->num_rows;
                    foreach ($result as $row) {
                        echo    "<a target='_blank' class='Slider-item' href=''>
                                 <img src='$row[img]'>
                                 <p style='font-weight: bold'>$row[name]</p>
                                 <p>$row[description]</p></a>";

                    }
                    $result->free();
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</section>
<section class="section_follow">
    <h1>Узнавай первым о новинках</h1>
    <form class="mailing" action="">
        <h2>Рассылка:</h2>
        <label>Имя: <input type="text"></label>
        <label>Email: <input type="email"></label>
        <input type="submit" value="Отправить">
    </form>
</section>

<footer>
    <div class="footer1">
        <div>
            <h2>Навигация</h2>
            <p>Главная Каталог Вход Регистрация ЛК Корзина
            </p>
        </div>
        <div>
            <h2>Производители</h2>

            <p>Akbar Jacobs Nescafe Lipton Ahmad tea Другие</p>
        </div>
    </div>
    <div class="footer2">
        <p>©️EmilyProject</p>
    </div>

</footer>
<script src="index.js" defer></script>
</body>
</html>


