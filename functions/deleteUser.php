<?php
include "../includes/config.php";

$response = ['success' => false];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = (int) $_POST['id'];

    $query = "DELETE FROM `farminventory_users` WHERE id= ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $response['message'] = "User deleted successfully";
        $response['success'] = true;
    } else {
        $response['message'] = "Failed to delete user";
    }
    echo json_encode($response);
} else {
    $response['message'] = "Wrong request method";
    echo json_encode($response);
}
?>