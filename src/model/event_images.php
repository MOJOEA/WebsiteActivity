<?php
function getEventImages(string $event_id): array {
    global $conn;

    $sql = "SELECT image_path 
            FROM event_images 
            WHERE event_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $event_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $images = [];
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['image_path'];
    }

    $stmt->close();
    return $images;
}
// update------------------------------------------------------------------------------------------
function addEventImage(string $event_id, string $image_path): bool {
    global $conn;

    $sql = "INSERT INTO event_images (event_id, image_path) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $event_id, $image_path);

    $success = $stmt->execute();
    $stmt->close();

    return $success;
}

// delete------------------------------------------------------------------------------------------
function deleteEventImagesByEventId(string $event_id): bool {
    global $conn;

    $sql = "DELETE FROM event_images WHERE event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $event_id);

    $success = $stmt->execute();
    $stmt->close();

    return $success;
}
