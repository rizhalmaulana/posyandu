<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanPerkembanganModel extends Model
{
    protected $table1           = 'tbl_pertanyaan_perkembangan';

    protected $table            = 'tbl_jawaban_perkembangan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'id_balita', 'id_pertanyaan', 'id_master_pertanyaan', 'jawaban'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getJawabanByIdMasterPertanyaan($id_balita, $id_master_pertanyaan) {
        $query = $this->db->table($this->table)
                ->selectCount('jawaban')
                ->where('jawaban', '1')
                ->where('id_balita', $id_balita)
                ->where('id_master_pertanyaan', $id_master_pertanyaan)
                ->get();

        return $query->getRow();
    }

    public function getAllJawaban($id_balita) {
        $query = $this->db->table($this->table)
                ->select('tbl_jawaban_perkembangan.id_pertanyaan as id_pertanyaan, tbl_jawaban_perkembangan.jawaban as jawaban, 
                tbl_pertanyaan_perkembangan.pertanyaan as pertanyaan, tbl_pertanyaan_perkembangan.range_usia as range_usia')
                ->join($this->table1, "{$this->table}.id_pertanyaan = {$this->table1}.id")
                ->where("{$this->table}.id_balita", $id_balita)
                ->groupBy('tbl_jawaban_perkembangan.id_pertanyaan, tbl_jawaban_perkembangan.jawaban, tbl_pertanyaan_perkembangan.pertanyaan, tbl_pertanyaan_perkembangan.range_usia')
                ->where("{$this->table}.id_balita", $id_balita)
                ->get();

        return $query->getResultArray();
    }
}
