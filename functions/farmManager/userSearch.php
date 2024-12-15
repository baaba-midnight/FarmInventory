<?php
include '../../includes/config.php'; // Include your database connection

header('Content-Type: application/json');

if (isset($_GET['context']) && isset($_GET['query'])) {
    $context = $_GET['context'];
    $query = $_GET['query'];
    $userID = $_GET['id'];

    $data = []; // To hold the results

    if ($context === 'inventory') {
        $sql = "SELECT i.id, e.equipment_name, e.category, i.quantity, f.farm_name FROM inventory i INNER JOIN equipment e ON i.equipment_id = e.id INNER JOIN farms f ON e.farm_id = f.id WHERE e.equipment_name LIKE '%$query%' AND f.farm_manager_id = $userID";
    } elseif ($context === 'farm_management') {
        $sql = "SELECT f.id, f.farm_name, f.location, f.primary_crop, f.size_acres, u.username AS farm_manager FROM farms f LEFT JOIN farmInventory_users u ON f.farm_manager_id = u.id WHERE (f.farm_name LIKE '%$query%' OR f.location LIKE '%$query%') AND f.farm_manager_id = $userID";
    } elseif ($context === 'user_management') {
        $sql = "SELECT `id`, `username`,`role`, `email` FROM `farminventory_users` WHERE (username LIKE '%$query%' OR role LIKE '%$query%') AND f.farm_manager_id = $userID";
    } else if ($context === 'equipment') {
        $sql = "SELECT e.id, e.equipment_name, e.category, e.status, f.farm_name FROM equipment e JOIN farms f ON e.farm_id = f.id WHERE (equipment_name LIKE '%$query%' OR status LIKE '%$query%') AND f.farm_manager_id = $userID";
    }else {
        echo json_encode(['error' => 'Invalid context']);
        exit;
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    echo json_encode($data);
}
?>
