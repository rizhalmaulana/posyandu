<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
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
            'id_posyandu' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
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
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'verified' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Master Admin', 'Admin', 'User'],
            ],
            'admin_selfie' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_posyandu', 'tbl_posyandu', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->createTable('tbl_admin');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_admin');
    }
}