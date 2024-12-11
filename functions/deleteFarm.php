<?php
include "../includes/config.php";

$response = ['success' => false, 'message' => []];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = (int) $_POST['id'];

    $query = "DELETE FROM `farms` WHERE id= ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $response['message'] = "Farm Successfully Deleted";
        $response['success'] = true;
    } else {
        $response['message'] = "Could not prepare query";
    }
    echo json_encode($response);
} else {
    $response['message'] = "Wrong request method";
    echo json_encode($response);
}

?>