<?php
if ($_POST["login"] === "admin" && $_POST["password"] === "123qwe") {
    session_start();
    $_SESSION["admin"] = true;
}
header("Location: ../admin.php");
