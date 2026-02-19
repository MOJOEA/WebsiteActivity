<?php
// ฟังก์ชันสำหรับดึงข้อมูลนักเรียนจากฐานข้อมูล

function register(string $name, string $email, string $date_of_birth, string $gender, string $password, ?string $image_url = null): bool {
    global $conn;
    $sql = 'INSERT INTO users
            (name, email, birth_date, PASSWORD, image, gender, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, NOW())';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $name, $email, $date_of_birth, $password, $image_url, $gender);

    $result = $stmt->execute();
    $stmt->close();

    return $result;
}



function login($email) {
    global $conn;

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}

function updateUser(string $user_id, string $name, string $email, string $gender, string $birthdate, string $image): bool {
    global $conn;
    $sql = "UPDATE users 
            SET name = ?, email = ?, gender = ?, birthdate = ?, image = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $gender, $birthdate, $image, $user_id);
    $stmt->execute();

    $success = $stmt->affected_rows >= 0; 
    $stmt->close();

    return $success;
}


function getUsersByEvent(string $event_id){
    global $conn;

    $sql = "SELECT u.id, u.name, u.email
            FROM events e
            JOIN users u ON e.user_id = u.id
            WHERE e.id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $event_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}
