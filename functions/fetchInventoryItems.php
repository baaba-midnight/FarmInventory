<?php 
include "../includes/config.php";

$response = ['success' => false, 'data' => []];

$query = "SELECT 
        i.id,
        i.equipment_id,
        i.item_name, 
        i.category, 
        i.quantity,
        i.approval_status, 
        f.farm_name
    FROM 
        inventory i
    JOIN 
        equipment e ON i.equipment_id = e.id
    JOIN 
        farms f ON e.farm_id = f.id;";

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