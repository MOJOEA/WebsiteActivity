<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'WebsiteActivity' ?></title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php include __DIR__ . '/../header.php'; ?>
<body class="bg-gray-100">

<!-- Loader -->
<div id="loader"
     class="fixed inset-0 z-100 flex items-center justify-center bg-white">
    
    <div class="flex flex-col items-center gap-4">
        <!-- Spinner -->
        <div class="w-[4.5rem] h-[4.5rem] border-8 border-gray-300 border-t-blue-500 rounded-full animate-spin"></div>

        <p class="text-gray-600 text-lg">Loading...</p>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>
</div>
