<?php

header("Content-Type: application/json");

$file = "../jsons/gallery.json";

// GET ONE
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $data = json_decode(file_get_contents($file), true);

    foreach ($data as $item) {
        if ($item['id'] == $id) {
            echo json_encode($item);
            exit;
        }
    }

    echo json_encode(["error" => "Not found"]);
    exit;
}

// GET ALL
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo file_get_contents($file);
    exit;
}

// ADD NEW (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents($file), true) ?? [];

    $new = [
        "id" => time(),
        "title" => $_POST["title"],
        "category" => $_POST["category"],
        "image" => $_POST["image"],
        "location" => $_POST["location"],
        "description" => $_POST["description"],
        "date" => date("Y-m-d")
    ];

    $data[] = $new;

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    echo json_encode(["success" => true]);
    exit;
}
?>