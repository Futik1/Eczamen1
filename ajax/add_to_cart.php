<?php
    session_start();
    $good_id = $_POST["good_id"];
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }
    if (!isset($_SESSION["cart"][$good_id])) {
        $_SESSION["cart"][$good_id] = 1;
    }
    else {
        $_SESSION["cart"][$good_id]++;
    }
    echo json_encode(["status" => true]);
