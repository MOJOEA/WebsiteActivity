<?php
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        get();
        break;

    case 'POST':
        post();
        break;
}

function post(): void
{
    if (!isset($_SESSION['user'])) {
        redirectWithMessage('error', 'กรุณาเข้าสู่ระบบก่อน', '/login');
    }

    $my_user_id = $_SESSION['user']['user_id'];
    $event_id = $_POST['event_id'] ?? null;

    if (!$event_id) { redirectWithMessage('error', 'ไม่พบกิจกรรม', '/Event');}
    $event = getEventById($event_id);

    if (!$event) {
        redirectWithMessage('error', 'ไม่พบกิจกรรมนี้', '/Event');
    }

    $owner_id = $event['user_id'];
    $end_date = $event['end_date'];
    $max_participants = $event['max_participants'];
    $current_participants = getCount_Status($event_id, "pending");
    $current_participants += getCount_Status($event_id, "yes");

    // ❌ ห้ามเข้าร่วมของตัวเอง
    if ($my_user_id == $owner_id) {
        redirectWithMessage('error', 'ไม่สามารถเข้าร่วมกิจกรรมของตัวเองได้', '/Event');
    }

    // ❌ หมดเวลาแล้ว
    if (strtotime($end_date) < time()) {
        redirectWithMessage('warning', 'กิจกรรมนี้สิ้นสุดแล้ว', '/Event');
    }

    // ❌ เต็มแล้ว
    if ($current_participants >= $max_participants) {
        redirectWithMessage('error', 'กิจกรรมนี้เต็มแล้ว', '/Event');
    }

    // สมัคร / ยกเลิก
    if (getRegistration($my_user_id, $event_id)) {
        $result = cancelRegistrations($my_user_id, $event_id);
        $message = 'ยกเลิกการเข้าร่วมเรียบร้อยแล้ว';
    } else {
        $result = addRegistration($my_user_id, $event_id);
        $message = 'สมัครกิจกรรมสำเร็จแล้ว';
    }

    if ($result) {
        redirectWithMessage('success', $message, '/Event');
    } else {
        redirectWithMessage('error', 'เกิดข้อผิดพลาด กรุณาลองใหม่', '/Event');
    }
}

function get(): void
{
    // ถ้ามี logic แสดงหน้า Event ใส่ตรงนี้
}
