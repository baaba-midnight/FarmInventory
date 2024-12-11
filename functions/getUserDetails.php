<?php
include "../includes/config.php";

$response = ['success' => false, 'data' => []];

if (isset($_GET['id'])) {
    $userId = (int) $_GET['id'];

    // Query to fetch user$user details
    $query = "SELECT `username`, `role`, `email` FROM `farminventory_users` WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $response['success'] = true;
            $response['data'] = $user;
        } else {
            $response['message'] = "user not found.";
        }
    } else {
        $response['message'] = "Failed to fetch user details.";
    }
} else {
    $response['message'] = "Invalid user ID.";
}

header('Content-Type: application/json');
echo json_encode($response);
?>
