<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    
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
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th>Farm Name</th>
                                <th>Location</th>
                                <th>Primary Crop</th>
                                <th>Size (Acres)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Green Valley</td>
                                <td>New Abrem</td>
                                <td>Corn</td>
                                <td>250</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-view">Edit</a>
                                    <a href="#" class="btn btn-sm btn-remove">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Sunny Fields</td>
                                <td>Old Town</td>
                                <td>Wheat</td>
                                <td>180</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-view">Edit</a>
                                    <a href="#" class="btn btn-sm btn-remove">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../assets/js/notifications.js"></script>
</body>
</html>
