<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>กิจกรรม</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">

    <?php include __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="flex-1 p-8">
        <h1 class="text-2xl font-bold mb-6">กิจกรรมทั้งหมด</h1>

        <form action="/Event" method="GET" class="bg-white p-6 rounded-xl shadow mb-8 ">
            <div class="grid grid-cols-4 gap-4 items-end">

                <!-- ค้นหาข้อความ -->
                <div class="col-span-3">
                    <label class="block text-sm font-medium mb-1 text-gray-500">ค้นหากิจกรรม</label>
                    <input
                        type="text"
                        name="keyword"
                        placeholder="พิมพ์ชื่อกิจกรรม หรือ สถานที่"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- ปุ่มค้นหา --->
                <div class="mt-4 flex justify-end">
                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition w-[50%]">
                        ค้นหา
                    </button>
                </div>

                <!-- วันเริ่ม -->
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-500">วันเริ่ม</label>
                    <input
                        type="date"
                        name="start_date"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-500">วันสิ้นสุด</label>
                    <input
                        type="date"
                        name="end_date"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>
        </form>

        <div class="grid grid-cols-3 gap-5">
            <?php foreach ($data['events'] as $event): ?>
                <?php $user = getUsersByEvent($event['id']); ?>
                <div onclick="openViewModal(
                    '<?= htmlspecialchars($event['title'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($event['event_date'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($event['location'], ENT_QUOTES) ?>',
                    '<?= htmlspecialchars($event['description'], ENT_QUOTES) ?>',
                    '<?= $user['name']; ?>', '<?= $user['email']; ?>')"
                    class="bg-white cursor-pointer rounded-xl shadow-[0_0_20px_5px_rgba(0,0,0,0.1)] overflow-hidden w-[350px] hover:scale-105 transition"
                    id="Eventbox">

                    <img src="../images/img1.png" class="h-40 w-full object-cover">

                    <div class="p-4 space-y-2">
                        <h2 class="font-bold"> <?= htmlspecialchars($event['title']) ?> </h2>
                        <p class="text-sm text-gray-500"> date : <?= htmlspecialchars($event['event_date']) ?> </p>
                        <p class="text-sm text-gray-500"> locetion : <?= htmlspecialchars($event['location']) ?> </p>
                    </div>

                    <?php $Status = getRegistration($data['user_id'], $event['id']); ?>
                    <div class="p-4 pt-0">
                        <form action="/api/event" method="POST" onclick="event.stopPropagation();">
                            <input type="hidden" name="event_id" value="<?= $event['id'] ?>">

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

    <!-- include modal -->
    <?php include __DIR__ . '../view/create-modal.php'; ?>
    <?php include __DIR__ . '../view/view-modal.php'; ?>
</body>

</html>