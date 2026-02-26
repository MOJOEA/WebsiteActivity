<?php if (!empty($_SESSION['flash'])): ?>
    <?php
    $type = $_SESSION['flash']['type'] ?? 'info';
    $message = $_SESSION['flash']['message'] ?? '';

    $styles = [
        'success' => 'bg-green-100 text-green-700 border-green-400',
        'error'   => 'bg-red-100 text-red-700 border-red-400',
        'warning' => 'bg-yellow-100 text-yellow-700 border-yellow-400',
        'info'    => 'bg-blue-100 text-blue-700 border-blue-400',
    ];
    $style = $styles[$type] ?? $styles['info'];
    ?>
    <div class="mb-6 border-l-4 p-4 rounded-lg shadow-sm flex items-start gap-3 <?= $style ?>">
        <div class="flex-1">
            <p class="text-sm"><?= htmlspecialchars($message) ?></p>
        </div>
        <button onclick="this.parentElement.remove()" class="text-lg font-bold opacity-70 hover:opacity-100"> ×</button>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>