<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JawabanPerkembanganSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_balita' => 2,
                'id_pertanyaan' => 1,
                'id_master_pertanyaan' => 1,
                'jawaban' => '1'
            ],
            [
                'id_balita' => 2,
                'id_pertanyaan' => 2,
                'id_master_pertanyaan' => 1,
                'jawaban' => '1'
            ],
            [
                'id_balita' => 2,
                'id_pertanyaan' => 3,
                'id_master_pertanyaan' => 1,
                'jawaban' => '1'
            ],
            [
                'id_balita' => 2,
                'id_pertanyaan' => 4,
                'id_master_pertanyaan' => 1,
                'jawaban' => '1'
            ],
            [
                'id_balita' => 2,
                'id_pertanyaan' => 5,
                'id_master_pertanyaan' => 1,
                'jawaban' => '1'
            ],
            [
                'id_balita' => 2,
                'id_pertanyaan' => 6,
                'id_master_pertanyaan' => 1,
                'jawaban' => '1'
            ],
            [
                'id_balita' => 2,
                'id_pertanyaan' => 7,
                'id_master_pertanyaan' => 1,
                'jawaban' => '0'
            ],
            [
                'id_balita' => 2,
                'id_pertanyaan' => 8,
                'id_master_pertanyaan' => 1,
                'jawaban' => '0'
            ],
        ];

        $this->db->table('tbl_jawaban_perkembangan')->insertBatch($data);
    }
}
