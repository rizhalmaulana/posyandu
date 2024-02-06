<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MasterPertanyaanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul_pertanyaan' => 'Perawatan Bayi Usia 29 hari - 3 Bulan',
                'total_pertanyaan' => 8,
                'status_pertanyaan' => 'Aktif',
            ],
            [
                'judul_pertanyaan' => 'Perawatan Bayi Usia 3 - 6 Bulan',
                'total_pertanyaan' => 10,
                'status_pertanyaan' => 'Aktif',
            ],
            [
                'judul_pertanyaan' => 'Perawatan Bayi Usia 6 - 9 Bulan',
                'total_pertanyaan' => 11,
                'status_pertanyaan' => 'Aktif',
            ],
            [
                'judul_pertanyaan' => 'Perawatan Bayi Usia 9 - 12 Bulan',
                'total_pertanyaan' => 12,
                'status_pertanyaan' => 'Aktif',
            ],
            [
                'judul_pertanyaan' => 'Perawatan Bayi Usia 12 - 18 Bulan',
                'total_pertanyaan' => 8,
                'status_pertanyaan' => 'Aktif',
            ],
            [
                'judul_pertanyaan' => 'Perawatan Bayi Usia 18 - 24 Bulan',
                'total_pertanyaan' => 8,
                'status_pertanyaan' => 'Aktif',
            ],
            [
                'judul_pertanyaan' => 'Perawatan Bayi Usia 2 - 3 Tahun',
                'total_pertanyaan' => 9,
                'status_pertanyaan' => 'Aktif',
            ],
            [
                'judul_pertanyaan' => 'Perawatan Bayi Usia 3 - 4 Tahun',
                'total_pertanyaan' => 13,
                'status_pertanyaan' => 'Aktif',
            ],
            [
                'judul_pertanyaan' => 'Perawatan Bayi Usia 4 - 5 Tahun',
                'total_pertanyaan' => 18,
                'status_pertanyaan' => 'Aktif',
            ],
        ];

        $this->db->table('tbl_master_pertanyaan')->insertBatch($data);
    }
}