<?php 
$nevs = [
    ['routes' => '/Event', 'title' => 'ค้นหา'],
    ['routes' => '/my-Event', 'title' => 'กิจกรรมของฉัน'],
    ['routes' => '/my-Event', 'title' => 'คำขอของฉัน'],
    ['routes' => '/login', 'title' => 'เข้าสู่ระบบ'],
    ['routes' => '/register', 'title' => 'สมัครสมาชิก'],
    ['routes' => '/contact', 'title' => 'แจ้งปัญหา']
];
?>

<aside class="w-64 bg-white min-h-screen border-r p-4 relative">
  <a href="/"><h2 class="text-xl font-bold mb-6">EventHub</h2></a>

  <button
    onclick="openPopup()"
    class="w-full bg-blue-600 text-white py-2 rounded-lg mb-4">
    + สร้างกิจกรรม
  </button>

  <nav class="space-y-2">
    <ul class="list-none p-0 m-0 space-y-2">
    <?php foreach($nevs as $nav): ?>
        <li><a href="<?= $nav['routes'] ?>"class="block p-2 rounded bg-gray-100 text-blue-600 hover:bg-gray-200"><?= $nav['title'] ?></a></li>
      <?php endforeach; ?>
    </ul>
  </nav>

  <div class="absolute bottom-4 left-4 text-sm mb-12">
    <p class="font-medium"><?= $_SESSION['user']['name'] ?? "" ?></p>
    <p class="text-gray-500"><?= $_SESSION['user']['email'] ?? "" ?></p>
    <a href="/logout" class="text-red-500 block mt-2">ออกจากระบบ</a>
  </div>
</aside>