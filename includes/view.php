<?php
function renderView(string $view, array $data = []): void {
    require __DIR__ . '/../templates/pages/' . $view . '.php';
}

function renderErr(string $view, array $data = []): void {
    require __DIR__ . '/../templates/errors/' . $view . '.php';
}