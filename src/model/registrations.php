<?php
// geter ------------------------------------------------------------------------------------------
function getRegistrationsByEventId(string $event_id): array
{
    global $conn;

    $sql = "
        SELECT r.user_id, u.name, u.email, u.gender, TIMESTAMPDIFF(YEAR, u.birth_date, CURDATE()) AS age, 
        r.created_at AS registered_at, r.status, r.checked_in, r.event_id
        FROM registrations r
        JOIN users u ON r.user_id = u.id
        WHERE r.event_id = ?
        ORDER BY r.created_at DESC
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $event_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    return $rows;
}


function getCount_Users(string $event_id): int
{
    global $conn;

    $sql = "SELECT COUNT(*) as total 
            FROM registrations 
            WHERE event_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $event_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    return (int) $row['total'];
}

function getCount_Status(string $event_id, string $status): int
{
    global $conn;
    $sql = "SELECT COUNT(*) as total
            FROM registrations
            WHERE event_id = ?
            AND status = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $event_id, $status);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    return (int)$row['total'];
}


function getCount_checked_in(string $event_id): int
{
    global $conn;
    $sql = "SELECT COUNT(*) as total
            FROM registrations
            WHERE event_id = ?
            AND checked_in = 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $event_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    return (int) $row['total'];
}

function getAgeDistribution(string $event_id): array
{
    global $conn;

    $sql = "
        SELECT 
            CASE
                WHEN TIMESTAMPDIFF(YEAR, u.birth_date, CURDATE()) BETWEEN 0 AND 17 THEN '0-17'
                WHEN TIMESTAMPDIFF(YEAR, u.birth_date, CURDATE()) BETWEEN 18 AND 25 THEN '18-25'
                WHEN TIMESTAMPDIFF(YEAR, u.birth_date, CURDATE()) BETWEEN 26 AND 35 THEN '26-35'
                WHEN TIMESTAMPDIFF(YEAR, u.birth_date, CURDATE()) BETWEEN 36 AND 45 THEN '36-45'
                ELSE '46+'
            END AS age_range,
            COUNT(*) AS total
        FROM registrations r
        JOIN users u ON r.user_id = u.id
        WHERE r.event_id = ?
        GROUP BY age_range
        ORDER BY age_range ASC
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $event_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $data;
}


function getGenderDistribution(string $event_id): array
{
    global $conn;

    $sql = "
        SELECT u.gender, COUNT(*) AS total
        FROM registrations r
        JOIN users u ON r.user_id = u.id
        WHERE r.event_id = ?
        GROUP BY u.gender
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $event_id);
    $stmt->execute();

    $result = $stmt->get_result();

    $genders = [];

    while ($row = $result->fetch_assoc()) {
        $genders[$row['gender']] = (int)$row['total'];
    }

    $stmt->close();

    return $genders;
}

function getRegistration(string $user_id, string $event_id): bool
{
    global $conn;

    $sql = "SELECT 1
            FROM registrations
            WHERE USER_ID = ? AND EVENT_ID = ?
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_id, $event_id);
    $stmt->execute();

    $stmt->store_result();
    $exists = $stmt->num_rows > 0;

    $stmt->close();
    return $exists;
}



// update------------------------------------------------------------------------------------------
function switchRegistrationStatus(string $user_id, string $event_id): bool {
    global $conn;

    $sql = "UPDATE registrations
            SET status = CASE 
                WHEN status = 'yes' THEN 'pending'
                ELSE 'yes'
            END
            WHERE user_id = ? AND event_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_id, $event_id);

    $success = $stmt->execute();
    $stmt->close();

    return $success;
}

function addRegistration(string $user_id, string $event_id): bool
{
    global $conn;

    $sql = "INSERT INTO registrations (USER_ID, EVENT_ID, STATUS, CREATED_AT)
            VALUES (?, ?, 'pending', NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_id, $event_id);

    $success = $stmt->execute();

    $stmt->close();

    return $success;
}


function toggleRegistrationCheckIn(string $user_id, string $event_id): bool
{
    global $conn;

    $sql = "UPDATE registrations
            SET checked_in = CASE 
                WHEN checked_in = 1 THEN 0
                ELSE 1
            END
            WHERE user_id = ? AND event_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_id, $event_id);

    $success = $stmt->execute();
    $stmt->close();

    return $success;
}


// delete------------------------------------------------------------------------------------------
function deleteRegistrationsByEventId(string $event_id): bool
{
    global $conn;
    $sql = "DELETE FROM registrations WHERE EVENT_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $event_id);

    $success = $stmt->execute();
    $stmt->close();

    return $success;
}

function deleteRegistrationsByUserId(string $user_id): bool
{
    global $conn;
    $sql = "DELETE FROM registrations WHERE USER_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);

    $success = $stmt->execute();
    $stmt->close();

    return $success;
}

function cancelRegistrations(string $user_id, string $event_id): bool
{
    global $conn;
    $sql = "DELETE FROM registrations WHERE EVENT_ID = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $event_id, $user_id);

    $success = $stmt->execute();
    $stmt->close();

    return $success;
}

