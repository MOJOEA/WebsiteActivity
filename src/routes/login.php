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

function get(): void{
        renderView('login', ['title' => 'Login Page']);
}

function post(): void{
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if(SearchEmail($email) === false){
        renderView('login', ['title' => 'Login Page','error' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง']);
        return;
    }
    $result = login($email);
    
    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['PASSWORD'])) {
            // การเข้าสู่ระบบสำเร็จ
            $_SESSION['user'] = [
                'student_id' => $user['student_id'],
                'first_name' => $user['first_name'],
                'last_name'  => $user['last_name'],
                'email'      => $user['email']
            ];
            $unix_timestamp = time();
            $_SESSION['timestamp'] = $unix_timestamp;
            header('Location: /students');
            exit();
        }else {
            // รหัสผ่านไม่ถูกต้อง
            renderView('login', ['title' => 'Login Page','error' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง']);
            return;
        }
    }
}