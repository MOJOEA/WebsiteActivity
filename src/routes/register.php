<?php
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        get();
        break;
    // กรณีอื่นๆ เช่น POST สามารถเพิ่มได้ที่นี่
    case 'POST':
        post();
        break;
}
// ประมวลผลก่อนแสดงผลหน้า
function get(): void{
        renderView('register', ['title' => 'Register Page']);
}

function post(): void{
    // ประมวลผลคำขอแบบ POST ที่นี่ (ถ้ามี)
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $date_of_birth = $_POST['date_of_birth'] ?? '';

    $password = $_POST['password'] ?? '';
    $Cpassword = $_POST['password_confirm'] ?? '';
    $email = $_POST['email'] ?? '';
    if(empty($first_name) || empty($last_name) || empty($phone_number) || empty($date_of_birth) || empty($password) || empty($Cpassword) || empty($email)) {
        // มีช่องว่างที่ยังไม่ได้กรอก
        $error = "กรุณากรอกข้อมูลให้ครบถ้วน";
        renderView('register', ['title' => 'Register Page', 'error' => $error]);
        return;
    }
    
    if ($password !== $Cpassword) {
        // รหัสผ่านไม่ตรงกัน
        $error = "รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง";
        renderView('register', ['title' => 'Register Page', 'error' => $error]);
        return;
    }
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $result = register($first_name, $last_name, $phone_number, $date_of_birth, $hashPassword, '', $email);
    if ($result) {
        // การลงทะเบียนสำเร็จ
        header('Location: /login');
        exit();
    } else {
        // การลงทะเบียนล้มเหลว
        $error = "เกิดข้อผิดพลาดในการลงทะเบียน กรุณาลองใหม่อีกครั้ง";
        renderView('register', ['title' => 'Register Page', 'error' => $error]);
    }
}

