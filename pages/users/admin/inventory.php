<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    
    <script src="../../../assets/js/delete.js"></script>
    
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../../assets/css/header.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="../../../assets/css/tables.css">
</head>
<body>
    <div class="d-flex">
        <?php 
        $role = 'admin';
        include "../../../templates/sidebar.php";
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
                            <input type="hidden" value='' id="add-id">
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
                                <label for="add_status" class="form-label">Approval</label>
                                <select class="form-select" id="add_status" name="status">
                                    <option value="" selected disabled>Select Item Status</option>
                                    <option value="Approved">Approve</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Rejected">Reject</option>
                                </select>
                                <span id="statusError" class="error-message"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancelItemButton" class="btn btn-cancel btn-secondary">Cancel</button>
                        <button type="submit" form="addItemForm" class="btn btn-custom">Save Changes</button>
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
                            <input type="hidden" value='' id="edit-id">
                            <div class="mb-3">
                                <label for="item_name" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="item_name" placeholder="Enter Item name" name="item_name" required>
                                <span id="ItemError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="" selected disabled>Select Item Category</option>
                                    <option value="Supplies">Supplies</option>
                                    <option value="Tools">Tools</option>
                                    <option value="Machinery">Machinery</option>
                                </select>
                                <span id="categoryError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Enter item Quantity" name="quantity" required>
                                <span id="quantityError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Approval Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="" selected disabled>Select Item Status</option>
                                    <option value="Approved">Approve</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Rejected">Reject</option>
                                </select>
                                <span id="statusError" class="error-message"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancelItemButton" class="btn btn-cancel btn-secondary">Cancel</button>
                        <button type="submit" form="editItemForm" class="btn btn-custom">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include "../../../templates/delete.php"?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../../../assets/js/notifications.js"></script>
    <script src="../../../assets/js/functions/admin/inventory.js"></script>
    <script src="../../../assets/js/reload-functions.js"></script>
    <script src="../../../assets/js/functions/admin/updateInventoryItem.js"></script>
    <script src="../../../assets/js/search.js"></script>
</body>
</html>
