<?php

declare(strict_types=1);
// กำหนดค่าคงที่สำหรับการอนุญาตวิธีการร้องขอต่างๆ
// ในที่นี้ เราอนุญาตเฉพาะ GET และ POST
const ALLOW_METHODS = ['GET', 'POST'];
const INDEX_URI = '';

// กำหนดค่าคงที่สำหรับ route เริ่มต้น
const INDEX_ROUNTE = 'home';
// routes/contact.php

// ฟังชันสำหรับทำให้ URI ที่ร้องขอเข้ามาอยู่ในรูปแบบมาตรฐาน
function normalizeUri(string $uri): string{
    $uri = strtok($uri, '?'); // ลบ query string ออก
    $uri = strtolower(trim($uri, '/'));
    return $uri == INDEX_URI ? INDEX_ROUNTE : $uri;
}

function notFound(): void{
    http_response_code(404);
    renderErr('404');
    exit;
}

// ฟังชันสำหรับการหาเส้นทางไฟล์ PHP ที่ตรงกับ URI ที่ร้องขอเข้ามา
function getFilePath(string $uri): string
{
    return ROUTE_DIR . '/' . normalizeUri($uri) . '.php';
}

// ฟังก์ชันหลักสำหรับการจัดการเส้นทาง (routing) ที่ถูกเรียกใช้จาก index.php
function dispatch(string $uri, string $method): void
{
    // ฟังชันสำหรับทำให้ URI ที่ร้องขอเข้ามาอยู่ในรูปแบบมาตรฐาน
    $uri = parse_url($uri, PHP_URL_PATH);
    $uri = normalizeUri($uri);

    // ตรวจสอบว่าวิธีการร้องขอ (HTTP Method) ถูกอนุญาตหรือไม่
    if (!in_array(strtoupper($method), ALLOW_METHODS)) {
        notFound();
        return;
    }

    // ฟังชันสำหรับการหาเส้นทางไฟล์ PHP ที่ตรงกับ URI ที่ร้องขอเข้ามา
    $filePath = getFilePath($uri);
    if (file_exists($filePath)) {
        include($filePath);
        return;
    } else {
        echo "File not found: $filePath";
        exit;
    }
}

function controller(string $controller): string
{
    return CONTROLLER_DIR . '/' . $controller . '.php';
}
