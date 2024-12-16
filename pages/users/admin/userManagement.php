<?php include "./adminSession.php" ?>
<?php include "../../../templates/messageBox.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    
    <script src="../../../assets/js/delete.js"></script>

    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../../assets/css/header.css">
    <link rel="stylesheet" href="../../../assets/css/main.css">
    <link rel="stylesheet" href="../../../assets/css/tables.css">
</head>
<body>
    <?php display_message_box();  ?>
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
                    <table id="userTable" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           <!-- Will be dynamically inserted by JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add New user Modal -->
        <div class="modal fade" id="addNewUserModal" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewUserLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addUserForm" method="POST" action="../../../functions/addNewUser.php">
                            <div class="mb-3">
                                <label for="userName" class="form-label">Username</label>
                                <input type="text" class="form-control" id="userName" placeholder="Enter username" name="username" required>
                                <span id="usernameError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter user email" name="email" required>
                                <span id="emailError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" name="role">
                                    <option value="" selected disabled>Select User Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="farm_manager">Farm Manager</option>
                                </select>
                                <span id="roleError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="primaryCrop" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                                <span id="passwordError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="primaryCrop" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" name="confirmPassword" required>
                                <span id="confirmPasswordError" class="error-message"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" form="addUserForm" class="btn btn-custom">Add user</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm">
                            <input type="hidden" value='' id="edit-id">
                            <div class="mb-3">
                                <label for="username-update" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username-update" placeholder="Enter username" name="username-update" required>
                                <span id="usernameError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="email-update" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email-update" placeholder="Enter user email" name="email-update" required>
                                <span id="emailError" class="error-message"></span>
                            </div>
                            <div class="mb-3">
                                <label for="role-update" class="form-label">Role</label>
                                <select class="form-select" id="role-update" name="role-update">
                                    <option value="" selected disabled>Select User Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="farm_manager">Farm Manager</option>
                                </select>
                                <span id="roleError" class="error-message"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancelUpdateButton" class="btn btn-cancel btn-secondary">Cancel</button>
                        <button type="submit" form="editUserForm" class="btn btn-custom">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include "../../../templates/delete.php" ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <script type="module" src="../../assets/js/validations/registrationValidation.js"></script> -->
    <script src="../../../assets/js/notifications.js"></script>
    <script src="../../../assets/js/functions/admin/users.js"></script>
    <script src="../../../assets/js/reload-functions.js"></script>
    <script src="../../../assets/js/functions/admin/updateUser.js"></script>
    <script src="../../../assets/js/search.js"></script>
</body>
</html>
