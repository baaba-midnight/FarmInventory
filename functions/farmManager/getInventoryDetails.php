<?php 
include "../../includes/config.php";

$response = ['success' => false, 'data' => []];

if (isset($_GET['id'])) {
    $itemID =  (int) $_GET['id'];

    $query = "SELECT 
        equipment.equipment_name,
        equipment.category,
        inventory.quantity,
        farms.id AS farm_id
    FROM 
        inventory
    INNER JOIN 
        equipment ON inventory.equipment_id = equipment.id
    INNER JOIN 
        farms ON equipment.farm_id = farms.id
    WHERE 
        equipment.id = ?;";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $itemID);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $item = $result->fetch_assoc();
            $response['success'] = true;
            $response['data'] = $item;
        } else {
            $response['message'] = 'No inventory item found';
        }
    } else {
        $response['message'] = "Failed to fetch item details";
    }
} else {
    $response['message'] = "Invalid item ID.";
}

header('Content-Type: application/json');
echo json_encode($response);

?>