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

    <!-- 🔍 Search Filter -->
    <form method="GET" class="bg-white p-6 rounded-xl shadow mb-8 ">
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
        <?php for ($i = 0; $i < 6; $i++): ?>
            <div class="bg-white rounded-xl shadow-[0_0_20px_5px_rgba(0,0,0,0.1)] overflow-hidden w-[350px]">
                <img src="./img/img1.png" class="h-40 w-full object-cover">
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

    <!-- include modal -->
    <?php include __DIR__ . '/create-modal.php'; ?>

</body>

</html>