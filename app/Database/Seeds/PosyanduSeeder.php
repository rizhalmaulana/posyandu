<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PosyanduSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kota' => 1,
                'id_kecamatan' => 1,
                'id_kelurahan' => 101,
                'nama_posyandu' => 'Posyandu RW 11 pos 1',
                'phone_posyandu' => '081232312342',
                'email_posyandu' => 'testingposyandu1@gmail.com',
                'alamat_posyandu' => 'Jl. Cemp. Putih Bar. 11 No.25 Cemp. Putih, RT.10/RW.11, Cemp. Putih Bar., Kec. Cemp. Putih, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10520',
                'status_posyandu' => 'Aktif',
            ],
            [
                'id_kota' => 1,
                'id_kecamatan' => 2,
                'id_kelurahan' => 104,
                'nama_posyandu' => 'Puskesmas Kelurahan Cideng',
                'phone_posyandu' => '081232312322',
                'email_posyandu' => 'testingposyandu2@gmail.com',
                'alamat_posyandu' => 'Jl. Kyai Caringin No.6A, RT.11/RW.4, Cideng, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10150',
                'status_posyandu' => 'Aktif',
            ],
            [
                'id_kota' => 1,
                'id_kecamatan' => 2,
                'id_kelurahan' => 105,
                'nama_posyandu' => 'Puskesmas Kelurahan Kebon Kelapa',
                'phone_posyandu' => '081232312212',
                'email_posyandu' => 'testingposyandu3@gmail.com',
                'alamat_posyandu' => 'Jl. Cemp. Putih Bar. 11 No.25 Cemp. Putih, RT.10/RW.11, Cemp. Putih Bar., Kec. Cemp. Putih, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10520',
                'status_posyandu' => 'Aktif',
            ],
            [
                'id_kota' => 1,
                'id_kecamatan' => 3,
                'id_kelurahan' => 109,
                'nama_posyandu' => 'Posyandu Balita RW 08',
                'phone_posyandu' => '081232311312',
                'email_posyandu' => 'testingposyandu4@gmail.com',
                'alamat_posyandu' => 'Sekretariat RW 08 RT 11, Jalan Tanah Tinggi Sawah, RT.11/RW.8, Tanah Tinggi, Kec. Johar Baru, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10560',
                'status_posyandu' => 'Aktif',
            ],
            [
                'id_kota' => 1,
                'id_kecamatan' => 5,
                'id_kelurahan' => 113,
                'nama_posyandu' => 'Posyandu Melati',
                'phone_posyandu' => '081232122312',
                'email_posyandu' => 'testingposyandu5@gmail.com',
                'alamat_posyandu' => 'Jl. Kali Pasir No.24 8, RT.8/RW.2, Cikini, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10330',
                'status_posyandu' => 'Aktif',
            ],
            // Add more seed data as needed
        ];

        // Insert the data
        $this->db->table('tbl_posyandu')->insertBatch($data);
    }
}
