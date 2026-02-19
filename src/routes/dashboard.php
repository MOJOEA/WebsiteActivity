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
function get(): void{
    $event_id = $_GET['event_id'];
    $users = getCount_Users($event_id);
    $pending_status = getCount_Status($event_id, "pending");
    $yes_status = getCount_Status($event_id, "yes");
    $checkin = getCount_checked_in($event_id);

    $data_age = getAgeDistribution($event_id);
    $data_gender = getGenderDistribution($event_id);

    $users_s = getRegistrationsByEventId($event_id);

    renderView('dashboard', ['title' => 'dashboard Page', 
    'Conut' => ['users' => $users, 'pending_status' => $pending_status, 'yes_status' => $yes_status, 'checkin' => $checkin],
    'data_age' => $data_age, 'data_gender' => $data_gender, 'users' => $users_s]);
}

function post(): void{
    
}