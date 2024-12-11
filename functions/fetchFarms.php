<?php 
include "../includes/config.php";

$response = ['success' => false, 'data' => []];

$query = "SELECT 
            f.id,
            f.farm_name,
            f.location,
            f.primary_crop,
            f.size_acres,
            u.username AS farm_manager
        FROM farms f
        LEFT JOIN farmInventory_users u ON f.farm_manager_id = u.id;";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response['data'][] = $row;
    }
    $response['success'] = true;
} else {
    $response['message'] = 'No inventory item found';
}

echo json_encode($response);

?>