<?php
include "../includes/config.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $response = ['success' => false, 'data' => []];

    $query = "SELECT 
                (SELECT COUNT(*) FROM farms) AS total_farms,
                (SELECT COUNT(*) FROM farmInventory_users) AS total_users,
                (SELECT COUNT(*) FROM inventory) AS total_inventory_items";

    $stmt = $conn->prepare($query);
    $stats = [];

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $stats[] = [
                'totalFarms' => (int) $row['total_farms'],
                'totalUsers' => (int) $row['total_users'],
                'totalInventoryItems' => (int) $row['total_inventory_items']
            ];
        }
        $response['data'] = $stats;
        $response['success'] = true;
    } else {
        $response['message'] = 'Error executing the query';
    }

    $stmt->close();
    echo json_encode($response);
}

?>