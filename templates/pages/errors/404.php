<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <?php include __DIR__ . '/../partials/header.php'; ?>

    <main class="min-h-[60vh] flex items-center justify-center px-6 mt-10 mb-10">
        <div class="bg-white rounded-2xl shadow-lg p-10 text-center max-w-md">
            <h1 class="text-6xl font-extrabold text-red-500 mb-4">404</h1>
            <h2 class="text-2xl font-bold mb-2">ไม่พบหน้าที่คุณต้องการ</h2>
            <p class="text-gray-600 mb-6">
                URL ที่คุณเข้ามาอาจถูกลบหรือไม่ถูกต้อง
            </p>
            <a href="/"
               class="inline-block rounded-lg bg-blue-600 px-6 py-2 text-white font-semibold hover:bg-blue-700 transition">
                กลับหน้าแรก
            </a>
        </div>
    </main>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>

</html>
