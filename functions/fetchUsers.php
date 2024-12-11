<?php 
include "../includes/config.php";

$response = ['success' => false, 'data' => []];

$query = "SELECT `id`, `username`,`role`, `email` FROM `farminventory_users`;";

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