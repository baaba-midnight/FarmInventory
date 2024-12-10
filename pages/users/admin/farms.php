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
            $headerTitle = "Farm Management";
            $buttonContent = "Add New Farm";
            include "../../../templates/header.php";
            ?>

            <div class="content p-4">
                <div class="row justify-content-center">
                    <div class="col-md-10 mb-4">
                        <div class="card p-4">
                            <h3 class="info farm-title">Green Valley Farm</h3>
                            <h6 class="info"><b>Location:</b> New Abrem</h6>
                            <h6 class="info"><b>Primary Crop:</b> Corn</h6>
                            <h6 class="info"><b>Size:</b> 250 acres</h6>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-view">View Details</a>
                                <a class="btn btn-remove">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-10 mb-4">
                        <div class="card p-4">
                            <h3 class="info farm-title">Green Valley Farm</h3>
                            <h6 class="info"><b>Location:</b> New Abrem</h6>
                            <h6 class="info"><b>Primary Crop:</b> Corn</h6>
                            <h6 class="info"><b>Size:</b> 250 acres</h6>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-view">View Details</a>
                                <a class="btn btn-remove">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../assets/js/notifications.js"></script>
</body>
</html>
