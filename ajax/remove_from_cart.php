<?php
    session_start();
    $good_id = $_POST["good_id"];
    $_SESSION["cart"][$good_id]--;
    if (($_SESSION["cart"][$good_id]) === 0) {
        unset($_SESSION["cart"][$good_id]);
    }
    echo json_encode(["status" => true]);