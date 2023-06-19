<?php

namespace App;

use mysqli;

class DB
{

    public $link;

    public function __construct()
    {
        $this->link = new mysqli("localhost", "root", "", "shop");
    }

    public function get_good_by_id($id)
    {
        $id = $this->link->real_escape_string($id);
        $result = $this->link->query("SELECT * FROM `goods` WHERE `Id` = '$id'");

        if ($result && $result->num_rows) {
            return $result->fetch_assoc();
        }

        return [];
    }

    public function get_all_goods()
    {
        $result = $this->link->query("SELECT * FROM `goods`");
        if ($result && $result->num_rows) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function get_filtered_goods($category_id)
    {
        $category_id = $this->link->real_escape_string($category_id);
        $result = $this->link->query("SELECT * FROM `goods` WHERE `Category_id` = $category_id");
        if ($result && $result->num_rows) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function get_categories()
    {
        $result = $this->link->query("SELECT * FROM `categories`");
        if ($result && $result->num_rows) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function get_goods_by_query($query)
    {
        $query = $this->link->real_escape_string($query);
        $result = $this->link->query("SELECT * FROM `goods` WHERE `Name` LIKE '%$query%'");
        if ($result && $result->num_rows) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function register($login, $password, $name, $phone = null)
    {
        $login = $this->link->real_escape_string($login);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $name = $this->link->real_escape_string($name);

        if ($phone) {
            $phone = $this->link->real_escape_string($phone);
            $phone = "'$phone'";
        } else {
            $phone = "NULL";
        }
        $user_exists = $this->link->query("SELECT * FROM `users` WHERE `Login` = '$login'");
        if ($user_exists && !$user_exists->num_rows) {
            $this->link->query("INSERT INTO `users` (`Name`, `Login`, `Password`, `Phone`) VALUES ('$name', '$login', '$password', $phone)");
            return $this->link->errno === 0;
        } else {
            return false;
        }
    }

    public function get_user_by_login($login)
    {
        $login = $this->link->real_escape_string($login);
        $user_exists = $this->link->query("SELECT * FROM `users` WHERE `Login` = '$login'");
        if ($user_exists && $user_exists->num_rows) {
            return $user_exists->fetch_assoc();
        }
        return [];
    }

    public function get_user_by_id($id)
    {
        $id = $this->link->real_escape_string($id);
        $user = $this->link->query("SELECT * FROM `users` WHERE `Id` = '$id'");
        if ($user && $user->num_rows) {
            return $user->fetch_assoc();
        }
        return [];
    }

    public function add_review($user_id, $good_id, $date, $rate, $review) {
        $user_id = $this->link->real_escape_string($user_id);
        $good_id = $this->link->real_escape_string($good_id);
        $date = $this->link->real_escape_string($date);
        $rate = $this->link->real_escape_string($rate);
        $review = $this->link->real_escape_string($review);
        $this->link->query("INSERT INTO `reviews` (`User_id`, `Good_id`, `Date`, `Text`, `Rate`) VALUES ($user_id, $good_id, '$date', '$review', $rate)");
        return $this->link->errno === 0;
    }

    public function get_good_reviews($good_id) {
        $good_id = $this->link->real_escape_string($good_id);
        $reviews = $this->link->query("SELECT `r`.`Rate`, `r`.`Date`, `r`.`Text`, `u`.`Name` 
        FROM `reviews` `r` LEFT JOIN `users` `u` ON `u`.`Id` = `r`.`User_id` WHERE `Good_id` = $good_id ORDER BY `r`.`Id` DESC");
        if ($reviews && $reviews->num_rows) {
            return $reviews->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function add_order($user_id, $date, $content, $comment) {
        $user_id = $this->link->real_escape_string($user_id);
        $date = $this->link->real_escape_string($date);
        $content = $this->link->real_escape_string($content);
        $comment = $this->link->real_escape_string($comment);
    
        $this->link->query("INSERT INTO `orders` (`User_id`, `Date`, `Content`, `Comment`) VALUES ($user_id, '$date', '$content', '$comment')");
        return $this->link->errno === 0;
    }
}
