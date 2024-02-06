<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterPertanyaanModel extends Model
{
    protected $table            = 'tbl_master_pertanyaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'judul_pertanyaan', 'total_pertanyaan', 'status_pertanyaan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getJumlahMasterPertanyaan() {
        return $this->where('status_pertanyaan', 'Aktif')->countAllResults();
    }

    public function getDataPertanyaan() {
        $query = $this->db->table($this->table)
                ->select('tbl_master_pertanyaan.id as id, tbl_master_pertanyaan.judul_pertanyaan as judul_pertanyaan, tbl_master_pertanyaan.total_pertanyaan as total_pertanyaan')
                ->where('status_pertanyaan', 'Aktif')
                ->get();
        
        return $query->getResultArray();
    }

    public function getTotalPertanyaanById($id) {
        $query = $this->where('id', $id)
                ->get();

        return $query->getRow();
    }
}
