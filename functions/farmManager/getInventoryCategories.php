<?php
include "../../includes/config.php";

// Query to get unique categories from inventory and equipment
$sql = "
    SELECT DISTINCT category 
    FROM inventory;
";

// Execute the query
$result = $conn->query($sql);

// Initialize an array to store categories
$data = [];

if ($result) {
    // Fetch categories
    while ($row = $result->fetch_assoc()) {
        $data[] = $row['category'];
    }
    // Return categories as JSON
    echo json_encode([
        "status" => "success",
        "data" => $data
    ]);
} else {
    // Handle query error
    echo json_encode([
        "status" => "error",
        "message" => "Query failed: " . $conn->error
    ]);
}

// Close the database connection
$conn->close();
?>
