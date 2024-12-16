<?php
include "../../includes/config.php";

// Check if the request is valid
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['item_id'], $input['action'])) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON string.']);
        exit;
    }

    $item_id = $input['item_id'];
    $action = $input['action']; // Either 'approve' or 'reject'

    // Validate action
    if (!in_array($action, ['approve', 'reject'])) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid action.']);
        exit;
    }

    // Update the approval_status in the appropriate table
    $table = $input['type'] === 'inventory' ? 'inventory' : 'equipment'; // Determine the table
    $status = ($action === 'approve') ? 'Approved' : 'Rejected';

    $stmt = $conn->prepare("UPDATE `$table` SET approval_status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $item_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => ucfirst($action) . 'd successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update status.']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}

$conn->close();
?>
