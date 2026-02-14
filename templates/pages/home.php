<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <?php include __DIR__ . '/../partials/header.php'; ?>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-6 py-16">
        <!-- Hero Section -->
        <section class="text-center mb-16">
            <h1 class="text-5xl font-extrabold text-gray-900 mb-4">
                Welcome to WebSite Name
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                ระบบจัดการข้อมูลนักเรียนและรายวิชา  
                สำหรับการเรียนการสอนและการลงทะเบียน
            </p>
        </section>

        <!-- Feature Cards -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Students -->
            <div class="bg-white rounded-2xl shadow p-8 text-center hover:shadow-lg transition">
                <h2 class="text-2xl font-semibold mb-3">ข้อมูลนักเรียน</h2>
                <p class="text-gray-600 mb-6">
                    ดูและจัดการข้อมูลนักเรียนทั้งหมดในระบบ
                </p>
                <a href="/students"
                   class="inline-block rounded-lg bg-blue-600 px-6 py-2 text-white font-medium hover:bg-blue-700 transition">
                    ดูข้อมูล
                </a>
            </div>

            <!-- Courses -->
            <div class="bg-white rounded-2xl shadow p-8 text-center hover:shadow-lg transition">
                <h2 class="text-2xl font-semibold mb-3">ข้อมูลรายวิชา</h2>
                <p class="text-gray-600 mb-6">
                    แสดงและค้นหารายวิชาที่เปิดสอน
                </p>
                <a href="/course"
                   class="inline-block rounded-lg bg-blue-600 px-6 py-2 text-white font-medium hover:bg-blue-700 transition">
                    ดูรายวิชา
                </a>
            </div>

            <!-- Contact -->
            <div class="bg-white rounded-2xl shadow p-8 text-center hover:shadow-lg transition">
                <h2 class="text-2xl font-semibold mb-3">ติดต่อเรา</h2>
                <p class="text-gray-600 mb-6">
                    ส่งข้อความหรือข้อเสนอแนะถึงผู้ดูแลระบบ
                </p>
                <a href="/contact"
                   class="inline-block rounded-lg bg-blue-600 px-6 py-2 text-white font-medium hover:bg-blue-700 transition">
                    ติดต่อ
                </a>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>

</html>
