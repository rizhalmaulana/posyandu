<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKelurahanTable extends Migration
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
            'id_kecamatan' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'nama_kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_kecamatan', 'tbl_kecamatan', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->createTable('tbl_kelurahan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_kelurahan');
    }
}