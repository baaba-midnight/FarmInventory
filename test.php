<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Settings</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid min-vh-100 bg-light">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="navbar-nav mx-auto">
                    <button class="nav-item nav-link btn mx-2 active" data-section="profile">
                        <i class="bi bi-person me-2"></i>Profile
                    </button>
                    <button class="nav-item nav-link btn mx-2" data-section="notifications">
                        <i class="bi bi-bell me-2"></i>Notifications
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
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="John Doe">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="john.doe@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="+1 (555) 123-4567">
                                </div>
                                <div class="mb-3">
                                    <label for="bio" class="form-label">Bio</label>
                                    <textarea class="form-control" id="bio" name="bio" rows="4">Experienced farm manager passionate about sustainable agriculture</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-2"></i>Save Changes
                                </button>
                            </form>
                        </div>

                        <!-- Notifications Section -->
                        <div id="notifications-section" class="card-body d-none">
                            <h3 class="card-title mb-4">Notification Preferences</h3>
                            <form id="notifications-form">
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <span>Email Notifications</span>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="emailAlerts" checked>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <span>SMS Alerts</span>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="smsAlerts">
                                    </div>
                                </div>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <span>Push Notifications</span>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="pushNotifications" checked>
                                    </div>
                                </div>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <span>Weekly Summary Email</span>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="weeklyDigest">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">
                                    <i class="bi bi-save me-2"></i>Save Notification Settings
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

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="script.js"></script>
</body>
</html>