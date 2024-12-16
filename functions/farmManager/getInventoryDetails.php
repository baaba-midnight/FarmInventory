<?php 
include "../../includes/config.php";

$response = ['success' => false, 'data' => []];

if (isset($_GET['id'])) {
    $itemID =  (int) $_GET['id'];

    $query = "SELECT `name`, `category`, `quantity`, `farm_id` FROM `inventory` WHERE `id` = ?";

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