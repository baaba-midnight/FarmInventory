<?php 
include "../includes/config.php";

$response = ["success" => false];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $input = json_decode(file_get_contents('php://input'), true);

    $id = (int) $input['userID'];
    $username = $input['username'];
    $email = $input['email'];
    $role = $input['role'];

    $query = "UPDATE `farminventory_users` SET `username`= ?,`role`=?,`email`=? WHERE `id` = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssi', $username, $role, $email, $id);

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