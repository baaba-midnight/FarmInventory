<?php
require_once '../includes/config.php'; 

// Query to fetch farm managers
$query = "SELECT id, username FROM farminventory_users WHERE role='farm_manager'";
$result = mysqli_query($conn, $query);

// Check if there are results
if ($result) {
    $farmManagers = [];

    // Fetch each farm manager
    while ($row = mysqli_fetch_assoc($result)) {
        $farmManagers[] = [
            'id' => $row['id'], 
            'username' => $row['username']
        ];
    }

    // Return the list of farm managers as JSON
    echo json_encode($farmManagers);
} else {
    // If no farm managers found or error, send an empty array
    echo json_encode([]);
}

mysqli_close($conn);
?>