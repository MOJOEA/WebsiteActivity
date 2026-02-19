<!-- EDIT MODAL -->
<div id="editModal"
  onclick="closeEditModal()"
  class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

  <div class="bg-white w-full max-w-lg rounded-xl p-6 relative"
    onclick="event.stopPropagation()">

    <!-- ปุ่มปิด -->
    <button onclick="closeEditModal()"
      class="absolute right-4 top-4 text-gray-500 text-xl">
      ✕
    </button>

    <h2 class="text-xl font-bold mb-4">แก้ไขกิจกรรม</h2>

    <form id="editForm"
      action="/api/editedEvent"
      method="post"
      enctype="multipart/form-data"
      class="space-y-3">

      <!-- Hidden ID -->
      <input type="hidden" name="id" id="editId">

      <!-- ชื่อ -->
      <div>
        <label class="text-sm text-gray-500 ml-1">ชื่อกิจกรรม</label>
        <input name="name" id="editName"
          class="w-full border rounded-lg px-3 py-2"
          required>
      </div>

      <!-- วันเวลา -->
      <div>
        <label class="text-sm text-gray-500 ml-1">วัน/เวลา</label>
        <input type="datetime-local"
          name="date"
          id="editDate"
          class="w-full border rounded-lg px-3 py-2"
          required>
      </div>

      <!-- สถานที่ -->
      <div>
        <label class="text-sm text-gray-500 ml-1">สถานที่</label>
        <input name="location"
          id="editLocation"
          class="w-full border rounded-lg px-3 py-2"
          required>
      </div>

      <!-- รายละเอียด -->
      <div>
        <label class="text-sm text-gray-500 ml-1">รายละเอียด</label>
        <textarea name="description"
          id="editDescription"
          class="w-full border rounded-lg px-3 py-2 h-24"
          required></textarea>
      </div>

      <!-- จำนวน -->
      <div>
        <label class="text-sm text-gray-500 ml-1">จำนวนผู้เข้าร่วม</label>
        <input type="number"
          name="max"
          id="editMax"
          class="w-full border rounded-lg px-3 py-2"
          required>
      </div>

      <!-- รูป -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          รูปกิจกรรม
        </label>

        <label
          class="flex flex-col items-center justify-center w-full h-24 px-4 border-2 border-dashed rounded-xl cursor-pointer
          bg-gray-50 hover:bg-gray-100 border-gray-300 text-gray-500 transition">

          <p class="text-sm">
            <span class="font-semibold text-blue-600">คลิกเพื่ออัปโหลด</span>
            หรือ ลากไฟล์มาวาง
          </p>
          <p class="text-xs text-gray-400 mt-1">
            PNG, JPG (ไม่เกิน 2MB)
          </p>

          <input type="file"
            name="image"
            accept="image/*"
            class="hidden">
        </label>
      </div>

      <!-- ปุ่มบันทึก -->
      <button
        class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
        บันทึกการแก้ไข
      </button>

    </form>

  </div>
</div>



<script>
function openEditModal(eventObj) {

  document.getElementById('editId').value = eventObj.id;
  document.getElementById('editName').value = eventObj.title;
  document.getElementById('editDate').value = eventObj.event_date;
  document.getElementById('editLocation').value = eventObj.location;
  document.getElementById('editDescription').value = eventObj.description;
  document.getElementById('editMax').value = eventObj.max_participants;

  const modal = document.getElementById('editModal');
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeEditModal() {
  const modal = document.getElementById('editModal');
  modal.classList.remove('flex');
  modal.classList.add('hidden');
}
</script>
