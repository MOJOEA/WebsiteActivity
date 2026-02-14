<?php
// ฟังก์ชันสำหรับดึงข้อมูลนักเรียนจากฐานข้อมูล
function getStudents(): mysqli_result|bool
{
    global $conn;
    $sql = 'select * from students';
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function searchStudents(string $keyword = ''): mysqli_result|bool {
    global $conn;
    $sql = 'select * from students';
    if ($keyword !== '') { $sql .= " where first_name like ? or last_name like ?"; }
    $stmt = $conn->prepare($sql);
    if ($keyword !== '') {
        $searchKeyword = "%$keyword%";
        $stmt->bind_param('ss', $searchKeyword, $searchKeyword);
    }
    $result = $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

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

function SearchStudentById(int $student_id): mysqli_result|bool {
    global $conn;
    $sql = 'SELECT * FROM students WHERE student_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $student_id);
    $result = $stmt->execute();
    if ($result) {
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
    $stmt->close();
    return false;
}

function deleteStudent(int $student_id): bool {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM enrollment WHERE student_id = ?");
    $stmt->bind_param('i', $student_id);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM students WHERE student_id = ?");
    $stmt->bind_param('i', $student_id);
    return $stmt->execute();
}


function updateStudent($user): bool {
    global $conn;
    $sql = 'UPDATE students SET first_name = ?, last_name = ?, phone_number = ?, date_of_birth = ?, password = ?, image = ?, email = ? WHERE student_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssi', 
        $user['first_name'], 
        $user['last_name'], 
        $user['phone_number'], 
        $user['date_of_birth'], 
        $user['password'], 
        $user['image'], 
        $user['email'],
        $user['student_id']
    );
    $result = $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
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
