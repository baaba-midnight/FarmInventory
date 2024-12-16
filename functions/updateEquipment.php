<?php 
include "../includes/config.php";

$response = ["success" => false];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $input = json_decode(file_get_contents('php://input'), true);

    $id = (int) $input['itemID'];
    $name = $input['name'];
    $category = $input['category'];
    $condition = $input['condition'];
    $farmName = (int) $input['farmName'];

    $query = "UPDATE `equipment` SET `name`= ?,`category`= ?,`condition`= ?,`farm_id`= ? WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssii', $name, $category, $condition, $farmName, $id);

    // $query = "UPDATE `inventory` SET `item_name`=?,`category`=? WHERE `equipment_id` = ?;";
    // $stmt1 = $conn->prepare($query);
    // $stmt1->bind_param('ssi', $name, $category, $id);
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