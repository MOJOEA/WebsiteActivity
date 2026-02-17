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
function get(): void{}

function post(): void
{
    session_start();

    $name = $_POST['name'] ?? null;
    $date = $_POST['date'] ?? null;
    $location = $_POST['locetion'] ?? null;
    $description = $_POST['description'] ?? null;
    $max = $_POST['max'] ?? null;
    $user_id = $_SESSION['user']['user_id'] ?? null;
    $image_path = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

        $upload_dir = __DIR__ . '/../../uploads/';

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $filename = time() . '_' . basename($_FILES['image']['name']);
        $target = $upload_dir . $filename;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $image_path = 'uploads/' . $filename;
        }
    }

    $result = addevent($user_id, $name, $date, $location, $description, $max, $image_path);

    if ($result) {
        header("Location: /activities");
        exit;
    } else {
        return ;
    }
}


