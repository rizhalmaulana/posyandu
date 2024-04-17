<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMasterPertanyaanTable extends Migration
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
            'judul_pertanyaan' => [
                'type' => 'VARCHAR',
                'constraint' => 355,
            ],
            'total_pertanyaan' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'status_pertanyaan' => [
                'type' => 'ENUM',
                'constraint' => ['Tidak Aktif', 'Aktif'],
            ],
            
            'created_at DATETIME default current_timestamp',
            'updated_at DATETIME default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_master_pertanyaan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_master_pertanyaan');
    }
}
