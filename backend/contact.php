<?php

header('Content-Type: application/json');

$file = "../jsons/data.json";
$directory = dirname($file);

// TEST ENDPOINT
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['test'])) {
    $response = [
        "file_path" => realpath($directory) ? realpath($directory) . "/data.json" : "Path not found",
        "directory_exists" => is_dir($directory),
        "directory_writable" => is_writable($directory),
        "file_exists" => file_exists($file),
        "file_writable" => file_exists($file) ? is_writable($file) : "N/A"
    ];
    echo json_encode($response);
    exit;
}

// Ensure directory exists
if (!is_dir($directory)) {
    mkdir($directory, 0755, true);
}

// CREATE FILE IF NOT EXISTS
if (!file_exists($file)) {
    file_put_contents($file, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// READ ALL RECORDS
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['id'])) {
    $data = file_get_contents($file);
    echo $data;
}

// READ ONE RECORD
elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = json_decode(file_get_contents($file), true);

    if (isset($data[$id])) {
        echo json_encode($data[$id]);
    } else {
        echo json_encode(["error" => "Record not found"]);
    }
}

// ADD NEW RECORD
elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    try {
        $fileContent = file_get_contents($file);
        $data = json_decode($fileContent, true);
        
        // If data is null (invalid JSON), start fresh
        if ($data === null) {
            $data = [];
        }
        
        $nextId = count($data) > 0 ? max(array_column($data, 'id')) + 1 : 0;

        $newRecord = [
            "id" => $nextId,
            "name" => $_POST['name'] ?? '',
            "email" => $_POST['email'] ?? '',
            "phone" => $_POST['phone'] ?? '',
            "checkin" => $_POST['checkin'] ?? '',
            "checkout" => $_POST['checkout'] ?? '',
            "guests" => $_POST['guests'] ?? '',
            "room" => $_POST['room'] ?? '',
            "created_at" => date('Y-m-d H:i:s')
        ];

        $data[] = $newRecord;

        $result = file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        
        if ($result === false) {
            echo json_encode([
                "error" => "Failed to write to file",
                "directory" => $directory,
                "writable" => is_writable($directory)
            ]);
        } else {
            echo json_encode(["success" => "Data Saved Successfully", "id" => $nextId]);
        }
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}

?>