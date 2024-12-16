<?php 
include "../../includes/config.php";

$response = ['success' => false, 'data' => []];

$query = "SELECT equipment.*, farms.farm_name AS farm_name 
            FROM equipment
            JOIN farms ON equipment.farm_id = farms.id
            ORDER BY approval_status;";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response['data'][] = $row;
    }
    $response['success'] = true;
} else {
    $response['message'] = 'No equipment found';
}

echo json_encode($response);

?>