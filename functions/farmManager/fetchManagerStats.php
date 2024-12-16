<?php
include "../../includes/config.php";

function getFarmManagerStats($farm_id, $conn) {
    $farm_id = (int) $farm_id;
    // Initialize the statistics array
    $stats = [
        'total_inventory_items' => 0,
        'low_stock_items' => 0,
        'total_equipment' => 0,
        'functional_equipment' => 0,
        'non_functional_equipment' => 0,
        'pending_approvals' => 0
    ];

    // Query for total inventory items
    $query = "SELECT COUNT(*) AS total 
        FROM inventory i
        JOIN farms f ON f.id = i.farm_id
        WHERE f.farm_manager_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $farm_id);
    $stmt->execute();
    $stmt->bind_result($stats['total_inventory_items']);
    $stmt->fetch();
    $stmt->close();

    // Query for low stock items (e.g., quantity < 10)
    $query = "SELECT COUNT(*) AS total
            FROM inventory i
            JOIN farms f ON f.id = i.farm_id
            WHERE f.farm_manager_id = ? AND i.quantity < 10;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $farm_id);
    $stmt->execute();
    $stmt->bind_result($stats['low_stock_items']);
    $stmt->fetch();
    $stmt->close();

    // Query for total equipment
    $query = "SELECT COUNT(*) AS total 
            FROM equipment e
            JOIN farms f ON f.id = e.farm_id
            WHERE f.farm_manager_id = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $farm_id);
    $stmt->execute();
    $stmt->bind_result($stats['total_equipment']);
    $stmt->fetch();
    $stmt->close();

    // Query for functional equipment
    $query = "SELECT COUNT(*) AS total
                FROM equipment e
                JOIN farms f ON f.id = e.farm_id
                WHERE f.farm_manager_id = ? AND e.condition = 'Functional';";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $farm_id);
    $stmt->execute();
    $stmt->bind_result($stats['functional_equipment']);
    $stmt->fetch();
    $stmt->close();

    // Query for non-functional equipment (Needs Repair or Broken)
    $query = "SELECT COUNT(*) AS total
            FROM equipment e
            JOIN farms f ON f.id = e.farm_id
            WHERE f.farm_manager_id = ? AND e.condition IN ('Needs Repair', 'Broken');";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $farm_id);
    $stmt->execute();
    $stmt->bind_result($stats['non_functional_equipment']);
    $stmt->fetch();
    $stmt->close();

    // Query for pending approvals
    $query = "SELECT COUNT(*) AS total
            FROM equipment e
            JOIN farms f ON f.id = e.farm_id
            WHERE f.farm_manager_id = ? AND e.approval_status = 'Pending';";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $farm_id);
    $stmt->execute();
    $stmt->bind_result($stats['pending_approvals']);
    $stmt->fetch();
    $stmt->close();

    return $stats;
}

$response = ['success' => false];
if (isset($_GET['id'])) {
    if ($_GET['action'] === 'dashbaordStats') {
        $stats = getFarmManagerStats($_GET['id'], $conn);
        $response['success'] = true;
        $response['data'] = $stats;
        $response['message'] = "Data Successfully Retrieved";
    }
} else {
    $reponse['message'] = "No id set";
}

echo json_encode($response);
?>