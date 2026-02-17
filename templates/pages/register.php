<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>สมัครสมาชิก</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<?php include __DIR__ . '/../partials/header.php'; ?>   

<div class="bg-white w-full max-w-xl rounded-xl shadow p-8">
  <h1 class="text-2xl font-bold text-center mb-6">สมัครสมาชิก</h1>

  <form class="space-y-4">
    <div class="grid grid-cols-2 gap-4">
      <input placeholder="ชื่อจริง" class="input">
      <input placeholder="นามสกุล" class="input">
    </div>

    <input placeholder="email@example.com" class="input">
    
    <div class="grid grid-cols-2 gap-4">
      <input placeholder="อายุ" class="input">
      <select class="input">
        <option>เลือกเพศ</option>
        <option>ชาย</option>
        <option>หญิง</option>
        <option>อื่น ๆ</option>
      </select>
    </div>

    <input type="password" placeholder="อย่างน้อย 8 ตัวอักษร" class="input">
    <input type="password" placeholder="ยืนยันรหัสผ่าน" class="input">

    <!-- Upload -->
    <div class="border-2 border-dashed rounded-lg p-6 text-center text-gray-500">
      ลากวางรูปภาพ หรือคลิกเพื่อเลือก<br>
      <span class="text-sm">PNG, JPG, WEBP</span>
    </div>

    <button class="w-full bg-blue-600 text-white py-3 rounded-lg">
      สมัครสมาชิก
    </button>
  </form>

  <p class="text-center text-sm mt-4">
    มีบัญชีแล้ว?
    <a href="login.php" class="text-blue-600">เข้าสู่ระบบ</a>
  </p>
</div>

<style>
  .input{
    @apply w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500;
  }
</style>
<?php include __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>
