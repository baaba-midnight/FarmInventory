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
            $headerTitle = "Inventory Management";
            $buttonContent = "Add New Item";
            include "../../../templates/header.php";
            ?>

            <div class="content p-5">
                <div class="card">
                    <table id="inventoryTable" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Farm Name</th>
                                <th>Approval Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Inserted dynamically with JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add New Item Modal -->
        <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemLabel">Add New Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addItemForm">
                            <div class="mb-3">
                                <label for="add-item_name" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="add-item_name" placeholder="Enter Item name" name="item_name" required>
                                <span id="ItemError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="add_category" class="form-label">Category</label>
                                <select class="form-select" id="add_category" name="category" required>
                                    <option value="" selected disabled>Select Item Category</option>
                                    <option value="Supplies">Supplies</option>
                                    <option value="Tools">Tools</option>
                                    <option value="Machinery">Machinery</option>
                                </select>
                                <span id="categoryError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="add_quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="add_quantity" placeholder="Enter item quantity" name="quantity" required>
                                <span id="quantityError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="farm_name" class="form-label">Farm Name</label>
                                <select class="form-select" id="farm_name" placeholder="Select farm name" name="farm_name" required>
                                    <!-- Will be dynamically added with AJAX -->
                                </select>
                                <span id="farmNameError" class="error-message"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancelItemButton" class="btn btn-cancel btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" form="addItemForm" class="btn btn-custom">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Item Modal -->
        <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editItemLabel">Edit Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editItemForm">
                            <input type="hidden" value='' id="edit_id">
                            <div class="mb-3">
                                <label for="edit_itemName" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="edit_itemName" placeholder="Enter Item name" name="item_name" required>
                                <span id="ItemError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="edit_category" class="form-label">Category</label>
                                <select class="form-select" id="edit_category" name="category" required>
                                    <option value="" selected disabled>Select Item Category</option>
                                    <option value="Supplies">Supplies</option>
                                    <option value="Tools">Tools</option>
                                    <option value="Machinery">Machinery</option>
                                </select>
                                <span id="categoryError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="edit_quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="edit_quantity" placeholder="Enter item quantity" name="quantity" required>
                                <span id="quantityError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="edit_farmName" class="form-label">Farm Name</label>
                                <select class="form-select" id="edit_farmName" placeholder="Select farm name" name="farm_name" required>
                                    <!-- Will be dynamically added with AJAX -->
                                </select>
                                <span id="farmNameError" class="error-message"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancelItemButton" class="btn btn-cancel btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" form="editItemForm" class="btn btn-custom" data-bs-dismiss="modal">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include "../../../templates/delete.php"?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    
    <script src="../../../assets/js/functions/farmManager/fetchInventory.js"></script>
    <script src="../../../assets/js/functions/farmManager/reload-functions.js"></script>
    <script src="../../../assets/js/functions/farmManager/updateInventoryItem.js"></script>
    <sctipt src="../../../assets/js/functions/farmManager/addInventoryItem.js"></script>
    <script src="../../../assets/js/functions/farmManager/userSearch.js"></script>

    <script>
        // Fetch farm names using AJAX
        $(document).ready(function() {
        var userId = <?php echo $userId ?>;
        
        $.ajax({
            url: '../../../functions/fetchFarms.php', // PHP file to fetch farms
            method: 'GET',
            data: { id: userId }, // Pass the id parameter
            dataType: 'json',
            success: function(data) {
                // Check if the response is an array and has farms
                if (Array.isArray(data.data) && data.data.length > 0) {
                    var $dropdown = $('#farm_name');
                    var $editDropdown = $('#edit_farmName');

                    data.data.forEach(function(farmName) {
                        var option = $('<option></option>').val(farmName.id).text(farmName.farm_name);
                        $dropdown.append(option);
                    });

                    data.data.forEach(function(farmName) {
                        var option = $('<option></option>').val(farmName.id).text(farmName.farm_name);
                        $editDropdown.append(option);
                    });
                } else {
                    alert('No farms found');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('Error fetching farms');
            }
        });

        $.ajax({
            url: '../../../functions/farmManager/getInventoryCategories.php', // PHP file to fetch farms
            method: 'GET',
            data: { id: userId }, // Pass the id parameter
            dataType: 'json',
            success: function(data) {
                // Check if the response is an array and has farms
                if (Array.isArray(data.data) && data.data.length > 0) {
                    var $dropdown = $('#edit_category');

                    data.data.forEach(function(category) {
                        var option = $('<option></option>').val(category).text(category);
                        $dropdown.append(option);
                    });

                    // console.log($dropdown)
                } else {
                    alert('No farms found');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('Error fetching farms');
            }
        });
    });
    </script>
</body>
</html>
