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
                    <h2 class="text-center mb-4">Register</h2>
                    <form id="registrationForm" method="POST" action="../../auth/register.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control input-group" id="username" placeholder="Enter Username" name="username">
                            <span id="usernameError" class="error-message"></span>
                        </div>
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
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control  input-group" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword">
                            <span id="confirmPasswordError" class="error-message"></span>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-custom">Register</button>
                        </div>
                    </form>
                    <p class="text-center mt-3">
                        Already have an account? <a href="login.php">Log In</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="../../assets/js/validations/registrationValidation.js"></script>
</body>
</html>
