<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kota' => 1,
                'nama_kecamatan' => 'Cempaka Putih',
            ],
            [
                'id_kota' => 1,
                'nama_kecamatan' => 'Gambir',
            ],
            [
                'id_kota' => 1,
                'nama_kecamatan' => 'Johar Baru',
            ],
            [
                'id_kota' => 1,
                'nama_kecamatan' => 'Kemayoran',
            ],
            [
                'id_kota' => 1,
                'nama_kecamatan' => 'Menteng',
            ],
            [
                'id_kota' => 1,
                'nama_kecamatan' => 'Sawah Besar',
            ],
            [
                'id_kota' => 1,
                'nama_kecamatan' => 'Senen',
            ],
            [
                'id_kota' => 1,
                'nama_kecamatan' => 'Tanah Abang', // 8 Kecamatan Jakpus
            ],
            [
                'id_kota' => 2,
                'nama_kecamatan' => 'Cilandak',
            ],
            [
                'id_kota' => 2,
                'nama_kecamatan' => 'Jagakarsa',
            ],
            [
                'id_kota' => 2,
                'nama_kecamatan' => 'Kebayoran Baru',
            ],
            [
                'id_kota' => 2,
                'nama_kecamatan' => 'Kebayoran Lama',
            ],
            [
                'id_kota' => 2,
                'nama_kecamatan' => 'Mampang Prapatan',
            ],
            [
                'id_kota' => 2,
                'nama_kecamatan' => 'Pancoran',
            ],
            [
                'id_kota' => 2,
                'nama_kecamatan' => 'Pasar Minggu',
            ],
            [
                'id_kota' => 2,
                'nama_kecamatan' => 'Pesanggrahan', // 8 Kecamatan Jaksel
            ],
            [
                'id_kota' => 3,
                'nama_kecamatan' => 'Kelapa Gading',
            ],
            [
                'id_kota' => 3,
                'nama_kecamatan' => 'Cilincing',
            ],
            [
                'id_kota' => 3,
                'nama_kecamatan' => 'Koja',
            ],
            [
                'id_kota' => 3,
                'nama_kecamatan' => 'Penjaringan',
            ],
            [
                'id_kota' => 3,
                'nama_kecamatan' => 'Pademangan',
            ],
            [
                'id_kota' => 3,
                'nama_kecamatan' => 'Tanjung Priok', // 6 Kecamatan Jakut
            ],
            [
                'id_kota' => 4,
                'nama_kecamatan' => 'Cengkareng',
            ],
            [
                'id_kota' => 4,
                'nama_kecamatan' => 'Grogol Petamburan',
            ],
            [
                'id_kota' => 4,
                'nama_kecamatan' => 'Taman Sari',
            ],
            [
                'id_kota' => 4,
                'nama_kecamatan' => 'Tambora',
            ],
            [
                'id_kota' => 4,
                'nama_kecamatan' => 'Kebon Jeruk',
            ],
            [
                'id_kota' => 4,
                'nama_kecamatan' => 'Kalideres',
            ],
            [
                'id_kota' => 4,
                'nama_kecamatan' => 'Palmerah', 
            ],
            [
                'id_kota' => 4,
                'nama_kecamatan' => 'Kembangan', // 8 Kecamatan Jakbar
            ],
            [
                'id_kota' => 5,
                'nama_kecamatan' => 'Cakung',
            ],
            [
                'id_kota' => 5,
                'nama_kecamatan' => 'Cipayung',
            ],
            [
                'id_kota' => 5,
                'nama_kecamatan' => 'Ciracas',
            ],
            [
                'id_kota' => 5,
                'nama_kecamatan' => 'Duren Sawit',
            ],
            [
                'id_kota' => 5,
                'nama_kecamatan' => 'Jatinegara',
            ],
            [
                'id_kota' => 5,
                'nama_kecamatan' => 'Kramat Jati',
            ],
            [
                'id_kota' => 5,
                'nama_kecamatan' => 'Matraman', 
            ],
            [
                'id_kota' => 5,
                'nama_kecamatan' => 'Pulo Gadung', // 8 Kecamatan Jaktim
            ],
            // Add more seed data as needed
        ];

        // Insert the data
        $this->db->table('tbl_kecamatan')->insertBatch($data);
    }
}
