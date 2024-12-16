<?php
header('Content-Type: application/json');

include "../includes/config.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $input = json_decode(file_get_contents('php://input'), true);

    // Validate and sanitize input
    $user_id = isset($input['id']) ? (int)$input['id'] : null;
    $name = isset($input['name']) ? trim($input['name']) : '';
    $email = isset($input['email']) ? trim($input['email']) : '';
    $currentPassword = isset($input['currentPassword']) ? $input['currentPassword'] : '';
    $newPassword = isset($input['newPassword']) ? $input['newPassword'] : '';
    $confirmPassword = isset($input['confirmPassword']) ? $input['confirmPassword'] : '';

    // Check if required fields are present
    if (empty($user_id) || empty($name) || empty($email) || empty($currentPassword)) {
        echo json_encode([
            'success' => false,
            'message' => 'All required fields must be filled out.'
        ]);
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid email format.'
        ]);
        exit;
    }

    // Fetch and verify current password
    $query = "SELECT password FROM farminventory_users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($databasePassword);

    if ($stmt->fetch()) {
        if (!password_verify($currentPassword, $databasePassword)) {
            echo json_encode([
                'success' => false,
                'message' => 'Current password is incorrect.'
            ]);
            $stmt->close();
            exit;
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'User not found.'
        ]);
        $stmt->close();
        exit;
    }
    $stmt->close();

    // Validate new password if provided
    if (!empty($newPassword)) {
        if (strlen($newPassword) < 8) {
            echo json_encode([
                'success' => false,
                'message' => 'New password must be at least 8 characters long.'
            ]);
            exit;
        }

        if ($newPassword !== $confirmPassword) {
            echo json_encode([
                'success' => false,
                'message' => 'New password and confirm password do not match.'
            ]);
            exit;
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    } else {
        $hashedPassword = $databasePassword; // Retain the old password if no new one is provided
    }

    // Update user profile
    $query = "UPDATE farminventory_users SET username = ?, password = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $name, $hashedPassword, $email, $user_id);

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Profile updated successfully.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error updating profile: ' . $stmt->error
        ]);
    }

    $stmt->close();
    $conn->close();
}
?>