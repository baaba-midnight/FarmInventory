<?php
include "../../templates/messageBox.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmSync - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/auth.css">
</head>
<body>
    <?php display_message_box(); ?>
    <div class="container-fluid">
        <div class="row vh-100 justify-content-center">
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="w-75 form-container">
                    <h1 class="text-center mb-4">FarmSync</h1>
                    <h2 class="text-center mb-4">Login</h2>
                    <form id="loginForm" method="POST" action="../../auth/login.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control input-group" id="email" placeholder="Enter Email" name="email">
                            <span id="emailError" class="error-message"></span>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control  input-group" id="password" placeholder="Enter Password" name="password">
                            <span id="passwordError" class="error-message"></span>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-custom">Login</button>
                        </div>
                    </form>
                    <p class="text-center mt-3">
                        Don't have an Account? <a href="register.php">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="../../assets/js/validations/loginValidation.js"></script>
</body>
</html>
