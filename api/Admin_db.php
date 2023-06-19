<?php

namespace App;

use mysqli;

class Admin_db
{

    public $link;

    public function __construct()
    {
        $this->link = new mysqli("localhost", "root", "", "shop");
    }

    public function get_orders()
    {
        $result = $this->link->query("SELECT `o`.`Date`, `o`.`Comment`, `o`.`Content`, `u`.`Name`, `u`.`Login`, `u`.`Phone` 
        FROM `orders` `o` LEFT JOIN `users` `u` on `o`.`User_id` = `u`.`Id` ORDER BY `o`.`Id` DESC");
        if ($result && $result->num_rows) {
            $result = $result->fetch_all(MYSQLI_ASSOC);
            return array_map(function ($order) {
                $order["Content"] = json_decode($order["Content"], true);
                $order["Goods"] = [];
                $order["Total_price"] = 0;
                foreach ($order["Content"] as $key => $item) {
                    $good = $this->link->query("SELECT * FROM `goods` WHERE `Id` = $key");
                    if ($good && $good->num_rows) {
                        $good = $good->fetch_assoc();
                        $good["Count"] = $item;
                        $order["Goods"][] = $good;
                    }
                }
                return $order;
            }, $result);
        }
        return [];
    }

    public function get_reviews() {
        $result = $this->link->query("SELECT `r`.`Id`, `r`.`Text`, `r`.`Rate`, `r`.`Date`, `u`.`Login`, `u`.`Name` AS `User_name`, `g`.`Name` AS `Good_name` FROM `reviews` `r`
        LEFT JOIN `users` `u` on `u`.`Id` = `r`.`User_id` 
        LEFT JOIN `goods` `g` on `g`.`Id` = `r`.`Good_id` ORDER BY `r`.`Id` DESC");
        if ($result && $result->num_rows) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function delete_review($id) {
        $id = $this->link->real_escape_string($id);
        $this->link->query("DELETE FROM `reviews` WHERE `Id` = $id");

    }

    public function get_goods() {
        $result = $this->link->query("SELECT * FROM `goods`");
        if ($result && $result->num_rows) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function save_good($good_id, $name, $cover, $price, $info, $specs, $description, $images, $category_id) {
        $good_id = $this->link->real_escape_string($good_id);
        $name = $this->link->real_escape_string($name);
        $cover = $this->link->real_escape_string($cover);
        $price = $this->link->real_escape_string($price);
        $info = $this->link->real_escape_string($info);
        $specs = $this->link->real_escape_string($specs);
        $description = $this->link->real_escape_string($description);
        $images = $this->link->real_escape_string($images);
        $category_id = $this->link->real_escape_string($category_id);
        $this->link->query("UPDATE `goods` SET
        `Name` = '$name', 
        `Cover` = '$cover', 
        `Price` = $price, 
        `Info` = '$info', 
        `Specs` = '$specs', 
        `Description` = '$description', 
        `Images` = '$images',
        `Category_id` = '$category_id'
        WHERE `Id` = $good_id");
    }

    public function add_good($name, $cover, $price, $info, $specs, $description, $images, $category_id) {
        $name = $this->link->real_escape_string($name);
        $cover = $this->link->real_escape_string($cover);
        $price = $this->link->real_escape_string($price);
        $info = $this->link->real_escape_string($info);
        $specs = $this->link->real_escape_string($specs);
        $description = $this->link->real_escape_string($description);
        $images = $this->link->real_escape_string($images);
        $category_id = $this->link->real_escape_string($category_id);
        $this->link->query("INSERT INTO `goods` (`Name`, `Cover`, `Price`, `Info`, `Specs`, `Description`, `Images`, `Category_id`)
        VALUES ('$name', '$cover', $price, '$info', '$specs', '$description', '$images', $category_id)");
    }

    public function get_last_good_id() {
        $result = $this->link->query("SELECT `Id` FROM `goods` ORDER BY `Id` DESC LIMIT 0, 1");

        if ($result && $result->num_rows) {
            return $result->fetch_assoc()["Id"] + 1;
        }

        return 0;
    }

    public function delete_good($good_id) {
        $good_id = $this->link->real_escape_string($good_id);
        $this->link->query("DELETE FROM `goods` WHERE `Id` = $good_id");
    }

    public function get_categories() {
        $result = $this->link->query("SELECT * FROM `categories`");
        if ($result && $result->num_rows) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function get_category_by_id($category_id) {
        $result = $this->link->query("SELECT * FROM `categories` WHERE `Id` = $category_id");
        if ($result && $result->num_rows) {
            return $result->fetch_assoc();
        }

        return [];
    }
}
