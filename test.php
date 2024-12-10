<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmSync - Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <style>
        .sidebar {
    height: 100vh;
    position: fixed;
    box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.1);
    }

    .nav-link.active {
        background-color: #d4f4dd;
        font-weight: bold;
    }

    .card-header-tabs .nav-link.active {
        border-bottom: 2px solid black;
    }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <h4 class="mt-3 text-center">FarmSync</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inventory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Farms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">User Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Settings</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h4">Settings</h1>
                </div>
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Notifications</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Reporting</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form id="settingsForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" value="John Doe">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="johndoe@farm.com">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" value="+233 991 4844">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Change Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter new password">
                                </div>
                            </div>
                            <button type="button" class="btn btn-dark" onclick="saveSettings()">Save Personal Information</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


    <script>
    function saveSettings() {
        const fullName = document.getElementById('fullName').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const password = document.getElementById('password').value;

        if (!fullName || !email || !phone) {
            alert("Please fill in all fields");
            return;
        }

        alert("Personal information saved successfully!");
    }
    </script>
</body>
</html>
