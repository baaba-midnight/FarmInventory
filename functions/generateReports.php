<?php
include "../includes/config.php";

function generateUserActivityReport($conn) {
    $sql = "SELECT 
                u.username, 
                u.role, 
                s.login_time, 
                s.logout_time
            FROM 
                session_logs s
            JOIN 
                farminventory_users u ON s.user_id = u.id
            ORDER BY 
                s.login_time DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $report = [];
        while ($row = $result->fetch_assoc()) {
            $report[] = $row;
        }
        return $report;
    } else {
        return [];
    }
}

function generateEquipmentStatusReport($conn) {
    $sql = "SELECT 
                equipment_name, 
                status, 
                purchase_date, 
                last_service_date, 
                next_Service_due
            FROM 
                equipment
            ORDER BY 
                status, equipment_name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $report = [];
        while ($row = $result->fetch_assoc()) {
            $report[] = $row;
        }
        return $report;
    } else {
        return [];
    }
}

function generateFarmInventoryReport($conn, $farmId) {
    $stmt = $conn->prepare("SELECT 
                                f.farm_name, 
                                i.item_name, 
                                i.category, 
                                i.quantity, 
                                i.last_updated
                            FROM 
                                inventory i
                            JOIN 
                                farms f ON i.farm_id = f.id
                            WHERE 
                                f.id = ?");
    $stmt->bind_param("i", $farmId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $report = [];
        while ($row = $result->fetch_assoc()) {
            $report[] = $row;
        }
        return $report;
    } else {
        return [];
    }
}

?>