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

function get(): void{
    // ประมวลผลก่อนแสดงผลหน้า
    renderView('/service/contact', ['title' => 'Contact Us']);
}

function post(): void{
    // ประมวลผลคำขอแบบ POST ที่นี่ (ถ้ามี)
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    // mask email
    $email = preg_replace('/(?<=.).(?=[^@]*?.@)/', '*', $email);
    // แสดงหน้าขอบคุณหลังส่งข้อความ
    renderView('/service/thank', ['name' => $name, 'email' => $email, 'message' => $message]);
}