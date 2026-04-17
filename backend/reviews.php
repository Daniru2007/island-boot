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

/* =========================
   GET ALL REVIEWS
========================= */
if ($action === "getAllReviews") {
    echo json_encode($data);
    exit;
}

/* =========================
   GET ONE REVIEW
========================= */
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

/* =========================
   ADD NEW REVIEW
========================= */
if ($action === "addReview") {

    // Get raw POST JSON
    $input = json_decode(file_get_contents("php://input"), true);

    if (!$input) {
        echo json_encode(["error" => "Invalid input"]);
        exit;
    }

    // Ensure unique ID
    $input['id'] = time();

    // Add missing fields safely
    $input['name'] = $input['name'] ?? "Anonymous";
    $input['role'] = $input['role'] ?? "Visitor";
    $input['rating'] = $input['rating'] ?? 5;
    $input['comment'] = $input['comment'] ?? "";
    $input['location'] = $input['location'] ?? "Unknown";
    $input['date'] = date("Y-m-d");
    $input['image'] = $input['image'] ?? "https://randomuser.me/api/portraits/men/10.jpg";

    // Append to array
    $data[] = $input;

    // Save back to JSON
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    echo json_encode(["success" => true]);
    exit;
}

/* =========================
   DEFAULT RESPONSE
========================= */
echo json_encode(["error" => "Invalid action"]);