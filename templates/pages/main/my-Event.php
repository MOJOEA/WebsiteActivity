<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>กิจกรรม</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include __DIR__ . '/../../partials/header.php'; ?>
    <div class="flex bg-gray-100 min-h-screen">
        <?php include __DIR__ . '/../../partials/sidebar.php'; ?>

        <main class="bg-gray-50 text-gray-800 flex-1 p-8">
            <?php renderSearch('search', ['title' => 'กิจกรรมของฉัน', 'action' => '/my-Event']); ?>

            <!-- 📦 Activity Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                <?php foreach ($data['events'] as $event): ?>

                    <div class="bg-white cursor-pointer rounded-xl shadow-[0_0_20px_5px_rgba(0,0,0,0.1)] overflow-hidden w-[350px] hover:scale-105 transition">
                        <img src="../images/img1.png" class="h-40 w-full object-cover">

                        <div class="p-4 space-y-2">
                            <h2 class="font-bold"> <?= htmlspecialchars($event['title']) ?> </h2>
                            <p class="text-sm text-gray-500"> date : <?= htmlspecialchars($event['event_date']) ?> </p>
                            <p class="text-sm text-gray-500"> end : <?= htmlspecialchars($event['end_date']) ?> </p>
                            <p class="text-sm text-gray-500"> locetion : <?= htmlspecialchars($event['location']) ?> </p>
                            <span class="inline-block bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-lg">
                                👥 <?= $event['current_participants'] ?? 0 ?>/<?= $event['max_participants'] ?? 0 ?> คน
                            </span>
                        </div>

                        <!-- Dashboard -->
                        <div class="px-4 pb-3">
                            <form action="/dashboard" method="GET">
                                <input type="hidden" name="event_id" value="<?= htmlspecialchars($event['id']) ?>">
                                <button type="submit"
                                    class="w-full border border-blue-500 text-blue-500 py-2 rounded-lg hover:bg-blue-500 hover:text-white transition">
                                    Dashboard
                                </button>
                            </form>
                        </div>

                        <!-- Edit -->
                        <div class="px-4 pb-3">
                            <button
                                onclick='openEditModal(<?= json_encode($event, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'
                                class="w-full border border-gray-500 py-2 rounded-lg hover:bg-gray-500 hover:text-white transition">
                                แก้ไขกิจกรรม
                            </button>
                        </div>

                        <!-- Delete -->
                        <div class="px-4 pb-5">
                            <form action="/api/deletedEvent" method="POST">
                                <input type="hidden" name="event_id"
                                    value="<?= htmlspecialchars($event['id']) ?>">
                                <button type="submit"
                                    class="w-full border border-red-500 text-red-500 py-2 rounded-lg hover:bg-red-500 hover:text-white transition"
                                    onclick="return confirm('คุณต้องการยกเลิกกิจกรรมนี้หรือไม่?');">
                                    ยกเลิกกิจกรรม
                                </button>
                            </form>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </main>
    </div>
    <?php include __DIR__ . '/../../partials/footer.php'; ?>
    <?php include __DIR__ . '/../../popup/create-popup.php'; ?>
    <?php include __DIR__ . '/../../popup/edit-popup.php'; ?>

</body>

</html>