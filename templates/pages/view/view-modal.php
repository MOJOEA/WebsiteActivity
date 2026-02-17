<div id="viewModal"
     class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

  <div class="bg-white w-full max-w-xl rounded-xl p-6 relative"
       onclick="event.stopPropagation()">

    <!-- ปุ่มปิด -->
    <button onclick="closeViewModal()"
            class="absolute right-4 top-4 text-gray-500 text-xl">
        ✕
    </button>

    <!-- รูป -->
    <img src="../images/img1.png" class="h-80 w-full object-cover mt-8">

    <!-- รายละเอียด -->
    <h2 id="modalTitle" class="text-2xl font-bold mb-2"></h2>

    <p id="modalDate" class="text-sm text-gray-500 mb-1"></p>
    <p id="modalLocation" class="text-sm mb-3"></p>

    <p id="modalDescription" class="text-gray-700"></p>

  </div>
</div>

<script>
function openViewModal(title, date, location, description) {
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalDate').innerText = '📅 ' + date;
    document.getElementById('modalLocation').innerText = '📍 ' + location;
    document.getElementById('modalDescription').innerText = description;

    const modal = document.getElementById('viewModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeViewModal() {
    const modal = document.getElementById('viewModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}
</script>
