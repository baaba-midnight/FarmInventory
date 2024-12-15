<?php include "./farmManagersSession.php" ?>
<?php include "../../../templates/messageBox.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../assets/js/delete.js"></script>
    <script src="../../../assets/js/view-details.js"></script>
    
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../../assets/css/header.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="../../../assets/css/tables.css">
</head>
<body>
    <?php display_message_box(); ?>
    <div class="d-flex">
        <?php 
        include "../../../templates/userSidebar.php";
        ?>

        <!-- Main Content -->
        <div class="main-content flex-grow-1">
            <?php 
            $headerTitle = "Farm Management";
            $buttonContent = "Add New Farm";
            include "../../../templates/header.php";
            ?>

            <div id="farmData" class="content p-4">
                <!-- Will be dynamically inserted with JS -->
            </div>
        </div>

        <!-- Add New Farm Modal -->
        <div class="modal fade" id="addNewFarmModal" tabindex="-1" aria-labelledby="addNewFarmLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewFarmLabel">Add New Farm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addFarmForm" method="POST" action="../../../functions/addNewFarm.php">
                            <input type="hidden" name="farmManager" value="<?php echo $userId ?>">
                            <div class="mb-3">
                                <label for="farmName" class="form-label">Farm Name</label>
                                <input type="text" class="form-control" id="farmName" placeholder="Enter farm name" name="farmName" required>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" placeholder="Enter farm location" name="location" required>
                            </div>
                            <div class="mb-3">
                                <label for="primaryCrop" class="form-label">Primary Crop</label>
                                <input type="text" class="form-control" id="primaryCrop" placeholder="Enter primary crop" name="primaryCrop" required>
                            </div>
                            <div class="mb-3">
                                <label for="farmSize" class="form-label">Farm Size (in acres)</label>
                                <input type="number" class="form-control" id="farmSize" placeholder="Enter size in acres" name="farmSize" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" form="addFarmForm" class="btn btn-custom">Add Farm</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Farm Details Modal -->
        <div id="farmDetailsModal" class="modal fade" tabindex="-1" aria-labelledby="farmDetailsLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="farmDetailsLabel">Farm Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="farmDetails">
                        <!-- Farm details will be dynamically inserted here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include "../../../templates/delete.php" ?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../../../assets/js/notifications.js"></script>
    <script src="../../../assets/js/functions/farmManager/farms.js"></script>
    <script>farms(<?php echo $userId ?>)</script>
    <script src="../../../assets/js/functions/farmManager/reload-functions.js"></script>
    <script src="../../../assets/js/functions/farmManager/userSearch.js"></script>
</body>
</html>
