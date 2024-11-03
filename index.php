<?php 
require_once 'includes/config.php';
require_once 'includes/auth.php';

$auth = new Auth();
if (!$auth->check_login()) {
    header('Location: pages/login.php');
    exit();
}

include 'pages/dashboard.php';
?>