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

function post(): void
{
    $user_id = $_SESSION['user']['user_id'] ?? null;
    $event_id = $_POST['event_id'];

    if (getRegistration($user_id, $event_id)) {
        $result = cancelRegistrations($user_id, $event_id);
    } else {
        $result = addRegistration($user_id, $event_id);
    }


    if ($result) {
        header('Location: /Event');
        exit;

    } else {
        echo "Delete failed";
    }
}
