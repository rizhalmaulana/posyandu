<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJawabanPerkembanganTable extends Migration
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
            'id_pertanyaan' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'jawaban' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
            ],
            
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_balita', 'tbl_balita', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->addForeignKey('id_pertanyaan', 'tbl_pertanyaan_perkembangan', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->createTable('tbl_jawaban_perkembangan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_jawaban_perkembangan');
    }
}
