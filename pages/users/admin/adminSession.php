<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['role'])) {
    // Redirect to login if user is not logged in
    header('Location: ../../auth/login.php');
    exit();
} else {
    // Check if role is not admin, then redirect to login
    if ($_SESSION['role'] !== 'admin') {
        session_destroy();
        header('Location: ../../auth/login.php');
        exit();
    }

    // If user is logged in, assign the appropriate role variables
    $userId = $_SESSION['id'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $role = $_SESSION['role'];
}
?>