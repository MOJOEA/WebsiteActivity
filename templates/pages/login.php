<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <?php include __DIR__ . '/../partials/header.php'; ?>

    <main class="min-h-[60vh] flex items-center justify-center px-6 mt-10 mb-10">
        <div class="bg-white rounded-2xl shadow-lg p-10 w-full max-w-md">
            <h1 class="text-3xl font-bold text-center mb-6">เข้าสู่ระบบ</h1>

            <?php if (!empty($data['error'])): ?>
                <div class="mb-4 rounded-lg bg-red-100 px-4 py-2 text-red-700 text-sm">
                    <?= htmlspecialchars($data['error']) ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-5">
                <div>
                    <label class="block text-sm font-medium mb-1">อีเมล</label>
                    <input type="email" name="email" required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">รหัสผ่าน</label>
                    <input type="password" name="password" required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit"
                    class="w-full rounded-lg bg-blue-600 py-2 text-white font-semibold hover:bg-blue-700 transition">
                    เข้าสู่ระบบ
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 mt-6">
                ยังไม่มีบัญชี?
                <a href="/register" class="text-blue-600 hover:underline">สมัครสมาชิก</a>
            </p>
        </div>
    </main>
    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>

</html>
