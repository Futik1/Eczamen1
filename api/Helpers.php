<?php

namespace App;

class Helpers {
    static function get_d_F_date($date) {
        $day = $date->format("d");
        $month = intval($date->format("m"));
        $months = [
            "",
            "января",
            "февраля",
            "марта",
            "апреля",
            "мая",
            "июня",
            "июля",
            "августа",
            "сентября",
            "октября",
            "ноября",
            "декабря"
        ];
        return "$day $months[$month]";
    }
}