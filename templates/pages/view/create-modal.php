<!-- Modal Overlay -->
<div id="createModal"
  class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

  <div class="bg-white w-full max-w-lg rounded-xl p-6 relative"
    onclick="event.stopPropagation()">

    <button onclick="closeModal()"
      class="absolute right-4 top-4 text-gray-500">
      ✕
    </button>

    <h2 class="text-xl font-bold mb-4">สร้างกิจกรรมใหม่</h2>

    <form action="create-modal" method="post" class="space-y-2">
      <label class="text-sm text-gray-500 ml-1">ชื่อกิจกรรม</label>
      <input placeholder="ชื่อกิจกรรม" name="name"
        class="w-full border rounded-lg px-3 py-2">

      <label class="text-sm text-gray-500 ml-1">วัน/เวลา</label>
      <input type="datetime-local" name="date"
        class="w-full border rounded-lg px-3 py-2">

      <label class="text-sm text-gray-500 ml-1">สถานที่</label>
      <input placeholder="จังหวัด..., อำเภอ..." name="locetion"
        class="w-full border rounded-lg px-3 py-2">

      <label class="text-sm text-gray-500 ml-1">รายละเอียด</label>
      <textarea placeholder="รายละเอียด" name="description"
        class="w-full border rounded-lg px-3 py-2 h-24"></textarea>

      <label class="text-sm text-gray-500 ml-1">จำนวนผู้เข้าร่วม</label>
      <input type="number" placeholder="จำนวนผู้เข้าร่วม" name="max"
        class="w-full border rounded-lg px-3 py-2">

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1 mt-2">รูปกิจกรรม</label>

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
      <button

        class="w-full bg-blue-600 text-white py-3 rounded-lg">
        สร้างกิจกรรม
      </button>
    </form>

  </div>
</div>

<script>
  function openModal() {
    const modal = document.getElementById('createModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeModal() {
    const modal = document.getElementById('createModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
  }
</script>