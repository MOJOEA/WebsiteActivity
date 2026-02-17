<?php

function getevents(?string $keyword = null, ?string $start_date = null): array
{
    global $conn;

    $sql = "SELECT * FROM events WHERE 1=1";
    $params = [];
    $types = "";

    // ค้นหาจากชื่อ
    if (!empty($keyword)) {
        $sql .= " AND title LIKE ?";
        $params[] = "%" . $keyword . "%";
        $types .= "s";
    }

    // ค้นหาจากวันที่เริ่ม
    if (!empty($start_date)) {
        $sql .= " AND DATE(event_date) >= ?";
        $params[] = $start_date;
        $types .= "s";
    }

    $stmt = $conn->prepare($sql);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $events = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $events;
}


function geteventsBYid(string $user_id, ?string $keyword = null, ?string $start_date = null): array
{
    global $conn;

    $sql = "SELECT * FROM events";
    $params = [];
    $types = "";

    // ค้นหาจากไอดีผู้สร้าง
    if (!empty($user_id)) {
        $sql .= " WHERE user_id = ?";
        $params[] = $user_id;
        $types .= "s";
    }
    
    // ค้นหาจากชื่อ
    if (!empty($keyword)) {
        $sql .= " AND title LIKE ?";
        $params[] = "%" . $keyword . "%";
        $types .= "s";
    }

    // ค้นหาจากวันที่เริ่ม
    if (!empty($start_date)) {
        $sql .= " AND DATE(event_date) >= ?";
        $params[] = $start_date;
        $types .= "s";
    }

    $stmt = $conn->prepare($sql);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $events = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $events;
}

function addevent(string $user_id, string $name, string $date, string $location, string $description, int $max, ?string $image_path ): bool {
    global $conn;
    $conn->begin_transaction();
    try {
        $sql = "INSERT INTO events 
                (user_id, title, description, location, event_date, max_participants) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssi", $user_id, $name, $description, $location, $date, $max);

        $stmt->execute();
        $event_id = $conn->insert_id;
        $stmt->close();

        if ($image_path !== null) {

            $imgSql = "INSERT INTO event_images (event_id, image_path) VALUES (?, ?)";
            $imgStmt = $conn->prepare($imgSql);
            $imgStmt->bind_param("is", $event_id, $image_path);
            $imgStmt->execute();
            $imgStmt->close();
        }

        $conn->commit();
        return true;

    } catch (Exception $e) {
        $conn->rollback();
        return false;
    }
}

