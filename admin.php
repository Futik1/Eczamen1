<?php
require_once "vendor/autoload.php";

use App\Admin_db;

session_start();
$admin = isset($_SESSION["admin"]);
$db = new Admin_db();
$orders = $db->get_orders();
$goods = $db->get_goods();
$goods = array_map(function ($good) {
    $good["Images"] = json_decode($good["Images"], true);
    $good["Specs"] = json_decode($good["Specs"], true);
    return $good;
}, $goods);
$reviews = $db->get_reviews();
$categories = $db->get_categories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <title>Админка</title>
</head>

<body>
    <?php if (!$admin) : ?>
        <div class="login">
            <form id="login_form" action="ajax/login_admin.php" method="post">
                <div>
                    <label for="login">Логин</label>
                    <input name="login" id="login" type="text">
                    <label for="password">Пароль</label>
                    <input name="password" id="password" type="password">
                </div>
                <button>Войти</button>
            </form>
        </div>
    <?php else : ?>
        <header>
            <nav>
                <div>
                    <button class="switch_tab" data-id="1">Заказы</button>
                </div>
                <div>
                    <button class="switch_tab" data-id="2">Товары</button>
                </div>
                <div>
                    <button class="switch_tab" data-id="3">Отзывы</button>
                </div>
                <div>
                    <a href="ajax/logout.php">
                        <button>Выход</button>
                    </a>
                </div>
            </nav>
        </header>
        <main>
            <div class="tab" style="display: block;" id="orders" data-id="1">
                <h2>Заказы</h2>
                <?php foreach ($orders as $order) : ?>
                    <div class="order">
                        <p><strong>Имя заказчика:</strong> <?= $order["Name"] ?></p>
                        <p><strong>Логин:</strong> <?= $order["Login"] ?></p>
                        <p><strong>Телефон:</strong> <?= $order["Phone"] ?></p>
                        <p><strong>Дата:</strong> <?= DateTime::createFromFormat("Y-m-d", $order["Date"])->format("d.m.Y") ?></p>
                        <p><strong>Товары: </strong></p>
                        <?php foreach ($order["Goods"] as $good) : ?>
                            <p><?= $good["Name"] ?>, <?= $good["Price"] ?> * <?= $good["Count"] ?> = <?= $good["Price"] * $good["Count"] ?></p>
                        <?php endforeach ?>
                        <p><strong>Итоговая стоимость:</strong> <?= $order["Total_price"] ?></p>
                        <p><strong>Комментарий:</strong><?= $order["Comment"] ?></p>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="tab" id="goods" data-id="2">
                <h2>Товары</h2>
                <?php foreach ($goods as $good): ?>
                    <form class="good">
                        <label>
                            <span>Название</span>
                            <input name="name" type="text" value="<?= $good["Name"] ?>">
                        </label>
                        <label>
                            <span>Обложка</span>
                            <img src="assets/goods/<?= $good["Cover"] ?>" alt="">
                            <input type="file" name="cover">
                        </label>
                        
                        <label>
                            <span>Краткая информация</span>
                            <textarea name="info" rows="10"><?= $good["Info"] ?></textarea>
                        </label>
                        <div class="specs">
                            <p>Технические характеристики</p>
                            <?php foreach ($good["Specs"] as $spec): ?>
                                <div class="spec">
                                    <label>
                                        <span>Название</span>
                                        <input type="text", name="spec_name" value="<?= $spec["name"] ?>">
                                    </label>
                                    <label>
                                        <span>Значение</span>
                                        <input type="text", name="spec_value" value="<?= $spec["value"] ?>">
                                    </label>
                                    <button class="remove_spec">Удалить</button>
                                </div>
                            <?php endforeach ?>
                            <button class="add_spec">Добавить</button>
                        </div>
                        <p>Описание</p>
                        <div class="summernote"><?= $good["Description"] ?></div>
                        <div class="images">
                            <?php foreach ($good["Images"] as $image): ?>
                            <div class="image">
                                <img src="assets/goods/<?= $image ?>" alt="">
                                <input type="file" name="image">
                                <button class="remove_image">Удалить</button>
                            </div>
                            <?php endforeach ?>
                            <?php for ($index = 0; $index < 5 - count($good["Images"]); $index++): ?>
                                <div class="image">
                                    <input type="file" name="image">
                                </div>
                            <?php endfor ?>
                        </div>
                        <div class="categories">
                            <label>
                                <span>Категоря</span>
                                <select name="categories" id="categories">
                                    <?php foreach ($categories as $category): ?>
                                        <?php if ($category["Id"] === $good["Category_id"]): ?>
                                            <option value="<?= $category["Id"] ?>" selected><?= $category["Name"] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $category["Id"] ?>"><?= $category["Name"] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </label>
                        </div>
                        <button class="save_good" data-id="<?= $good["Id"] ?>">Сохранить</button>
                        <button class="delete_good" data-id="<?= $good["Id"] ?>">Удалить</button>
                    </form>
                <?php endforeach ?>
                <form class="good">
                    <label>
                        <span>Название</span>
                        <input name="name" type="text">
                    </label>
                    <label>
                        <span>Обложка</span>
                        <input type="file" name="cover">
                    </label>
                    <label>
                        <span>Цена</span>
                        <input name="price" type="number">
                    </label>
                    <label>
                        <span>Краткая информация</span>
                        <textarea name="info" rows="10"></textarea>
                    </label>
                    <div class="specs">
                        <p>Технические характеристики</p>
                        <button class="add_spec">Добавить</button>
                    </div>
                    <p>Описание</p>
                    <div class="summernote"></div>
                    <div class="images">
                        <?php for ($index = 0; $index < 5; $index++): ?>
                            <div class="image">
                                <input type="file" name="image">
                            </div>
                        <?php endfor ?>
                    </div>
                    <div class="categories">
                        <label>
                            <span>Категоря</span>
                            <select name="categories" id="categories">
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category["Id"] ?>"><?= $category["Name"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </label>
                    </div>
                    <button class="save_good" data-id="new">Добавить</button>
                </form>
<!--                <div id="summernote"></div>-->
            </div>
            <div class="tab" id="reviews" data-id="3">
                <h2>Отзывы</h2>
                <?php foreach($reviews as $review): ?>
                    <div class="review">
                        <p><strong>Пользователь: </strong> <?= $review["User_name"] ?>, <?= $review["Login"] ?></p>
                        <p><strong>Товар: </strong> <?= $review["Good_name"] ?></p>
                        <p><strong>Текст отзыва: </strong> <?= $review["Text"] ?></p>
                        <p><strong>Оценка отзыва: </strong> <?= $review["Rate"] ?></p>
                        <p><strong>Дата: </strong> <?= $review["Date"] ?></p>
                        <button class="delete_review" data-id="<?= $review["Id"] ?>">Удалить</button>
                    </div>
                <?php endforeach ?>
            </div>
        </main>

    <?php endif; ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="assets/js/admin.js"></script>
</body>

</html>