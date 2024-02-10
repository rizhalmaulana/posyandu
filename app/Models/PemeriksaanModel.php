<?php

namespace App\Models;

use CodeIgniter\Model;

class PemeriksaanModel extends Model
{
    protected $table            = 'tbl_pemeriksaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'id_balita', 'id_posyandu', 'berat_badan_lahir', 'panjang_badan_lahir', 'umur_bulan', 'tanggal_kunjungan', 'berat_badan', 'hasil_timbang_berat_badan', 'status_gizi_berat_badan', 'panjang_badan', 'hasil_timbang_panjang_badan', 'lingkar_kepala', 'hasil_ukur_lingkar_kepala', 'lingkar_lengan_atas', 'hasil_lingkar_lengan_atas', 'skrining_tbc_batuk', 'skrining_tbc_demam', 'skrining_tbc_bb', 'skrining_tbc_kontak_erat', 'status_skrining', 'asi_eksklusif', 'mp_asi', 'imunisasi', 'vitamin_a', 'obat_cacing', 'mp_pangan_lokal', 'gejala_sakit', 'rujuk_pustu_puskesmas'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
