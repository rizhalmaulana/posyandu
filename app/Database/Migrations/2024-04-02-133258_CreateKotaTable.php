<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKotaTable extends Migration
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
            'nama_kota' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at DATETIME default current_timestamp',
            'updated_at DATETIME default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_kota');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_kota');
    }
}