<?php 
session_start();

require_once "../includes/config.php";
require_once "../templates/messageBox.php";

// implement the logic of the loginUser here
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // check if email or password is wrong
    if (empty($email) || empty($password) || empty($username) || empty($confirmPassword) || empty($role)) {
        set_flash_message("Please fill all required fields", "error");
        header("Location: ../pages/users/admin/userManagement.php");
        exit();
    }

    // check if the password is equal to the confirm password
    if ($password === $confirmPassword) {
        // hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO `farminventory_users`(`username`, `password`, `role`, `email`) VALUES (?,?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $username, $hashedPassword, $role, $email);

        if ($stmt->execute()) {
            set_flash_message("User Registered Successfully", "success");
            header("Location: ../pages/users/admin/userManagement.php");
            exit();
        }

    } else {
        set_flash_message("Passwords Do Not Match", "error");
        exit();
    }
}