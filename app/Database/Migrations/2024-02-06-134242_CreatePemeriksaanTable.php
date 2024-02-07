<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePemeriksaanTable extends Migration
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
            'berat_badan_lahir' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'panjang_badan_lahir' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'phone_ortu' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'umur_bulan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tanggal_kunjungan' => [
                'type' => 'DATE',
            ],
            'berat_badan' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'hasil_timbang_berat_badan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status_gizi_berat_badan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'panjang_badan' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'hasil_timbang_panjang_badan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'lingkar_kepala' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'hasil_ukur_lingkar_kepala' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'lingkar_lengan_atas' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
            ],
            'hasil_lingkar_lengan_atas' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'skrining_tbc_batuk' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'skrining_tbc_demam' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'skrining_tbc_bb' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'skrining_tbc_kontak_erat' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'asi_eksklusif' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'mp_asi' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'imunisasi' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'vitamin_a' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'obat_cacing' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'mp_pangan_lokal' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'gejala_sakit' => [
                'type' => 'ENUM',
                'constraint' => ['Iya', 'Tidak'],
            ],
            'rujuk_pustu_puskesmas' => [
                'type' => 'ENUM',
                'constraint' => ['Pustu', 'Puskesmas'],
            ],
            
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_balita', 'tbl_balita', 'id'); // Assuming there's a 'posyandu' table
        $this->forge->createTable('tbl_pemeriksaan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_pemeriksaan');
    }
}