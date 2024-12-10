<?php
include "../includes/config.php";

session_start();

$userID = $_SESSION['id'];

$query = "UPDATE session_logs 
        SET logout_time = NOW() 
        WHERE user_id = ? 
        AND logout_time IS NULL";

$stmt = $conn->prepare($query);
$stmt->bind_param('i', $userID);
$stmt->execute();

session_unset();     // Unset all session variables
session_destroy();   // Destroy the session
setcookie(session_name(), '', time() - 3600, '/'); // Clear the session cookie

// redirect to the login page
header("Location: ../pages/auth/login.php");
exit();
?>