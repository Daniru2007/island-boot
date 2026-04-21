<?php
header("Content-Type: application/json");
// Path to your JSON file - ensure this path is correct relative to this php file
$file = '../jsons/packages.json';

// 1. Read existing data using json_decode (Requirement met)
$json_data = file_get_contents($file);
$packages = json_decode($json_data, true);

// Get the action from the AJAX URL
$action = $_GET['action'] ?? '';

// --- Get all Records---
if ($action == 'getAll') {
    echo json_encode($packages);
} 

// --- Get One Specific Record ---
elseif ($action == 'getOne' && isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($packages as $pkg) {
        if ($pkg['id'] == $id) {
            echo json_encode($pkg);
            exit;
        }
    }
}

// ---add/update custom (post) request---
elseif ($action == 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read the JSON data sent from the AJAX frontend
    $input = file_get_contents('php://input');
    $customRequest = json_decode($input, true);
    
    $targetId = 5; // We use ID 5 as our "Custom" placeholder
    $found = false;

    // Loop through and update the Custom entry if it exists
    foreach ($packages as $key => $pkg) {
        if ($pkg['id'] == $targetId) {
            $packages[$key]['name'] = $customRequest['name'];
            $packages[$key]['price'] = (strpos($customRequest['budget'], 'Luxury') !== false) ? 500000 : 150000;
            $packages[$key]['room'] = "Custom Accommodation";
            $packages[$key]['meals'] = "Flexible Dining";
            $packages[$key]['tours'] = (int)$customRequest['duration'];
            $packages[$key]['waterSports'] = true;
            $found = true;
            break;
        }
    }

    // If ID 5 doesn't exist yet, add it
    if (!$found) {
        $customRequest['id'] = $targetId;
        // Map UI names to JSON names for consistency
        $customRequest['price'] = 150000; 
        $customRequest['room'] = "Custom Accommodation";
        $customRequest['meals'] = "Flexible Dining";
        $customRequest['tours'] = (int)$customRequest['duration'];
        $customRequest['waterSports'] = true;
        $packages[] = $customRequest;
    }
    
    // Save back to JSON file (Requirement: Persist data)
    file_put_contents($file, json_encode($packages, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    
    echo json_encode(['success' => true, 'message' => 'Custom package updated']);
}
?>