<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>แดชบอร์ด</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="flex bg-gray-100">

    <?php include __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="flex-1 p-8 space-y-8">

        <h1 class="text-2xl font-bold">แดชบอร์ด</h1>

        <!-- 🔢 Summary Cards -->
        <div class="grid grid-cols-4 gap-6">

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500 text-sm">กิจกรรมทั้งหมด</p>
                <h2 class="text-3xl font-bold mt-2">24</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500 text-sm">ผู้เข้าร่วมทั้งหมด</p>
                <h2 class="text-3xl font-bold mt-2">320</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500 text-sm">กิจกรรมที่กำลังจะมา</p>
                <h2 class="text-3xl font-bold mt-2">5</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500 text-sm">กิจกรรมที่สิ้นสุดแล้ว</p>
                <h2 class="text-3xl font-bold mt-2">19</h2>
            </div>

        </div>

        <!-- 📊 Charts Section -->
        <div class="grid grid-cols-2 gap-6">

            <!-- Bar Chart -->
            <div class="bg-white p-6 rounded-xl shadow h-[300px]">
                <h2 class="font-bold mb-4">จำนวนผู้เข้าร่วมรายเดือน</h2>
                <canvas id="barChart"></canvas>
            </div>

            <!-- Pie Chart -->
            <div class="bg-white p-6 rounded-xl shadow h-[300px]">
                <h2 class="font-bold mb-4">สัดส่วนสถานะกิจกรรม</h2>
                <div class=" p-6 h-[240px]"> <canvas id="pieChart" class="h-50 mr-18"></canvas></div>
            </div>

        </div>

        <!-- 📅 Upcoming Activities -->
        <div class="bg-white p-6 rounded-xl shadow ">
            <h2 class="font-bold text-lg mb-4">กิจกรรมที่กำลังจะมาถึง</h2>

            <div class="space-y-4">
                <?php for ($i = 0; $i < 3; $i++): ?>
                    <div class="flex justify-between items-center border-b pb-3">
                        <div>
                            <p class="font-medium">ชื่อกิจกรรม</p>
                            <p class="text-sm text-gray-500">6 ก.พ. 2569 • กาฬสินธุ์</p>
                        </div>
                        <span class="text-blue-600 font-medium">ดูรายละเอียด</span>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- 📊 Recent Activities Table -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="font-bold text-lg mb-4">กิจกรรมล่าสุด</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-sm text-gray-600">
                        <tr>
                            <th class="p-3">ชื่อกิจกรรม</th>
                            <th class="p-3">วันที่</th>
                            <th class="p-3">สถานที่</th>
                            <th class="p-3">ผู้เข้าร่วม</th>
                            <th class="p-3">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <tr class="border-b">
                                <td class="p-3">ชื่อกิจกรรม</td>
                                <td class="p-3">6 ก.พ. 2569</td>
                                <td class="p-3">กาฬสินธุ์</td>
                                <td class="p-3">50 คน</td>
                                <td class="p-3">
                                    <span class="px-3 py-1 text-xs bg-green-100 text-green-600 rounded-full">
                                        เปิดรับสมัคร
                                    </span>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <script>
        // 📊 Bar Chart
        const barCtx = document.getElementById('barChart');

        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.'],
                datasets: [{
                    label: 'จำนวนผู้เข้าร่วม',
                    data: [30, 45, 60, 50, 70, 65],
                    backgroundColor: '#3b82f6'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // 🥧 Pie Chart
        const pieCtx = document.getElementById('pieChart');

        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['เปิดรับสมัคร', 'ใกล้เต็ม', 'ปิดรับสมัคร'],
                datasets: [{
                    data: [12, 5, 7],
                    backgroundColor: [
                        '#22c55e',
                        '#facc15',
                        '#ef4444'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });
    </script>
</body>

</html>