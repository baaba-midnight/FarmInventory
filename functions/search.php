<?php
include '../includes/config.php'; // Include your database connection

header('Content-Type: application/json');

if (isset($_GET['context']) && isset($_GET['query'])) {
    $context = $_GET['context'];
    $query = $_GET['query'];

    $data = []; // To hold the results

    if ($context === 'inventory') {
        $sql = "SELECT i.id, i.item_name, i.category, i.quantity, f.farm_name FROM inventory i JOIN farms f ON i.farm_id = f.id WHERE i.item_name LIKE '%$query%'";
    } elseif ($context === 'farm_management') {
        $sql = "SELECT f.id, f.farm_name, f.location, f.primary_crop, f.size_acres, u.username AS farm_manager FROM farms f LEFT JOIN farmInventory_users u ON f.farm_manager_id = u.id WHERE f.farm_name LIKE '%$query%' OR f.location LIKE '%$query%'";
    } elseif ($context === 'user_management') {
        $sql = "SELECT `id`, `username`,`role`, `email` FROM `farminventory_users` WHERE username LIKE '%$query%' OR role LIKE '%$query%'";
    } else {
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
