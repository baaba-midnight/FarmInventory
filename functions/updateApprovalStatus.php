<?php 
include "../includes/config.php";

function updateApprovalStatus($id, $status) {
    global $conn;
    
    $stmt = $conn->prepare("UPDATE inventory SET approval_status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

if ($_POST['action'] == 'approve') {
    updateApprovalStatus($_POST['id'], 'Approved');
} elseif ($_POST['action'] == 'reject') {
    updateApprovalStatus($_POST['id'], 'Rejected');
}

?>