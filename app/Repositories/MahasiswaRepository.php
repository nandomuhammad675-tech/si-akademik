<?php
namespace App\Repositories;

use PDO;

class MahasiswaRepository {
    public function __construct(private PDO $pdo) {}

    public function all(): array {
        $stmt = $this->pdo->query(
            "SELECT m.*, p.nama AS prodi_nama 
             FROM mahasiswa m 
             JOIN prodi p ON m.prodi_id = p.id"
        );
        return $stmt->fetchAll();
    }

    public function getProdiList(): array {
        $stmt = $this->pdo->query("SELECT * FROM prodi");
        return $stmt->fetchAll();
    }

    public function create(array $data): bool {
        $stmt = $this->pdo->prepare(
            "INSERT INTO mahasiswa (nim, nama, email, prodi_id, angkatan) 
             VALUES (:nim, :nama, :email, :prodi_id, :angkatan)"
        );
        return $stmt->execute($data);
    }
}