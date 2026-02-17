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
    $keyword = $_GET['keyword'] ?? null;
    $start_date = $_GET['start_date'] ?? null;
    $user_id = $_SESSION['user']['user_id'] ?? null;

    if (!$user_id) {
        header("Location: /login");
        exit;
    }

    $events = geteventsBYid($user_id, $keyword, $start_date);
    renderView('my-activities', ['title' => 'my-activities Page', 'events' => $events]);
}

function post(): void {}
