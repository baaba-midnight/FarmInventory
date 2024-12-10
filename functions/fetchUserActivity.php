<?php
include "../includes/config.php";

$response = ['success' => false, 'labels' => [], 'loginCounts' => []];

// Query to count logins per day
$userActivityQuery = "SELECT DATE(login_time) as activity_date, COUNT(*) as login_count 
                        FROM session_logs 
                        GROUP BY DATE(login_time) 
                        ORDER BY activity_date ASC 
                        LIMIT 30";

$result = $conn->query($userActivityQuery);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response['labels'][] = $row['activity_date'];
        $response['loginCounts'][] = $row['login_count'];
    }
    $response['success'] = true;
} else {
    $response['message'] = 'No user activity found';
}

echo json_encode($response);
?>
