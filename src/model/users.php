<?php
// ฟังก์ชันสำหรับดึงข้อมูลนักเรียนจากฐานข้อมูล

function register(string $name, string $email, string $date_of_birth, string $password, string $image): bool {
    global $conn;
    $sql = 'INSERT INTO users
    (name, email, birth_date, password, image, created_at) 
    VALUES (?, ?, ?, ?, ?, NOW())';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $name, $email, $date_of_birth, $password, $image);
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

