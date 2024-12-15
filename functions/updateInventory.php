<?php 
include "../includes/config.php";

$response = ["success" => false];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $input = json_decode(file_get_contents('php://input'), true);

    $id = (int) $input['itemID'];
    $name = $input['name'];
    $category = $input['category'];
    $farmName = (int) $input['farmName'];
    $quantity = (int) $input['quantity'];

    $query = "UPDATE `equipment` SET `equipment_name`= ?,`category`= ?, `farm_id` = ? WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssii', $name, $category, $farmName, $id);

    $query = "UPDATE `inventory` SET `item_name`=?,`category`=?, `quantity`=? WHERE `equipment_id` = ?;";
    $stmt1 = $conn->prepare($query);
    $stmt1->bind_param('ssii', $name, $category, $quantity, $id);
    

    if ($stmt->execute()) {
        if ($stmt1->execute()) {
            $response['message'] = "Updated Successfully";
            $response['success'] = true;
        }
    } else {
        $response['message'] = "Failed to execute query";
    }
    echo json_encode($response);
} else {
    $response['message'] = "Wrong request method";
    echo json_encode($response);
}
?>