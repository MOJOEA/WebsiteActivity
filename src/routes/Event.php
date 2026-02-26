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
    $end_date = $_GET['end_date'] ?? null;
    $user_id = $_SESSION['user']['user_id'] ?? null;
    
    $events = getevents($keyword, $start_date, $end_date);
    foreach ($events as &$event) {
        $event['current_participants'] = 
            getCount_Status($event['id'], "pending");
        $event['current_participants'] += 
            getCount_Status($event['id'], "yes");
    }

    renderView('/main/Event', [
        'title' => 'Activities Page',
        'events' => $events,
        'user_id' => $user_id
    ]);
}

function post(): void {}
