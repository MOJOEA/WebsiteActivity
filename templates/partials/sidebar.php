<aside class="w-64 bg-white h-[100vh] border-r p-4 relative">
  <a href="/"><h2 class="text-xl font-bold mb-6">EventHub</h2></a>

  <!-- ปุ่มสร้าง -->
  <button
    onclick="openModal()"
    class="w-full bg-blue-600 text-white py-2 rounded-lg mb-4">
    + สร้างกิจกรรม
  </button>

  <nav class="space-y-2 ">
    <li><a href="/Event" class="block p-2 rounded bg-gray-200 text-blue-600">ค้นหา</a></li>
    <li><a href="/my-activities" class="block p-2 rounded bg-blue-50 text-blue-600">กิจกรรมของฉัน</a></li>
  </nav>

  <div class="absolute bottom-4 left-4 text-sm mb-12">
    <p class="font-medium"><?= $_SESSION['user']['name'] ?></p>
    <p class="text-gray-500"><?= $_SESSION['user']['email'] ?></p>
    <a href="/logout" class="text-red-500 block mt-2">ออกจากระบบ</a>
  </div>
</aside>