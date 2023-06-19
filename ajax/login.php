<?php
    require_once "../vendor/autoload.php";
    use App\DB;
    session_start();
    $db = new DB();
    $login = $_POST["login"];
    $password = $_POST["password"];
    $user = $db->get_user_by_login($login);
    if (count($user)) {
        if (password_verify($password, $user["Password"])) {
            $_SESSION["user_id"] = $user["Id"];
        }
        else {
            $_SESSION["message"] = "Неверный логин или пароль";
        }
    }
    else {
        $_SESSION["message"] = "Неверный логин или пароль";
    }
    header("Location: " . $_SERVER["HTTP_REFERER"]);   