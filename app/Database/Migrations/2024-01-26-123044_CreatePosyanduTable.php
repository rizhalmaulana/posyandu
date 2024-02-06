<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePosyanduTable extends Migration
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
            'id_kota' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'id_kecamatan' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'id_kelurahan' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'nama_posyandu' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_posyandu' => [
                'type' => 'TEXT',
            ],
            'status_posyandu' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_kota', 'tbl_kota', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->addForeignKey('id_kecamatan', 'tbl_kecamatan', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->addForeignKey('id_kelurahan', 'tbl_kelurahan', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->createTable('tbl_posyandu');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_posyandu');
    }
}