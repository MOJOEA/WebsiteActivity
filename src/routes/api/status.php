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
function get(): void{}

function post(): void {

    $event_id = $_POST['event_id'] ?? null;
    $user_id  = $_POST['user_id'] ?? null;
    if (!$event_id || !$user_id) {
        echo "ข้อมูลไม่ครบ";
        return;
    }

    $result = switchRegistrationStatus($user_id, $event_id);

    if ($result) {
        header("Location: /dashboard?event_id=" . urlencode($event_id));
        exit;
    } else {
        echo "อัปเดตสถานะไม่สำเร็จ";
    }
}

