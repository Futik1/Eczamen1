<?php
    require_once "../vendor/autoload.php";
    use App\DB;


    if (isset($_POST["query"])) {
        $db = new DB();
        $goods = $db->get_goods_by_query($_POST["query"]);
        if (count($goods)) {
            $response = [
                "status" => true,
                "goods" => $goods
            ];
        }
        else {
            $response = [
                "status" => false
            ];
        }

    }
    else {
        $response = [
            "status" => false
        ];
    }
    echo json_encode($response, JSON_UNESCAPED_UNICODE);