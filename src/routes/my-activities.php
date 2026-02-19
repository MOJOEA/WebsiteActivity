<?php
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        get();
    break;
}
// ประมวลผลก่อนแสดงผลหน้า
function get(): void
{
    $keyword = $_GET['keyword'] ?? null;
    $start_date = $_GET['start_date'] ?? null;
    $end_date = $_GET['end_date'] ?? null;
    $user_id = $_SESSION['user']['user_id'] ?? null;

    if (!$user_id) {
        header("Location: /login");
        exit;
    }
    $events = getevents($keyword, $start_date, $end_date, $user_id);
    renderView('my-activities', ['title' => 'my-activities Page', 'events' => $events, 'user_id' => $user_id]);
}
