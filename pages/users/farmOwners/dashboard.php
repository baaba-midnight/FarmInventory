<?php include "./farmManagersSession.php" ?>
<?php include '../../../templates/messageBox.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../../assets/css/header.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
</head>
<body>
    <?php display_message_box(); ?>
    <?php 
    include "../../../templates/userSidebar.php";
    ?>

    <!-- Main Content -->
    <div class="main-content">

        <?php 
        $headerTitle = "Dashboard";
        include "../../../templates/header.php";
        ?>

        <div class="row">
            <div class="col-md-4 pb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="stat-content">
                            <i class="bi bi-truck icon-large"></i>
                            <h2 id="totalInventory">4</h2>
                        </div>
                        <p>Total Inventory Items</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="stat-content">
                            <i class="bi bi-exclamation-triangle-fill icon-large"></i>
                            <h2 id="lowStock">0</h2>
                        </div>
                        <p>Low Stock Items</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="stat-content">
                            <i class="bi bi-tools icon-large"></i>
                            <h2 id="totalEquipment">0</h2>
                        </div>
                        <p>Total Equipment</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 pb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="stat-content">
                            <i class="bi bi-gear-wide-connected icon-large"></i>
                            <h2 id="functionalEquipment">0</h2>
                        </div>
                        <p>Functional Equipment</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="stat-content">
                            <i class="bi bi-wrench icon-large"></i>
                            <h2 id="nonFunctionalEquipment">0</h2>
                        </div>
                        <p>Non-functional Equipment</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pb-4">
                <div class="card text-center">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="stat-content">
                            <i class="bi bi-clock-fill icon-large"></i>
                            <h2 id="pendingApprovals">0</h2>
                        </div>
                        <p>Pending Approvals</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="../../../assets/js/functions/farmManager/fetchDashboard.js"></script>
    <script> fetchManagerStats(<?php echo $userId ?>); </script>
</body>
</html>