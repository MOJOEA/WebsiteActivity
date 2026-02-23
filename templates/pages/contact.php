<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
     <?php include __DIR__ . '/../../partials/header.php'; ?>

    <!-- Main Container -->
    <div class="max-w-4xl mx-auto px-6 py-12">
        <!-- Title -->
        <div class="text-center mb-10 bg-white rounded-2xl shadow-[0_0_20px_5px_rgba(0,0,0,0.1)] p-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">ติดต่อเรา</h1>
            <p class="text-gray-600">หากมีคำถามหรือข้อเสนอแนะ สามารถส่งข้อความถึงเราได้</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-[0_0_20px_5px_rgba(0,0,0,0.1)] p-8">
            <form method="POST" class="space-y-6">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        ชื่อ
                    </label>
                    <input type="text" name="name"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="กรอกชื่อของคุณ">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        อีเมล
                    </label>
                    <input type="email" name="email"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="example@email.com">
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        ข้อความ
                    </label>
                    <textarea rows="4" name="message"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="พิมพ์ข้อความของคุณที่นี่"></textarea>
                </div>

                <!-- Button -->
                <div class="text-right">
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-2 text-white font-semibold hover:bg-blue-700 transition">
                        ส่งข้อความ
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php include __DIR__ . '/../../partials/footer.php'; ?>
</body>

</html>
