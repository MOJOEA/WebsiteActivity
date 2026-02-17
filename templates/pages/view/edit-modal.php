<div id="editModal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 h-auto">

    <div class="bg-white w-full max-w-lg rounded-xl p-6 relative h-auto"
        onclick="event.stopPropagation()">

        <!-- ปุ่มปิด -->
        <button onclick="closeEditModal()"
            class="absolute right-4 top-4 text-gray-500 text-xl">
            ✕
        </button>

        <h2 class="text-xl font-bold mb-4">แก้ไขกิจกรรม</h2>

        <form id="editForm">

            <input type="hidden" id="editId">

            <div class="mb-3">
                <label class="block text-sm mb-1">ชื่อกิจกรรม</label>
                <input type="text" id="editTitle"
                    class="w-full border rounded-lg p-2">
            </div>

            <div class="mb-3">
                <label class="block text-sm mb-1">วันที่</label>
                <input type="text" id="editDate"
                    class="w-full border rounded-lg p-2">
            </div>

            <div class="mb-3">
                <label class="block text-sm mb-1">สถานที่</label>
                <input type="text" id="editLocation"
                    class="w-full border rounded-lg p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-1">รายละเอียด</label>
                <textarea id="editDescription"
                    class="w-full border rounded-lg p-2"></textarea>
            </div>

            <label class="text-sm text-gray-500 ml-1">ภาพตัวอย่างกิจกรรม</label>
            <div class="border-2 border-dashed rounded-lg p-6 text-center text-gray-500">
                อัปโหลดรูปกิจกรรม
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg mt-3 hover:bg-blue-700 transition">
                บันทึกการแก้ไข
            </button>

            <button type="submit"
                class="w-full bg-gray-400 text-white py-2 rounded-lg mt-3 hover:bg-gray-400 transition ">
                ยกเลิกการแก้ไข
            </button>

        </form>

    </div>
</div>

<script>
    function openEditModal(id, title, date, location, description) {

        document.getElementById('editId').value = id;
        document.getElementById('editTitle').value = title;
        document.getElementById('editDate').value = date;
        document.getElementById('editLocation').value = location;
        document.getElementById('editDescription').value = description;

        const modal = document.getElementById('editModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }

    document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const id = document.getElementById('editId').value;
        const title = document.getElementById('editTitle').value;

        alert('บันทึกกิจกรรมที่ ' + id + ' เรียบร้อยแล้ว');

        closeEditModal();
    });
</script>