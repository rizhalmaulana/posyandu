<?php

namespace App\Models;

use CodeIgniter\Model;

class ImunisasiModel extends Model
{
    protected $table            = 'tbl_imunisasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'id_pemeriksaan', 'id_balita', 'id_posyandu', 'vaksin_hepatitis_b', 'vaksin_bcg', 'vaksin_polio_tetes_1', 'vaksin_dpt_hb_1', 'vaksin_polio_tetes_2', 'vaksin_rota_virus_1', 'vaksin_pcv_1', 'vaksin_dpt_hb_2', 'vaksin_polio_tetes_3', 'vaksin_rota_virus_2', 'vaksin_pcv_2', 'vaksin_dpt_hb_3', 'vaksin_polio_tetes_4', 'vaksin_polio_suntik_1', 'vaksin_rota_virus_3', 'vaksin_campak_rubella', 'vaksin_polio_suntik_2', 'vaksin_pcv_3', 'vaksin_dpt_hb_lanjutan', 'vaksin_campak_rubella_lanjutan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
