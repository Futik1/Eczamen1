<?php
session_start();
require_once "vendor/autoload.php";

use App\DB;

$db = new DB();
$cart = $_SESSION["cart"] ?? [];
$goods = [];
$total_price = 0;
foreach ($cart as $key => $count) {
    $good = $db->get_good_by_id($key);
    $goods[] = [
        "good" => $good,
        "count" => $count
    ];
    $total_price += $count * $good["Price"];
}

$user_id = $_SESSION["user_id"] ?? false;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Магазин</title>
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/cart.css">
</head>

<body>

    <?php include "html/header.php" ?>
    <?php include "html/popup_message.php" ?>

    <main>
        <h1>Корзина</h1>
        <?php if (!count($goods)) : ?>
            <h2>Вы еще ничего не добавили</h2>
        <?php endif; ?>
        <div class="goods">
            <?php foreach ($goods as $good) : ?>
                <a href="good.php?id=<?= $good["good"]["Id"] ?>" class="good">
                    <div class="image">
                        <img src="assets/goods/<?= $good["good"]["Cover"] ?>" alt="">
                    </div>
                    <div class="text">
                        <p class="name"><?= $good["good"]["Name"] ?></p>
                        <p class="id"><?= number_format($good["good"]["Price"], 0, null, " ") ?> * <?= $good["count"] ?></p>
                    </div>
                    <div class="price">
                        <p> <?= number_format($good["good"]["Price"] * $good["count"], 0, null, " ") ?></p>
                        <button class="delete_button" data-id="<?= $good["good"]["Id"] ?>">
                            <img src="assets/images/delete-svgrepo-com.svg" alt="">
                        </button>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
        <?php if (count($goods)) : ?>
            <div class="actions">
                <a href="ajax/empty_cart.php">
                    <button>Удалить всё</button>
                </a>
            </div>
        <?php endif ?>
        <div class="total">
            <p class="text">Общая стоимость:</p>
            <p class="price"><?= number_format($total_price, 0, null, " ") ?></p>
        </div>
        <div class="order">
            <?php if (!$user_id) : ?>
                <h2>Для оформления заказа нужно авторизоваться</h2>
            <?php elseif (!count($goods)) : ?>
                <h2>Для оформления нужно добавить что то в корзину</h2>
            <?php else : ?>
                <form action="ajax/proceed_order.php" autocomplete="off" method="post">
                    <label for="comment">Комментарий</label>
                    <textarea name="comment" id="comment" rows="10"></textarea>
                    <button>Заказать</button>
                </form>
            <?php endif ?>
        </div>
    </main>

    <?php include "html/footer.html" ?>

    <script src="assets/js/common.js"></script>

</body>

</html>