<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <?php include __DIR__ . '/../partials/header.php'; ?>

    <main class="bg-gray-100 flex items-center justify-center mb-12">
        <div class="bg-white w-full max-w-md rounded-xl shadow-[0_0_20px_5px_rgba(0,0,0,0.1)] p-8 mt-12">
            <div class="text-center mb-6">
                <div class="mx-auto w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                    ➜
                </div>
                <h1 class="text-2xl font-bold mt-4">เข้าสู่ระบบ</h1>
                <p class="text-gray-500">ยินดีต้อนรับกลับ!</p>
            </div>

            <form class="space-y-4" action="/login" method="POST">
                <input type="email" name="email" placeholder="email@example.com"
                    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <input type="password" name="password" placeholder="รหัสผ่าน"
                    class="w-full border rounded-lg px-4 py-3">

                <?php if (!empty($data['error'])): ?>
                    <div class="mb-4 rounded-lg bg-red-100 px-4 py-2 text-red-700 text-sm text-center">
                        <?= htmlspecialchars($data['error']) ?>
                    </div>
                <?php endif; ?>
                
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                    เข้าสู่ระบบ
                </button>
            </form>

            <p class="text-center text-sm mt-4">
                ยังไม่มีบัญชี?
                <a href="register.php" class="text-blue-600">สมัครสมาชิก</a>
            </p>
        </div>
    </main>
    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>

</html>