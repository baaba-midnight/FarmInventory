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
            $headerTitle = "Equipment Management";
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

        <?php include "../../../templates/delete.php"?>
    </div>

    <script src="../../../assets/js/notifications.js"></script>
    <script src="../../../assets/js/functions/admin/inventory.js"></script>
    <script src="../../../assets/js/reload-functions.js"></script>
    <script src="../../../assets/js/search.js"></script>
</body>
</html>
