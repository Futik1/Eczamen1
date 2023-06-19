<?php
    require_once "../vendor/autoload.php";
    use App\DB;
    $db = new DB();
    $login = $_POST["login"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $result = $db->register($login, $password, $name, $phone);
    session_start();
    if ($result) {
        $_SESSION["message"] = "Вы успешно зарегестрировались";
    }
    else {
        $_SESSION["message"] = "При регисрации произошла ошибка";
    }
    header("Location: " . $_SERVER["HTTP_REFERER"]);    