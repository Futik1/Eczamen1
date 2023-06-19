<?php
    session_start();
    require_once "vendor\autoload.php";
    use App\DB;
    $db = new DB();
    if (isset($_GET["category_id"])) {
        $goods = $db->get_filtered_goods($_GET["category_id"]);
    }
    else {
        $goods = $db->get_all_goods();
    }
    $categories = $db->get_categories();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Магазин</title>
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>

<?php include "html/header.php" ?>
<?php include "html/popup_message.php" ?>

<main>
    <button class="nav_button">
        <img src="assets/images/menu-svgrepo-com.svg" alt="">
    </button>
    <nav>
        <ul>
            <?php foreach ($categories as $category): ?>
            <li><a href="?category_id=<?= $category["Id"]?>"><?= $category["Name"] ?></a></li>
            <?php endforeach ?>
        </ul>
    </nav>
    <div class="goods">
        <?php foreach ($goods as $good): ?>
            <a href="good.php?id=<?= $good["Id"] ?>" class="good">
                <div class="image">
                    <img src="assets/goods/<?= $good["Cover"] ?>" alt="">
                </div>
                
                <p class="name"><?= $good["Name"] ?></p>
                
            </a>
        <?php endforeach ?>
    </div>
</main>

<?php include "html/footer.html" ?>

<script src="assets/js/common.js"></script>
<script src="assets/js/index.js"></script>

</body>
</html>