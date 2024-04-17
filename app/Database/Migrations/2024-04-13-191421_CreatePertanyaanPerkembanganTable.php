<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePertanyaanPerkembanganTable extends Migration
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
            'id_master_pertanyaan' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'pertanyaan' => [
                'type' => 'VARCHAR',
                'constraint' => 355,
            ],
            'range_usia' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            
            'created_at DATETIME default current_timestamp',
            'updated_at DATETIME default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_master_pertanyaan', 'tbl_master_pertanyaan', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->createTable('tbl_pertanyaan_perkembangan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_pertanyaan_perkembangan');
    }
}
