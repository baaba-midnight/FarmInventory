<?php 
include "../../includes/config.php";

$response = ['success' => false, 'data' => []];

$query = "SELECT 
        e.id,
        e.equipment_name, 
        e.category, 
        e.status,
        f.farm_name 
    FROM equipment e
    JOIN farms f ON e.farm_id = f.id;";

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