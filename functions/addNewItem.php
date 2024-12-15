<?php
include "../includes/config.php";

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = json_decode(file_get_contents('php://input'), true);

    // Get form data
    $item_name = $input['item_name'];  
    $category = $input['category'];    
    $quantity = (int) $input['quantity'];    
    $farm_id = (int) $input['farm_name'];  

    if ($farm_id) {
        // Insert into equipment table
        $equipment_query = "INSERT INTO equipment (equipment_name, category, `status`, farm_id) VALUES (?, ?, 'Functional', ?)";
        $stmt = $conn->prepare($equipment_query);
        $stmt->bind_param("ssi", $item_name, $category, $farm_id);
        $stmt->execute();
        $equipment_id = $stmt->insert_id;  // Get the ID of the newly inserted equipment
        $stmt->close();

        // Step 2: Insert into the inventory table
        $inventory_query = "INSERT INTO inventory (equipment_id, item_name, category, quantity, approval_status) VALUES (?, ?, ?, ?, 'Pending')";
        $stmt = $conn->prepare($inventory_query);
        $stmt->bind_param("issi", $equipment_id, $item_name, $category, $quantity);
        $stmt->execute();
        $stmt->close();

        // Return success response
        echo json_encode(['success' => true, 'message' => 'Item successfully added to inventory and equipment.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Farm not found.']);
    }
}
?>
