<?php 
session_start();

include "../../includes/config.php";

$response = ['success' => false, 'data' => []];

$userID = $_SESSION['id'];
$query = "SELECT inventory.*, farms.farm_name AS farm_name 
        FROM inventory 
        JOIN farms ON inventory.farm_id = farms.id
        WHERE farms.farm_manager_id = ?
        ORDER BY approval_status;";

$stmt = $conn->prepare($query);
$stmt->bind_param('i', $userID);
$stmt->execute();
$result = $stmt->get_result();

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