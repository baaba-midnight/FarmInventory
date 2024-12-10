<?php 
session_start();

require_once "../includes/config.php";
require_once "../templates/messageBox.php";

// implement the logic of the loginUser here
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // check if email or password is wrong
    if (empty($email) || empty($password)) {
        set_flash_message("Please fill all required fields", "error");
        header("Location: ../pages/auth/login.php");
        exit();
    }

    // find the email
    $query = "SELECT `password` FROM farminventory_users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $userPassword = $result->fetch_assoc();

        if (empty($userPassword)) {
            set_flash_message("User Does Not Exist", "error");

            // redirect user back to register page
            header("Location: ../pages/auth/register.php");
            exit();
        }

        if (password_verify($password, $userPassword['password'])) {

            $query = "SELECT * FROM farminventory_users WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $email);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $userID = $row['id'];
                    $username = $row['username'];
                    $role = $row['role'];
                    $email = $row['email'];

                    // Update the last_login column
                    $updateQuery = "UPDATE farminventory_users SET last_login = NOW() WHERE id = ?";
                    $updateStmt = $conn->prepare($updateQuery);
                    $updateStmt->bind_param("i", $row['id']);
                    $updateStmt->execute();

                    // insert login data into session_logs
                    $updateQuery = "INSERT INTO session_logs (user_id, login_time) VALUES (?, NOW());";
                    $updateStmt = $conn->prepare($updateQuery);
                    $updateStmt->bind_param('i', $userID);
                    $updateStmt->execute();

                    set_flash_message("Welcome Back " . $username, "success");

                    $_SESSION['id'] = $userID;
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = $role;
                    $_SESSION['email'] = $email;

                    switch ($_SESSION['role']) {
                        case "admin":
                            header('Location: ../pages/users/admin/dashboard.php');
                            exit();
                        case "farm_manager":
                            header('Location: ../pages/users/farmOwners/dashboard.php');
                            exit();
                    }
                }
            } else {
                set_flash_message("Invalid email or password", "error");
                exit();
            }    
        }
    }
}