<?php
header("Content-Type: application/json");

$file = "../jsons/reviews.json";

// If file doesn't exist, create it
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// Read JSON file
$data = json_decode(file_get_contents($file), true);

// Get action
$action = $_GET['action'] ?? '';

/* GET ALL REVIEWS */
if ($action === "getAllReviews") {
    echo json_encode($data);
    exit;
}

/* GET ONE REVIEW */
if ($action === "getReview") {
    $id = $_GET['id'] ?? null;

    foreach ($data as $review) {
        if ($review['id'] == $id) {
            echo json_encode($review);
            exit;
        }
    }

    echo json_encode(["error" => "Review not found"]);
    exit;
}

/* ADD NEW REVIEW */
if ($action === "addReview") {

    header("Content-Type: application/json");

    // Read existing data
    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
    } else {
        $data = [];
    }

    // fallback safety
    if (!$data) {
        $data = [];
    }

    // Get POST input
    $input = json_decode(file_get_contents("php://input"), true);

    if (!$input) {
        echo json_encode(["error" => "Invalid input"]);
        exit;
    }

    // Build new review
    $newReview = [
        "id" => time(),
        "name" => $input['name'] ?? "Anonymous",
        "role" => "Visitor",
        "rating" => (int)($input['rating'] ?? 5),
        "comment" => $input['comment'] ?? "",
        "location" => $input['location'] ?? "Unknown",
        "date" => date("Y-m-d"),
        "image" => "https://randomuser.me/api/portraits/men/10.jpg"
    ];

    // Append
    $data[] = $newReview;

    // Save
    $result = file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    if ($result === false) {
        echo json_encode(["error" => "Failed to save"]);
        exit;
    }

    echo json_encode(["success" => true]);
    exit;
}

/* DEFAULT RESPONSE */
echo json_encode(["error" => "Invalid action"]);