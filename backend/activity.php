<?php
header('Content-Type: application/json');
$jsonFile = '../jsons/activitiy.json';

// helper functions
function getRecords($file) {
    if (!file_exists($file)) return [];
    $content = file_get_contents($file);
    return json_decode($content, true) ?: [];
}

function saveRecords($file, $data) {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

// CRUD operations
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $records = getRecords($jsonFile);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $filtered = array_filter($records, fn($r) => $r['id'] == $id);
        echo json_encode(array_values($filtered)[0] ?? ["error" => "Not found"]);
    } else {
        echo json_encode($records);
    }
} 
elseif ($method === 'POST') {
    $records = getRecords($jsonFile);
    

    if (isset($_POST['activityId']) && !empty($_POST['activityId'])) {
        // Update
        foreach ($records as &$r) {
            if ($r['id'] == $_POST['activityId']) {
                $r['name'] = $_POST['activityName'];
                $r['description'] = $_POST['activityDescription'];
                $r['type'] = $_POST['activityType'];
                $r['price'] = $_POST['activityPrice'];
                $r['discount'] = $_POST['activityDiscount'];
            }
        }
    } else {
        // POST
        $newRecord = [
            "id" => time(), 
            "name" => $_POST['activityName'],
            "description" => $_POST['activityDescription'],
            "type" => $_POST['activityType'],
            "price" => $_POST['activityPrice'],
            "discount" => $_POST['activityDiscount']
        ];
        $records[] = $newRecord;
    }

    saveRecords($jsonFile, $records);
    echo json_encode(["status" => "success", "message" => "Data saved"]);
}
?>