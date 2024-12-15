<?php 
include "../../includes/config.php";

$response = ['success' => false, 'data' => []];

$query = "SELECT 
    inventory.id,
    equipment.equipment_name,
    inventory.equipment_id,
    equipment.category,
    inventory.quantity,
    farms.farm_name
FROM 
    inventory
INNER JOIN 
    equipment ON inventory.equipment_id = equipment.id
INNER JOIN 
    farms ON equipment.farm_id = farms.id;";

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