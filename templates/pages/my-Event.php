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
        <h1 class="text-2xl font-bold mb-6">กิจกรรมทั้งหมดของฉัน</h1>

        <!-- 🔍 Search Filter -->
        <form action="/activities" method="GET" class="bg-white p-6 rounded-xl shadow mb-8 ">
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

                <!-- วันสิ้นสุด -->
                <div>
                    <label class="block text-sm font-medium mb-1 text-gray-500">วันสิ้นสุด</label>
                    <input
                        type="date"
                        name="end_date"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

            </div>
        </form>

        <!-- 📦 Activity Grid -->
        <div class="grid grid-cols-3 gap-5">

            <?php foreach ($data['events'] as $event): ?>
                <div class="bg-white cursor-pointer rounded-xl shadow-[0_0_20px_5px_rgba(0,0,0,0.1)] overflow-hidden w-[350px] hover:scale-105 transition">

                    <img src="../images/img1.png" class="h-40 w-full object-cover">
                    <div class="p-4 space-y-2">
                        <h2 class="font-bold"> <?= htmlspecialchars($event['title']) ?> </h2>
                        <p class="text-sm text-gray-500">start : <?= htmlspecialchars($event['event_date']) ?> </p>
                        <p class="text-sm text-gray-500">end : <?= htmlspecialchars($event['end_date']) ?> </p>
                        <p class="text-sm">Locetion : <?= htmlspecialchars($event['location']) ?> </p>
                    </div>

                    <!-- ปุ่ม -->
                     <div class="p-4 pt-0">
                    <form action="/dashboard" method="GET">
                        <input type="hidden" name="event_id" value=<?= $event['id'] ?>>
                        <button type="submit" class="w-full border border-blue-500 text-blue-500 py-2 rounded-lg hover:bg-blue-500 hover:text-white transition">
                            Dashboard</button>
                    </form></div>
                    <div class="p-4 pt-0">
                        <button onclick='openEditModal(<?= json_encode($event) ?>)'
                            class="w-full border border-gray-500 py-2 rounded-lg hover:bg-gray-500 hover:text-white transition">
                            แก้ไขกิจกรรม
                        </button>
                    </div>
                    <div class="p-4 pt-0">
                        <form action="/api/deletedEvent" method="POST">
                            <input type="hidden" name="event_id" value="<?= htmlspecialchars($event['id']) ?>">
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

    <!-- include modal -->
    <?php include __DIR__ . '../popup/create-popup.php'; ?>
    <?php include __DIR__ . '../popup/view-popup.php'; ?>
</body>

</html>