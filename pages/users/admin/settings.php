<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
    
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="../../../assets/css/settings.css">
</head>
<body>
    <div class="d-flex">
        <?php 
        $role = 'admin';
        include "../../../templates/sidebar.php";
        ?>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h4">Admin Settings</h1>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#">Backup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Activity Logs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">General</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <!-- Backup Section -->
                    <div class="mb-4">
                        <h5>Database Backup</h5>
                        <p>Ensure your data is secure by backing up your database.</p>
                        <button class="btn btn-success">Download Backup</button>
                    </div>

                    <!-- Other Admin Functionalities -->
                    <div class="mb-4">
                        <h5>Clear Cache</h5>
                        <p>Remove temporary files and free up space.</p>
                        <button class="btn btn-warning">Clear Cache</button>
                    </div>

                    <div>
                        <h5>Reset System</h5>
                        <p>Restore default settings. <strong>Warning:</strong> This action is irreversible.</p>
                        <button class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
