<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInformasiTable extends Migration
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
            'judul_konten' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi_konten' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar_konten' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'authorized_by' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_informasi');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_informasi');
    }
}
