<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col bg-gray-100">

    <?php include __DIR__ . '/../partials/header.php'; ?>

    <main class="flex-grow flex items-center justify-center px-6 mt-10 mb-10">
        <div class="bg-white shadow-[0_0_20px_5px_rgba(0,0,0,0.1)] rounded-xl w-full max-w-lg p-8">
            <h1 class="text-2xl font-bold text-center mb-6">สมัครสมาชิก</h1>

            <form action="/register" method="POST" enctype="multipart/form-data" class="space-y-4">

                <!-- full Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">ชื่อ-นามสกุล</label>
                    <input type="text" name="name" required
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">อีเมล</label>
                    <input type="email" name="email" required
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>
                
                <!-- Date of Birth -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">วันเกิด</label>
                    <input type="date" name="date_of_birth"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <!-- Gender -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">เพศ</label>
                    <select name="gender"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                        <option value="">เลือกเพศ</option>
                        <option value="male">ชาย</option>
                        <option value="female">หญิง</option>
                        <option value="other">อื่นๆ</option>
                    </select>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">รหัสผ่าน</label>
                    <input type="password" name="password" required
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">ยืนยันรหัสผ่าน</label>
                    <input type="password" name="password_confirm" required
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">รูปโปรไฟล์</label>

                    <label
                        class="flex flex-col items-center justify-center w-full h-20 px-4 border-2 border-dashed rounded-xl cursor-pointer
                            bg-gray-50 hover:bg-gray-100 border-gray-300 text-gray-500 transition">

                        <p class="text-sm">
                            <span class="font-semibold text-blue-600">คลิกเพื่ออัปโหลด</span>
                            หรือ ลากไฟล์มาวาง
                        </p>
                        <p class="text-xs text-gray-400 mt-1">PNG, JPG (ไม่เกิน 2MB)</p>

                        <input type="file" name="image" accept="image/*" class="hidden">
                    </label>
                </div>

                <?php if (!empty($data['error'])): ?>
                    <div class="mb-4 rounded-lg bg-red-100 px-4 py-2 text-red-700 text-sm text-center">
                        <?= htmlspecialchars($data['error']) ?>
                    </div>
                <?php endif; ?>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">
                    สมัครสมาชิก
                </button>

            </form>
        </div>
    </main>

    <?php include __DIR__ . '/../partials/footer.php'; ?>

</body>

</html>
