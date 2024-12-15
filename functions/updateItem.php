<?php 
include "../includes/config.php";

$response = ["success" => false];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $input = json_decode(file_get_contents('php://input'), true);

    $id = (int) $input['itemID'];
    $name = $input['name'];
    $category = $input['category'];
    $quantity = (int) $input['quantity'];
    $status = $input['status'];

    $query = "UPDATE `inventory` SET `item_name`=?,`category`=?,`quantity`=?,`approval_status`= ? WHERE `id` = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssisi', $name, $category, $quantity, $status, $id);

    if ($stmt->execute()) {
        $response['message'] = "Updated Successfully";
        $response['success'] = true;
    } else {
        $response['message'] = "Failed to execute query";
    }
    echo json_encode($response);
} else {
    $response['message'] = "Wrong request method";
    echo json_encode($response);
}
?>