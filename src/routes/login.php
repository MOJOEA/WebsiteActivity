<?php
// ประมวลผลก่อนแสดงผลหน้า
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        get();
        break;
    // กรณีอื่นๆ เช่น POST สามารถเพิ่มได้ที่นี่
    case 'POST':
        post();
        break;
}

function get(): void
{
    renderView('/service/login', ['title' => 'Login Page']);
}

function post(): void
{
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        renderView('login', ['title' => 'Login Page', 'error' => 'กรุณากรอกอีเมลและรหัสผ่าน']);
        return;
    }

    $result = login($email);
    if ($result && $result['email'] === $email) {
        if (password_verify($password, $result['PASSWORD'])) {
            // การเข้าสู่ระบบสำเร็จ
            $_SESSION['user'] = [
                'user_id' => $result['id'],
                'name' => $result['NAME'],
                'email' => $result['email']
            ];
            $unix_timestamp = time();
            $_SESSION['timestamp'] = $unix_timestamp;
            header('Location: /Event');
            exit();
        } else {
            // รหัสผ่านไม่ถูกต้อง
            renderView('/service/login', ['title' => 'Login Page', 'error' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง']);
            return;
        }
    }
}
