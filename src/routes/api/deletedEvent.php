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

function post(): void
{

    $event_id = $_POST['event_id'];
    $result = deleteEvent($event_id);
    if ($result) {
        header("Location: /my-activities");
        exit;
    } else {
        echo "Delete failed";
    }
}
