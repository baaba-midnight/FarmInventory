<?php
include "../includes/config.php";

// Utility functions used across the application
function sanitize_input($data) {
    // Input sanitization logic
}

function generate_report($type, $params) {
    // Report generation logic
}

function send_notification($user_id, $message, $type) {
    global $conn;

    $query = "INSERT INTO notifications(user_id, message, type, created_at)
                VALUES (?, ?, ?, NOW())";

    // prepare statement
    if ($stmt = $conn->prepare($query)) {
        // bind parameters (user_id, message, type)
        $stmt->bind_param('iss', $user_id, $message, $type);

        // execute the query
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Notification sent successfully'];
        } else {
            return ['success' => false, 'message' => 'Failed to send notification'];
        }
    } else {
        return ['success' => false, 'message' => 'Database query preparation failed'];
    }
}

function check_stock_levels() {
    // Inventory monitoring
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get data from the AJAX request
    $user_id = $_POST['user_id'];
    $message = $_POST['message'];
    $type = $_POST['type'];

    // call the function and send a response
    $response = send_notification($user_id, $message, $type);
    echo json_encode($response);
}
?>