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
            $headerTitle = "User Management";
            $buttonContent = "Add New User";
            include "../../../templates/header.php";
            ?>

            <div class="content p-5">
                <div class="card">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>john@farm.com</td>
                                <td>Admin</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-view">Edit</a>
                                    <a href="#" class="btn btn-sm btn-remove">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>jane@farm.com</td>
                                <td>Farm Owner</td>
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
