<?php
header("Content-Type: application/json");

$file = "../jsons/food.json";

/* GET ALL FOOD */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo file_get_contents($file);
    exit;
}

/* ADD FOOD */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents($file), true) ?? [];

    $new = [
        "id" => time(),
        "title" => $_POST["title"] ?? "",
        "category" => $_POST["category"] ?? "",
        "image" => $_POST["image"] ?? "",
        "price" => $_POST["price"] ?? "",
        "availability" => $_POST["availability"] ?? "",
        "description" => $_POST["description"] ?? ""
    ];

    $data[] = $new;

    $result = file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    if ($result === false) {
        echo json_encode(["success" => false, "message" => "Write failed"]);
        exit;
    }

    echo json_encode(["success" => true]);
    exit;
}
?>