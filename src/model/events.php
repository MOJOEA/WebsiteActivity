<?php

function getevents(?string $keyword = null, ?string $start_date = null, ?string $end_date = null, ?string $id = null): array
{
    global $conn;

    $sql = "SELECT * FROM events WHERE 1=1";
    $params = [];
    $types = "";

    if (!empty($id)) {
        $sql .= " AND user_id = ?";
        $params[] = $id;
        $types .= "s";
    }

    if (!empty($keyword)) {
        $sql .= " AND title LIKE ?";
        $params[] = "%" . $keyword . "%";
        $types .= "s";
    }

    if (!empty($start_date)) {
        $sql .= " AND DATE(event_date) >= ?";
        $params[] = $start_date;
        $types .= "s";
    }

    if (!empty($end_date)) {
        $sql .= " AND DATE(end_date) <= ?";
        $params[] = $end_date;
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

function getEventById(int $event_id): ?array {
    global $conn; // ต้องมี $pdo จาก config
    $sql = "SELECT * FROM events WHERE id = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $events = $result->fetch_all(MYSQLI_ASSOC);
    return $events[0] ?? null;
}

function addevent(string $user_id, string $name, string $date, string $end_date, string $location, string $description, int $max, ?string $image_path): bool
{
    global $conn;
    $conn->begin_transaction();
    try {
        $sql = "INSERT INTO events (user_id, title, description, location, event_date, end_date, max_participants) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssi", $user_id, $name, $description, $location, $date, $end_date, $max);
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
// update------------------------------------------------------------------------------------------

function updateEvent(string $event_id, string $name, string $date, string $end_date, string $location, string $description, int $max, ?array $imageFile = null): bool
{
    global $conn;
    $conn->begin_transaction();
    try {
        $sql = "UPDATE events SET title = ?, description = ?, location = ?, event_date = ?, end_date = ?, max_participants = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssis", $name, $description, $location, $date, $end_date, $max, $event_id);
        $stmt->execute();
        $stmt->close();

        if ($imageFile && $imageFile['error'] === UPLOAD_ERR_OK) {
            $oldImages = getEventImages($event_id);
            foreach ($oldImages as $path) {
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            deleteEventImagesByEventId($event_id);

            $uploadDir = "uploads/events/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $newFileName = uniqid() . "_" . basename($imageFile['name']);
            $targetPath = $uploadDir . $newFileName;

            move_uploaded_file($imageFile['tmp_name'], $targetPath);
            addEventImage($event_id, $targetPath);
        }

        $conn->commit();
        return true;
    } catch (Exception $e) {
        $conn->rollback();
        return false;
    }
}

// delete------------------------------------------------------------------------------------------
function deleteEvent(string $event_id): bool
{
    global $conn;

    $conn->begin_transaction();

    try {

        //ลบ registrations ก่อน
        $sql1 = "DELETE FROM registrations WHERE event_id = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param('s', $event_id);
        $stmt1->execute();
        $stmt1->close();

        //ลบ event_images
        $sql2 = "DELETE FROM event_images WHERE event_id = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param('s', $event_id);
        $stmt2->execute();
        $stmt2->close();

        //ลบ event หลัก
        $sql3 = "DELETE FROM events WHERE id = ?";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->bind_param('s', $event_id);
        $stmt3->execute();

        $affected = $stmt3->affected_rows;
        $stmt3->close();
        $conn->commit();
        return $affected > 0;
    } catch (Exception $e) {

        $conn->rollback();
        return false;
    }
}
