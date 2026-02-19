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
function get(): void
{
    renderView('register', ['title' => 'Register Page']);
}

function post(): void
{
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $date_of_birth = $_POST['date_of_birth'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['password_confirm'] ?? '';
    $imagePath = null;

    if (empty($name) || empty($email) || empty($date_of_birth) || empty($password) || empty($confirm_password || empty($gender))) {
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

    $imagePath = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

        $fileName = $_FILES['image']['name'];
        $tmpName  = $_FILES['image']['tmp_name'];

        $newName = uniqid() . "_" . $fileName;

        $uploadDir = __DIR__ . '/../../public/uploads/';
        $uploadPath = $uploadDir . $newName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($tmpName, $uploadPath)) {
            $imagePath = "/uploads/" . $newName;
        }
    }


    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $result = register($name, $email, $date_of_birth, $gender, $hashPassword, $imagePath);
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
