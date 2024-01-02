<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление продукта</title>
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
<section class="section_add">
    <h1>Добавить продукт</h1>
    <form class="createProduct" action="php/create_product.php" method="post" enctype="multipart/form-data">
        <label>
            <input placeholder="Название" name="name" type="text">
            <textarea placeholder="Описание" name="description"></textarea>
            <input placeholder="Цена" name="price" type="number">
            <select name="type" id="type-select">
                <option value="">Вид</option>
                <option value="В капсулах">В капсулах</option>
                <option value="Плантационный">Плантационный</option>
                <option value="Ароматизированный">Ароматизированный</option>
                <option value="Черный">Черный</option>
                <option value="Зеленый">Зеленый</option>
                <option value="Пу Эр">Пу Эр</option>
            </select>
            <select name="type2" id="type2-select">
                <option value="">Тип продукта</option>
                <option value="Чай">Чай</option>
                <option value="Кофе">Кофе</option>
            </select>
            <select name="country" id="country-select">
                <option value="">Страна</option>
                <option value="Россия">Россия</option>
                <option value="Африка">Африка</option>
                <option value="США">США</option>
                <option value="Англия">Англия</option>
                <option value="Германия">Германия</option>
                <option value="Франция">Франция</option>
            </select>

            <input placeholder="Количество" name="count" type="number">
            <input placeholder="Фото" name="img" type="file">
            <input type="submit" value="Отправить"></label>

    </form>

    <h1>Добавить акцию</h1>
    <form class="createProduct" action="php/create_sales.php" method="post" enctype="multipart/form-data">
        <label>
            <input placeholder="Название" name="name" type="text">
            <textarea placeholder="Описание" name="description"></textarea>
            <input placeholder="Фото" name="img" type="file">
            <input type="submit" value="Отправить"></label>

    </form>
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
</body>
</html>
