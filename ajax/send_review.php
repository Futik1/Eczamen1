<?php
session_start();
require_once "../vendor/autoload.php";

use App\DB;

$user_id = $_SESSION["user_id"];
$good_id = $_POST["good_id"];
$rate = $_POST["rate"];
$review = $_POST["review"];
$date = (new DateTime())->format("Y-m-d");
$db = new DB();
$result = $db->add_review($user_id, $good_id, $date, $rate, $review);
if (!$result) {
    $_SESSION["message"] = "При добавлении отзыва произошла ошибка";
}
header("Location: " . $_SERVER["HTTP_REFERER"]);
