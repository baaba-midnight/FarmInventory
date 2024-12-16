<?php
include "../../includes/config.php";

$response = ['success' => false, 'data' => []];

$query = "SELECT inventory.*, farms.farm_name AS farm_name 
        FROM inventory 
        JOIN farms ON inventory.farm_id = farms.id
        ORDER BY approval_status;";

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
