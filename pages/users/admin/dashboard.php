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
    <?php 
    $role = 'admin';
    include "../../../templates/sidebar.php";
    ?>

    <!-- Main Content -->
    <div class="main-content">

        <?php 
        $headerTitle = "Dashboard";
        include "../../../templates/header.php";
        ?>

        
        <div class="row">
            <div class="col-6">
                <div class="row-md-4 pb-4">
                    <div class="card text-center">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="stat-content">
                                <i class="bi bi-truck icon-large"></i>
                                <h2 id="stat-inventory">4</h2>
                            </div>
                            <p>Total Inventory Items</p>
                        </div>
                    </div>
                </div>
                <div class="row-md-4 pb-4">
                    <div class="card text-center">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="stat-content">
                                <i class="bi bi-people-fill icon-large"></i>
                                <h2 id="stat-users">2</h2>
                            </div>
                            <p>Total Users</p>
                        </div>
                    </div>
                </div>
                <div class="row-md-4 pb-4">
                    <div class="card text-center">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="stat-content">
                                <i class="bi bi-signpost-split-fill icon-large"></i>
                                <h2 id="stat-farms">5</h2>
                            </div>
                            <p>Total Farms</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts and Analytics -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5>User Activity Trends</h5>
                        <canvas id="userActivityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="../../../assets/js/functions/admin/userActivityChart.js"></script>
    <script src="../../../assets/js/functions/admin/adminDashboardAnalytics.js"></script>
    <script src="../../../assets/js/notifications.js"></script>
</body>
</html>
