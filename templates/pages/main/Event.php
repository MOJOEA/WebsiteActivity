<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>กิจกรรม</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include __DIR__ . '/../../partials/header.php'; ?>
    <div class="flex bg-gray-100">
        <?php include __DIR__ . '/../../partials/sidebar.php'; ?>
        <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <main class="bg-gray-50 text-gray-800 flex-1 p-8">
            <?php renderSearch('search', ['title' => 'กิจกรรมทั้งหมด', 'action' => '/Event']); ?>
            <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <?php rederErrmsg(); ?>
            <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <div class="grid grid-cols-3 gap-5">
                <?php foreach ($data['events'] as $event): ?>
                    <?php $user = getUsersByEvent($event['id']); ?>
                    <div onclick='openViewModal(<?= json_encode($event, JSON_HEX_APOS | JSON_HEX_QUOT) ?>,<?= json_encode($user, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'
                        class="bg-white cursor-pointer rounded-xl shadow-[0_0_20px_5px_rgba(0,0,0,0.1)] overflow-hidden w-[350px] hover:scale-105 transition" >

                        <img src="../images/img1.png" class="h-40 w-full object-cover">

                        <div class="p-4 space-y-2">
                            <h2 class="font-bold"> <?= htmlspecialchars($event['title']) ?> </h2>
                            <p class="text-sm text-gray-500"> date : <?= htmlspecialchars($event['event_date']) ?> </p>
                            <p class="text-sm text-gray-500"> end  : <?= htmlspecialchars($event['end_date']) ?> </p>
                            <p class="text-sm text-gray-500"> locetion : <?= htmlspecialchars($event['location']) ?> </p>
                            <span class="inline-block bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-lg">
                                👥 <?= $event['current_participants'] ?? 0 ?>/<?= $event['max_participants'] ?? 0 ?> คน
                            </span>
                        </div>

                        <?php $Status = getRegistration($data['user_id'], $event['id']); ?>
                        <div class="p-4 pt-0">
                            <form action="/api/join" method="POST" onclick="event.stopPropagation();">
                                <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
                                <input type="hidden" name="user_id" value="<?= $user['email'] ?>">
                                <input type="hidden" name="end_date" value="<?= $event['end_date'] ?>">
                                <input type="hidden" name="current_participants" value="<?= $event['current_participants'] ?>">
                                <input type="hidden" name="max_participants" value="<?= $event['max_participants'] ?>">

                                <button type="submit" class="w-full py-2 rounded-lg transition 
                                <?= $Status
                                    ? 'border border-red-500 text-red-500 hover:bg-red-500 hover:text-white'
                                    : 'border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white' ?>">
                                    <?= $Status ? 'ยกเลิกเข้าร่วม' : 'เข้าร่วมกิจกรรม' ?>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <?php include __DIR__ . '/../../partials/footer.php'; ?>
    <!-- include modal -->
    <?php include __DIR__ . '/../../popup/create-popup.php'; ?>
    <?php include __DIR__ . '/../../popup/view-popup.php'; ?>
</body>

</html>