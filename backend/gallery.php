<?php
header("Content-Type: application/json");

$file = "data.json";

// read json
function readData($file) {
    if (!file_exists($file)) {
        return [];
    }
    $json = file_get_contents($file);
    return json_decode($json, true) ?? [];
}

// write json
function saveData($file, $data) {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

// get request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $data = readData($file);

    // get 1 record
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        foreach ($data as $record) {
            if ($record['id'] == $id) {
                echo json_encode($record);
                exit;
            }
        }

        echo json_encode(["message" => "Record not found"]);
        exit;
    }

    // get all records
    echo json_encode($data);
    exit;
}

// post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = readData($file);

    // create new record
    $newRecord = [
        "id" => time(), // simple unique ID
        "name" => $_POST['name'] ?? '',
        "email" => $_POST['email'] ?? '',
        "age" => $_POST['age'] ?? '',
        "city" => $_POST['city'] ?? '',
        "phone" => $_POST['phone'] ?? ''
    ];

    $data[] = $newRecord;

    saveData($file, $data);

    echo json_encode(["message" => "Record added successfully"]);
    exit;
}
?>
