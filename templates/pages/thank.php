<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <?php include __DIR__ . '/../partials/header.php'; ?>

    <!-- Main Content -->
    <main class="max-w-3xl mx-auto px-6 py-20">
        <div class="bg-white rounded-2xl shadow-lg p-10 text-center">
            <!-- Icon -->
            <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-green-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-3">
                ขอบคุณคุณ <?= htmlspecialchars($data['name']) ?>
            </h1>

            <p class="text-gray-600 mb-6">
                เราได้รับข้อความของคุณเรียบร้อยแล้ว  
                จะติดต่อกลับไปที่อีเมล
            </p>

            <p class="text-lg font-medium text-blue-600 mb-8">
                <?= htmlspecialchars($data['email']) ?>
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
