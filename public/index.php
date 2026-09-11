<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Controller.php';
require_once __DIR__ . '/../app/Repositories/MahasiswaRepository.php';
require_once __DIR__ . '/../app/Controllers/MahasiswaController.php';

use App\Repositories\MahasiswaRepository;
use App\Controllers\MahasiswaController;

$repo = new MahasiswaRepository($pdo);
$controller = new MahasiswaController($repo);

$url = $_GET['url'] ?? 'mahasiswa';

if ($url === 'mahasiswa') {
    $controller->index();
} elseif ($url === 'mahasiswa/create') {
    $controller->create();
} elseif ($url === 'mahasiswa/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store();
} else {
    http_response_code(404);
    echo "404 Halaman Tidak Ditemukan";
}

