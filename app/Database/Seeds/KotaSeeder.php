<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KotaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kota' => 'Jakarta Pusat',
            ],
            [
                'nama_kota' => 'Jakarta Selatan',
            ],
            [
                'nama_kota' => 'Jakarta Utara',
            ],
            [
                'nama_kota' => 'Jakarta Barat',
            ],
            [
                'nama_kota' => 'Jakarta Timur',
            ],
            // Add more seed data as needed
        ];

        // Insert the data
        $this->db->table('tbl_kota')->insertBatch($data);
    }
}
