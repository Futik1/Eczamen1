<?php 
session_start();
require_once "../vendor/autoload.php";
use App\Admin_db;
$db = new Admin_db();
if (isset($_SESSION["admin"])) {
    $review_id = $_POST["review_id"];
    $db->delete_review($review_id);
    echo json_encode(["status" => true]);
}
else {
    echo json_encode(["status" => false]);
}