<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\MahasiswaRepository;

class MahasiswaController extends Controller {
    private MahasiswaRepository $repo;

    public function __construct(MahasiswaRepository $repo) {
        $this->repo = $repo;
    }

    public function index(): void {
        $mahasiswa = $this->repo->all();
        $this->view('mahasiswa/index', [
            'title' => 'Daftar Mahasiswa',
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function create(): void {
        $prodiList = $this->repo->getProdiList();
        $this->view('mahasiswa/create', [
            'title' => 'Tambah Mahasiswa',
            'prodiList' => $prodiList
        ]);
    }

   public function store(): void {
        $data = [
            'nim' => $_POST['nim'] ?? '',
            'nama' => $_POST['nama'] ?? '',
            'email' => $_POST['email'] ?? '',
            'prodi_id' => (int) ($_POST['prodi_id'] ?? 0),
            'angkatan' => (int) ($_POST['angkatan'] ?? 0)
        ];
        
        $this->repo->create($data);
        $this->redirect('/si-akademik-baru/public/index.php?url=mahasiswa');
    }
}