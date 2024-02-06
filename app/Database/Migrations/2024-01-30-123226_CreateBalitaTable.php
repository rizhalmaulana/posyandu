<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBalitaTable extends Migration
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
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'nomor_kk' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'nama_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_posyandu', 'tbl_posyandu', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->createTable('tbl_balita');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_balita');
    }
}