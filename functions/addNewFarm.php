<?php 
include "../includes/config.php";
include "../templates/messageBox.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $farmName = $_POST['farmName'];
    $location = $_POST['location'];
    $primaryCrop = $_POST['primaryCrop'];
    $farmSize = $_POST['farmSize'];
    $farmManager = (int) $_POST['farmManager'];

    $query = "INSERT INTO `farms`(`farm_name`, `location`, `primary_crop`, `size_acres`, `farm_manager_id`) 
                VALUES (?,?,?,?,?);";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssi', $farmName, $location, $primaryCrop, $farmSize, $farmManager);

    if ($stmt->execute()) {
        set_flash_message('Farm Added Successfully', "error");

        // redirect user back to farmManagement
        header("Location: ../pages/users/admin/farms.php");
        exit();
    } else {
        set_flash_message("Invalid Data", "error");
        exit();
    }

}

?>