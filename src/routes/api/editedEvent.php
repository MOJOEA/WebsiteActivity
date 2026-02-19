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

function post(): void {

    $event_id = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? '';
    $start_date = $_POST['start_date'] ?? '';
    $end_date = $_POST['start_date'] ?? '';
    $location = $_POST['location'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_FILES['image'] ?? null;

    $result = updateEvent($event_id, $name, $start_date, $end_date, $location, $description, $image);
    if ($result) {
        header("Location: /my-activities");
        exit;
    } else {
        echo "อัปเดตกิจกรรมไม่สำเร็จ";
    }
}
