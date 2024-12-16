<?php
include "../../includes/config.php";

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = json_decode(file_get_contents('php://input'), true);

    // Get form data
    $item_name = $input['item_name'];  
    $category = $input['category'];        
    $farm_id = (int) $input['farm_name'];  

    if ($farm_id) {
        $equipment_query = "INSERT INTO equipment (`name`, category, `condition`, farm_id) VALUES (?, ?, 'Functional', ?)";
        $stmt = $conn->prepare($equipment_query);
        $stmt->bind_param("ssi", $item_name, $category, $farm_id);
        $stmt->execute();
        $stmt->close();

        // Return success response
        echo json_encode(['success' => true, 'message' => 'Item successfully added to equipment.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Farm not found.']);
    }
}
?>
