<?php
function renderView(string $view, array $data = []): void {
    require __DIR__ . '/../templates/pages/' . $view . '.php';
}

function renderErr(string $view, array $data = []): void {
    require __DIR__ . '/../templates/pages/errors/' . $view . '.php';
}

function renderSearch(string $view, array $data = []): void {
    include __DIR__ . '/../templates/component/' . $view . '.php';
}

function redirectWithMessage(string $type, string $message, string $redirect_url): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    header('Location: ' . $redirect_url);
    exit;
}

function rederErrmsg(): void{
    include __DIR__ . '/../templates/component/errmsg.php';
}