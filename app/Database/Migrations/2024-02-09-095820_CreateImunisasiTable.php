<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateImunisasiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pemeriksaan' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'id_balita' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'id_posyandu' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'vaksin_hepatitis_b' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_bcg' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_polio_tetes_1' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_dpt_hb_1' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_polio_tetes_2' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_rota_virus_1' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_pcv_1' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_dpt_hb_2' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_polio_tetes_3' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_rota_virus_2' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_pcv_2' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_dpt_hb_3' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_polio_tetes_4' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_polio_suntik_1' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_rota_virus_3' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_campak_rubella' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_polio_suntik_2' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_pcv_3' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_dpt_hb_lanjutan' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vaksin_campak_rubella_lanjutan' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_pemeriksaan', 'tbl_pemeriksaan', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->addForeignKey('id_balita', 'tbl_balita', 'id'); // Assuming there's a 'Balita' table
        $this->forge->addForeignKey('id_posyandu', 'tbl_posyandu', 'id'); // Assuming there's a 'Balita' table
        $this->forge->createTable('tbl_imunisasi');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_imunisasi');
    }
}
