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

    <form class="space-y-4">
      <label class="text-sm text-gray-500 ml-1">ชื่อกิจกรรม</label>
      <input placeholder="ชื่อกิจกรรม"
        class="w-full border rounded-lg px-3 py-2">

      <label class="text-sm text-gray-500 ml-1">วัน/เวลา</label>
      <input type="datetime-local"
        class="w-full border rounded-lg px-3 py-2">

      <label class="text-sm text-gray-500 ml-1">สถานที่</label>
      <input placeholder="จังหวัด..., อำเภอ..."
        class="w-full border rounded-lg px-3 py-2">

      <label class="text-sm text-gray-500 ml-1">รายละเอียด</label>
      <textarea placeholder="รายละเอียด"
        class="w-full border rounded-lg px-3 py-2 h-24"></textarea>

      <label class="text-sm text-gray-500 ml-1">ภาพตัวอย่างกิจกรรม</label>
      <div class="border-2 border-dashed rounded-lg p-6 text-center text-gray-500">
        อัปโหลดรูปกิจกรรม
      </div>

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