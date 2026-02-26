<div id="viewModal"
    class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 backdrop-blur-sm">

    <div onclick="event.stopPropagation()"
        class="bg-white w-full max-w-5xl h-[600px] rounded-2xl overflow-hidden shadow-2xl flex relative">

        <!-- ปุ่มปิด -->
        <button onclick="closeViewModal()" class="absolute right-5 top-5 text-gray-400 hover:text-red-500 text-2xl z-20">✕</button>
        <!-- ซ้าย : รูปกิจกรรม -->
        <div class="w-1/2 h-full relative overflow-hidden flex items-center justify-center">
            <!-- ภาพพื้นหลังเบลอ -->
            <div id="blurBackground" class="absolute inset-0 bg-center bg-cover scale-110 blur-2xl opacity-40"></div>
            <!-- ภาพหลัก -->
            <img id="mainImage" class="relative max-h-full max-w-full object-contain z-10 transition duration-300">
            <!-- ปุ่มซ้าย -->
            <button type="button" onclick="prevImage()" class="absolute left-4 z-20 bg-white/70 hover:bg-white rounded-full w-10 h-10 flex items-center justify-center shadow"> ❮ </button>
            <!-- ปุ่มขวา -->
            <button type="button" onclick="nextImage()" class="absolute right-4 z-20 bg-white/70 hover:bg-white rounded-full w-10 h-10 flex items-center justify-center shadow"> ❯ </button>
        </div>

        <!-- ขวา : รายละเอียด -->
        <div class="w-1/2 p-8 flex flex-col gap-6">

            <div>
                <h2 id="modalTitle" class="text-3xl font-bold text-gray-800 mb-2"></h2>
                <p id="modalDate" class="text-gray-500 text-sm"></p>
                <p id="midalEndDate" class="text-gray-500 text-sm"></p>
                <p id="modalLocation" class="text-gray-500 text-sm"></p>
            </div>

            <!-- กรอบรายละเอียด -->
            <div class="border rounded-xl p-4 bg-gray-50 h-[150px] overflow-auto">
                <p id="modalDescription" class="text-gray-700 leading-relaxed text-sm"></p>
            </div>

            <!-- จำนวนผู้เข้าร่วม -->
            <div class="border-2 border-blue-500 rounded-xl px-5 py-4 flex justify-between items-center">
                <span class="text-blue-600 font-semibold"> จำนวนผู้เข้าร่วม </span>
                <span class="text-blue-700 font-bold text-lg" id="modalParticipants"></span>
            </div>

            <!-- ผู้สร้าง -->
            <div class="border rounded-xl p-4 bg-gray-50 flex items-center gap-4">

                <div class="w-16 h-16 rounded-full bg-gray-300 overflow-hidden flex-shrink-0">
                    <img src="../images/profile.png" class="w-full h-full object-cover">
                </div>

                <div>
                    <p class="font-semibold text-gray-700"> ผู้สร้างกิจกรรม </p>
                    <p class="text-gray-500 text-sm"> ชื่อ : <span id="modalName"></span></p>
                    <p class="text-gray-500 text-sm"> Email : <span id="modalEmail"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let images = [];
    let currentIndex = 0;

    function openViewModal(event, user) {

        // ===== ข้อมูลพื้นฐาน =====
        document.getElementById('modalTitle').innerText = event.title || '';
        document.getElementById('modalDate').innerText = 'Date : ' + (event.event_date || '');
        document.getElementById('midalEndDate').innerText = 'End Date : ' + (event.end_date || '');
        document.getElementById('modalLocation').innerText = 'Location : ' + (event.location || '');

        document.getElementById('modalDescription').innerText = event.description || '';

        // ===== ผู้สมัคร =====
        document.getElementById('modalName').innerText = user?.name || '';
        document.getElementById('modalEmail').innerText = user?.email || '';

        // ===== จำนวนผู้เข้าร่วม =====
        const participantEl = document.getElementById('modalParticipants');

        const current = parseInt(event.current_participants) || 0;
        const max = parseInt(event.max_participants) || 0;

        participantEl.innerText = current + " / " + max;

        if (max > 0 && current >= max) {
            participantEl.classList.remove('text-blue-700');
            participantEl.classList.add('text-red-600');
        } else {
            participantEl.classList.remove('text-red-600');
            participantEl.classList.add('text-blue-700');
        }

        // ===== รูปภาพ =====
        let imageArray = [];

        images = (Array.isArray(imageArray) && imageArray.length > 0) ?
            imageArray :
            ['../images/img1.png'];

        currentIndex = 0;
        updateImage();

        // ===== เปิด modal =====
        const modal = document.getElementById('viewModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function updateImage() {
        const mainImage = document.getElementById('mainImage');
        const blurBg = document.getElementById('blurBackground');

        if (!images.length) return;

        mainImage.src = images[currentIndex];
        blurBg.style.backgroundImage = `url('${images[currentIndex]}')`;
    }

    function nextImage() {
        if (images.length <= 1) return;
        currentIndex = (currentIndex + 1) % images.length;
        updateImage();
    }

    function prevImage() {
        if (images.length <= 1) return;
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateImage();
    }

    function closeViewModal() {
        const modal = document.getElementById('viewModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>