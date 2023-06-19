<?php
require_once "../vendor/autoload.php";
use App\DB;
session_start();
$user_id = $_SESSION["user_id"];
$cart = json_encode($_SESSION["cart"]); 
$date = (new DateTime())->format("Y-m-d");
$comment = $_POST["comment"];
$db = new DB();
$result = $db->add_order($user_id, $date, $cart, $comment);
if ($result) {
    unset($_SESSION["cart"]);
    $_SESSION["message"] = "Ваш заказ успешно отправлен";
}
else {
    $_SESSION["message"] = "При оформлении заказа произошла ошибка";
}
header("Location: ../cart.php");