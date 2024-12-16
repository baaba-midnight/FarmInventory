<?php
include "../../includes/config.php";

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = json_decode(file_get_contents('php://input'), true);

    // Get form data
    $item_name = $input['item_name'];  
    $category = $input['category'];  
    $quantity = (int) $input['quantity'];      
    $farm_id = (int) $input['farm_name'];  

    if ($farm_id) {
        $inventory_query = "INSERT INTO `inventory`(`name`, `category`, `quantity`, `farm_id`, `approval_status`) VALUES (?,?,?,?, 'Pending');";
        $stmt = $conn->prepare($inventory_query);
        $stmt->bind_param("ssii", $item_name, $category, $quantity, $farm_id);
        $stmt->execute();
        $stmt->close();

        // Return success response
        echo json_encode(['success' => true, 'message' => 'Item successfully added to inventory.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Farm not found.']);
    }
}
?>
