<?php 
include "../../includes/config.php";

$response = ['success' => false, 'data' => []];

if (isset($_GET['id'])) {
    $itemId = (int) $_GET['id'];

    // Query to fetch item$item details
    $query = "SELECT `name`, `category`, `condition`, `farm_id` FROM `equipment` WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $itemId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $item = $result->fetch_assoc();
            $response['success'] = true;
            $response['data'] = $item;
        } else {
            $response['message'] = "Item not found.";
        }
    } else {
        $response['message'] = "Failed to fetch item details.";
    }
} else {
    $response['message'] = "Invalid item ID.";
}

header('Content-Type: application/json');
echo json_encode($response);
?>