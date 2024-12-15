<?php 
include "../../includes/config.php";

$response = ['success' => false, 'data' => []];
$userID = (int) $_GET['id'];

$query = "SELECT 
            f.id,
            f.farm_name,
            f.location,
            f.primary_crop,
            f.size_acres,
            u.username AS farm_manager
        FROM farms f
        LEFT JOIN farmInventory_users u ON f.farm_manager_id = u.id
        WHERE f.farm_manager_id = ?";

$stmt = $conn->prepare($query);

// Bind parameters and execute
$stmt->bind_param('i', $userID);
$stmt->execute();
    
// Get result of the query
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response['data'][] = $row;
    }
    $response['success'] = true;
} else {
    $response['message'] = 'No farms found';
}

echo json_encode($response); // Return response as JSON

?>