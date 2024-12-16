<?php
include '../../includes/config.php'; // Include your database connection

header('Content-Type: application/json');

if (isset($_GET['context']) && isset($_GET['query'])) {
    $context = $_GET['context'];
    $query = $_GET['query'];
    $userID = $_GET['id'];

    $data = []; // To hold the results

    if ($context === 'inventory') {
        $sql = "SELECT inventory.*, farms.farm_name AS farm_name FROM inventory JOIN farms ON inventory.farm_id = farms.id WHERE inventory.name LIKE '%$query%' AND farms.farm_manager_id = $userID ORDER BY inventory.approval_status";
    } elseif ($context === 'farm_management') {
        $sql = "SELECT f.id, f.farm_name, f.location, f.primary_crop, f.size_acres, u.username AS farm_manager FROM farms f LEFT JOIN farmInventory_users u ON f.farm_manager_id = u.id WHERE (f.farm_name LIKE '%$query%' OR f.location LIKE '%$query%') AND f.farm_manager_id = $userID";
    } elseif ($context === 'user_management') {
        $sql = "SELECT `id`, `username`,`role`, `email` FROM `farminventory_users` WHERE (username LIKE '%$query%' OR role LIKE '%$query%') AND f.farm_manager_id = $userID";
    } else if ($context === 'equipment') {
        $sql = "SELECT equipment.*, farms.farm_name AS farm_name FROM equipment JOIN farms ON equipment.farm_id = farms.id WHERE (equipment.name LIKE '%$query%' OR equipment.condition LIKE '%$query%') AND farms.farm_manager_id = $userID";
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
