<?php include "./adminSession.php" ?>
<?php include "../../../templates/messageBox.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
</head>
<body>
    <?php display_message_box(); ?>
    <div class="d-flex">
        <?php 
        include "../../../templates/sidebar.php";
        ?>

        <div class="container-fluid min-vh-100 bg-light">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" style="margin: 0 0 0 260px;">
                <div class="container">
                    <div class="navbar-nav mx-auto">
                        <button class="nav-item nav-link btn mx-2 active" data-section="profile">
                            <i class="bi bi-person me-2"></i>Profile
                        </button>
                        <button class="nav-item nav-link btn mx-2" data-section="data">
                            <i class="bi bi-database me-2"></i>Data
                        </button>
                    </div>
                </div>
            </nav>

            <!-- Content Sections -->
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="card shadow-sm">
                            <!-- Profile Section -->
                            <div id="profile-section" class="card-body active-section">
                                <h3 class="card-title mb-4">Profile Settings</h3>
                                <form id="profile-form">
                                    <input type="hidden" id="id" value="<?php echo $userId ?>">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($username) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email) ?>">
                                    </div>

                                    <!-- Password Change Section -->
                                    <div class="card mt-4 mb-3">
                                        <div class="card-header">
                                            Change Password
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="current-password" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" id="current-password" name="current-password">
                                            </div>
                                            <div class="mb-3">
                                                <label for="new-password" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="new-password" name="new-password">
                                                <div class="form-text">
                                                    Password must be at least 8 characters long and include a mix of uppercase, lowercase, numbers, and special characters.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="confirm-password" class="form-label">Confirm New Password</label>
                                                <input type="password" class="form-control" id="confirm-password" name="confirm-password">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-2"></i>Save Changes
                                    </button>
                                </form>
                            </div>

                            <!-- Data Section -->
                            <div id="data-section" class="card-body d-none">
                                <h3 class="card-title mb-4">Data Management</h3>
                                <div class="bg-light p-3 rounded mb-3">
                                    <h4 class="mb-2">Export Farm Data</h4>
                                    <p class="text-muted mb-3">Download a complete backup of your farm data</p>
                                    <button id="export-data" class="btn btn-success">
                                        <i class="bi bi-download me-2"></i>Export Data
                                    </button>
                                </div>
                                <div class="bg-light p-3 rounded">
                                    <h4 class="mb-2">Data Retention</h4>
                                    <p class="text-muted mb-3">Your data is securely stored and backed up regularly</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/settings.js"></script>
</body>
</html>