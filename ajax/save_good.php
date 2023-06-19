<?php
session_start();
require_once "../vendor/autoload.php";
use App\Admin_db;
$db = new Admin_db();
if (isset($_SESSION["admin"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $info = $_POST["info"];
    $specs = $_POST["specs"];
    $description = $_POST["description"];
    $category_id = $_POST["category"];
    $good_id = $_POST["good_id"];
    if ($good_id === "new") {
        $good_id = $db->get_last_good_id();
    }
    if (isset($_FILES["cover"])) {
        $new_name = "{$good_id}_{$_FILES["cover"]["name"]}";
        $path = "../assets/goods/{$good_id}_{$_FILES["cover"]["name"]}";
        move_uploaded_file($_FILES["cover"]["tmp_name"], $path);
        $cover = $new_name;
    }
    else {
        $cover = pathinfo($_POST["cover"], PATHINFO_BASENAME);
    }
    $images = [];
    for ($index = 0; $index < 5; $index++) {
        if (isset($_POST["image_$index"])) {
            $images[$index] = pathinfo($_POST["image_$index"], PATHINFO_BASENAME);
        }
        if (isset($_FILES["image_$index"])) {
            $new_name = "{$good_id}_{$_FILES["image_$index"]["name"]}";
            $path = "../assets/goods/{$good_id}_{$_FILES["image_$index"]["name"]}";
            move_uploaded_file($_FILES["image_$index"]["tmp_name"], $path);
            $images[$index] = $new_name;
        }
    }
    $images = json_encode($images);
    if ($_POST["good_id"] === "new") {
        $db->add_good($name, $cover, $price, $info, $specs, $description, $images, $category_id);
    }
    else {
        $db->save_good($good_id, $name, $cover, $price, $info, $specs, $description, $images, $category_id);
    }
    echo json_encode(["status" => true]);
}
else {
    echo json_encode(["status" => false]);
}