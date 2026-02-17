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
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
        $date_of_birth = $_POST['date_of_birth'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['password_confirm'] ?? '';
    $img = $_FILES['profile_image'] ?? null;
    $image_path = null;

    if ($img && $img['error'] === UPLOAD_ERR_OK) {
        $upload_dir = __DIR__ . '/../../uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $image_path = $upload_dir . basename($img['name']);
        move_uploaded_file($img['tmp_name'], $image_path);
    }

    if(empty($name) || empty($email) || empty($date_of_birth) || empty($password) || empty($confirm_password)) {
        // มีช่องว่างที่ยังไม่ได้กรอก
        $error = "กรุณากรอกข้อมูลให้ครบถ้วน";
        renderView('register', ['title' => 'Register Page', 'error' => $error]);
        return;
    }

                if ($password !== $confirm_password) {
        // รหัสผ่านไม่ตรงกัน
        $error = "รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง";
        renderView('register', ['title' => 'Register Page', 'error' => $error]);
        return;
    }

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $result = register($name, $email, $date_of_birth, $hashPassword, $image_path);
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