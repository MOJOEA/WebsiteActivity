<?php
declare(strict_types=1);
session_start();

// กำหนดค่าคงที่สำหรับไดเรกทอรีต่างๆ ในโปรเจค
const INCLUDES_DIR = __DIR__ . '/../includes';
const ROUTE_DIR = __DIR__ . '/../src/routes';
const CONTROLLER_DIR = __DIR__ . '/../src/controllers';
const TEMPLATES_DIR = __DIR__ . '/../src/templates';
const DATABASES_DIR = __DIR__ . '/../src/databases';
const MODEL_DIR = __DIR__ . '/../src/model';

// รวมไฟล์ที่จำเป็น เข้ามาใช้งานใน index.php
require_once INCLUDES_DIR . '/router.php';
require_once INCLUDES_DIR . '/view.php';
require_once INCLUDES_DIR . '/database.php';

// เรียก database ฟังก์ชันเพื่อเชื่อมต่อฐานข้อมูล (ถ้าจำเป็น)

// ควบคุมการเข้าถึงหน้าเว็บด้วย session (ตัวอย่างการใช้งาน)
const PUBLIC_ROUTES = [
    '/',
    '/login',
    '/register',
];

$uri = strtolower($_SERVER['REQUEST_URI']);

if (in_array($uri, PUBLIC_ROUTES)) {
    dispatch($uri, $_SERVER['REQUEST_METHOD']);
    exit;
}

if (isset($_SESSION['timestamp']) && time() - $_SESSION['timestamp'] < 60 * 30) {
    $_SESSION['timestamp'] = time(); // รีเฟรชเวลา
    dispatch($uri, $_SERVER['REQUEST_METHOD']);
    exit;
}

unset($_SESSION['timestamp']);
header('Location: /login');
exit;