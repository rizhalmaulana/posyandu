<?php

namespace App\Models;

use CodeIgniter\Model;

class BalitaModel extends Model
{
    protected $table1 = 'tbl_balita';
    protected $table2 = 'tbl_posyandu';

    protected $table            = 'tbl_balita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'id_posyandu', 'nik', 'nomor_kk', 'nama_lengkap', 'jenis_kelamin', 'tanggal_lahir', 'nama_ibu', 'nama_ayah', 'status_balita', 'alamat'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getBalitaByIdPosyandu($idPosyandu) {
        $query = $this->where('id_posyandu', $idPosyandu)
                ->get();

        return $query->getResultArray();
    }

    public function getBalitaByIdBalita($idBalita) {
        $query = $this->where('id', $idBalita)
                ->get();

        return $query->getRow();
    }


    public function getCountBalitaByIdPosyandu($idPosyandu) {
        return $this->where('id_posyandu', $idPosyandu)
        ->countAllResults();
    }

    public function getDataBalitaAndPosyandu($idPosyandu) {
        $query = $this->db->table($this->table2)
            ->join($this->table1, "{$this->table2}.id = {$this->table1}.id_posyandu")
            ->where("{$this->table1}.id_posyandu", $idPosyandu)
            ->orderBy("{$this->table1}.id", 'ASC')
            ->get();

        return $query->getResult();
    }
}
