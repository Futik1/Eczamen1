<?php
session_start();
require_once "../vendor/autoload.php";
use App\Admin_db;
$db = new Admin_db();
if (isset($_SESSION["admin"])) {
    $good_id = $_POST["good_id"];
    $db->delete_good($good_id);
    echo json_encode(["status" => true]);
}
else {
    echo json_encode(["status" => false]);
}