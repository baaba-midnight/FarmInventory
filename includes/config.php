<?php 
$servername = '169.239.251.102';
$username = 'baaba.amosah';
$dbname = '';
$password = 'Andriod17@CS';

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
) or die('Connection Failed' . $conn);

if ($conn->connect_error) {
    die("Connected Failed" . $conn);
} else {
    // do nothing
}
?>