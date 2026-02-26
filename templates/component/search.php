<!DOCTYPE html>
<h1 class="text-2xl font-bold mb-6"><?php echo htmlspecialchars($data['title']); ?></h1>

<form action="<?php echo htmlspecialchars($data['action']); ?>" method="GET" class="bg-white p-6 rounded-xl shadow mb-8 ">
    <div class="grid grid-cols-4 gap-4 items-end">
        <!-- ค้นหาข้อความ -->
        <div class="col-span-3">
            <label class="block text-sm font-medium mb-1 text-gray-500">ค้นหากิจกรรม</label>
            <input
                type="text"
                name="keyword"
                placeholder="พิมพ์ชื่อกิจกรรม หรือ สถานที่"
                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- ปุ่มค้นหา --->
        <div class="mt-4 flex justify-end">
            <button
                type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition w-[50%]">
                ค้นหา
            </button>
        </div>

        <!-- วันเริ่ม -->
        <div>
            <label class="block text-sm font-medium mb-1 text-gray-500">วันเริ่ม</label>
            <input
                type="date"
                name="start_date"
                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1 text-gray-500">วันสิ้นสุด</label>
            <input
                type="date"
                name="end_date"
                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
    </div>
</form>