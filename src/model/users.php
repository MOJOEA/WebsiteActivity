<?php
// ฟังก์ชันสำหรับดึงข้อมูลนักเรียนจากฐานข้อมูล

function SearchEmail(string $email): mysqli_result|bool {
    global $conn;
    $sql = "SELECT * FROM students WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $result = $stmt->execute();
    if ($result) {
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return $result;
        }
    }
    $stmt->close();
    return false;
}

function register($first_name, $last_name, $phone_number, $date_of_birth, $password, $image, $email): bool {
    global $conn;
    $sql = 'INSERT INTO students 
    (first_name, last_name, phone_number, date_of_birth, password, image, email) 
    VALUES (?, ?, ?, ?, ?, ?, ?)';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss', $first_name, $last_name, $phone_number, $date_of_birth, $password, $image, $email);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}


function login($email): mysqli_result|bool {
    global $conn;
    $sql = "SELECT * FROM students WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        return $result;
    }   
    return false;
}
