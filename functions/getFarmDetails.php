<?php
include "../includes/config.php";

$response = ['success' => false, 'data' => []];

if (isset($_GET['id'])) {
    $farmId = (int) $_GET['id'];

    // Query to fetch farm details
    $query = "SELECT f.farm_name, f.location, f.primary_crop, f.size_acres, u.username AS manager_name, f.created_at
              FROM farms f
              LEFT JOIN farmInventory_users u ON f.farm_manager_id = u.id
              WHERE f.id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $farmId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $farm = $result->fetch_assoc();
            $response['success'] = true;
            $response['data'] = $farm;
        } else {
            $response['message'] = "Farm not found.";
        }
    } else {
        $response['message'] = "Failed to fetch farm details.";
    }
} else {
    $response['message'] = "Invalid farm ID.";
}

header('Content-Type: application/json');
echo json_encode($response);
?>
