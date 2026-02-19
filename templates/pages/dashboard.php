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
                <p class="text-gray-500 text-sm">ผู้เข้าร่วมทั้งหมด</p>
                <h2 class="text-3xl font-bold mt-2"><?= $data['Conut']['users'] ?></h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500 text-sm">ยังไม่อนุมัติ</p>
                <h2 class="text-3xl font-bold mt-2"><?= $data['Conut']['pending_status'] ?></h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500 text-sm">อนุมัติแล้ว</p>
                <h2 class="text-3xl font-bold mt-2"><?= $data['Conut']['yes_status'] ?></h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500 text-sm">เช็คอิน</p>
                <h2 class="text-3xl font-bold mt-2"><?= $data['Conut']['checkin'] ?></h2>
            </div>

        </div>

        <!-- 📊 Charts Section -->
        <div class="grid grid-cols-2 gap-6">

            <!-- Bar Chart -->
            <div class="bg-white p-6 rounded-xl shadow h-[300px]">
                <h2 class="font-bold mb-4">อายุของผู้เข้าร่วม</h2>
                <canvas id="barChart"></canvas>
            </div>

            <!-- Pie Chart -->
            <div class="bg-white p-6 rounded-xl shadow h-[300px]">
                <h2 class="font-bold mb-4">สัดส่วนสถานะกิจกรรม</h2>
                <div class=" p-6 h-[240px]"> <canvas id="pieChart" class="h-50 mr-18"></canvas></div>
            </div>

        </div>

        <!-- 📊 Recent Activities Table -->
        <div class="overflow-x-auto shadow-[0_0_20px_5px_rgba(0,0,0,0.1)]">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-sm text-gray-600">
                    <tr>
                        <th class="p-3">ผู้เข้าร่วม</th>
                        <th class="p-3">วันที่สมัคร</th>
                        <th class="p-3">อายุ / เพศ</th>
                        <th class="p-3">เช็คอิน</th>
                        <th class="p-3">สถานะ</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php foreach ($data['users'] as $user): ?>
                        <tr class="border-b">
                            <td class="p-3"><?= htmlspecialchars($user['name']) ?></td>

                            <td class="p-3"> <?= date('d/m/Y H:i', strtotime($user['registered_at'])) ?></td>

                            <td class="p-3"><?= $user['age'] ?> ปี / <?= $user['gender'] ?></td>

                            <td class="p-3"><?= $user['checked_in'] ? 'เช็คอินแล้ว' : 'ยังไม่เช็คอิน' ?></td>

                            <td class="p-3">
                                <form method="POST" action="/api/status">
                                    <input type="hidden"name="user_id"value="<?= htmlspecialchars($user['user_id'] ?? '') ?>">
                                    <input type="hidden"name="event_id"value="<?= htmlspecialchars($user['event_id'] ?? '') ?>">

                                    <?php if (($user['status'] ?? '') === 'pending'): ?>
                                        <button type="submit"
                                            class="px-3 py-1 text-xs bg-green-100 text-green-600 rounded-full">
                                            อนุญาต
                                        </button>
                                    <?php else: ?>
                                        <button type="submit"
                                            class="px-3 py-1 text-xs bg-red-100 text-red-600 rounded-full">
                                            ยกเลิก
                                        </button>
                                    <?php endif; ?>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </main>
    <script>
        // 📊 Bar Chart
        const barCtx = document.getElementById('barChart');

        if (barCtx) {
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ['0-17', '18-15', '26-35', '36-45', '46+'],
                    datasets: [{
                        label: 'ช่วงอายุผู้เข้าร่วม',
                        data: <?= json_encode(array_column($data['data_age'], 'total')) ?>,
                        backgroundColor: '#3b82f6'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        }
        <?php
        $genderData = $data['data_gender'] ?? [];

        $male = $genderData['male'] ?? 0;
        $female = $genderData['female'] ?? 0;
        $other = $genderData['other'] ?? 0;
        ?>

        // 🥧 Pie Chart
        const pieCtx = document.getElementById('pieChart');

        if (pieCtx) {
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['male', 'female', 'other'],
                    datasets: [{
                        data: [<?= $male ?>, <?= $female ?>, <?= $other ?>],
                        backgroundColor: [
                            '#117ad6',
                            '#d60e9d',
                            '#a7e5ce'
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
        }
    </script>
</body>

</html>