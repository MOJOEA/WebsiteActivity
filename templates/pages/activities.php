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
        <h1 class="text-2xl font-bold mb-4">กิจกรรมทั้งหมด</h1>

        <div class="grid grid-cols-3 gap-6">
            <?php for ($i = 0; $i < 9; $i++): ?>
                <div class="bg-white rounded-xl shadow overflow-hidden">
                    <img src="../assets/images/sample.jpg" class="h-40 w-full object-cover">
                    <div class="p-4 space-y-2">
                        <h2 class="font-bold">ชื่อกิจกรรม</h2>
                        <p class="text-sm text-gray-500">📅 6 ก.พ. 2569</p>
                        <p class="text-sm">📍 กาฬสินธุ์</p>
                        <button class="w-full border border-red-500 text-red-500 py-2 rounded-lg">
                            ยกเลิกเข้าร่วม
                        </button>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </main>

</body>

</html>