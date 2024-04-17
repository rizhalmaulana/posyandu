<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKunjunganTable extends Migration
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
            'tgl_kunjungan' => [
                'type' => 'DATE',
            ],
            'bulan_kunjungan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tahun_kunjungan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status_kunjungan' => [
                'type' => 'ENUM',
                'constraint' => ['Hadir', 'Tidak Hadir'],
            ],
            
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_balita', 'tbl_balita', 'id'); // Assuming there's a 'balita' table
        $this->forge->addForeignKey('id_posyandu', 'tbl_posyandu', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->createTable('tbl_kunjungan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_kunjungan');
    }
}