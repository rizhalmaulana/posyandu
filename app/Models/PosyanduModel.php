<?php

namespace App\Models;

use CodeIgniter\Model;

class PosyanduModel extends Model
{
    protected $table1 = 'tbl_kota';
    protected $table2 = 'tbl_kecamatan';
    protected $table3 = 'tbl_kelurahan';

    protected $table            = 'tbl_posyandu';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'id_kota', 'id_kecamatan', 'id_kelurahan', 'nama_posyandu', 'alamat_posyandu', 'status_posyandu'];
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    public function getDataPosyandu($idKota, $idKecamatan, $idKelurahan) {
        $query = $this->where('id_kota', $idKota)
                ->where('id_kecamatan', $idKecamatan)
                ->where('id_kelurahan', $idKelurahan)
                ->get();

        // Return the result as an array
        return $query->getResultArray();
    }

    public function getDataPosyanduById($idPosyandu) {
        $query = $this->where('id', $idPosyandu)
                ->get();

        return $query->getRow();
    }

    public function getDataKotaJoinPosyandu($idPosyandu) {
        $query = $this->db->table($this->table)
                ->select('tbl_posyandu.id as id, tbl_posyandu.nama_posyandu as nama_posyandu, tbl_posyandu.alamat_posyandu as alaamt, tbl_posyandu.id_kota as id_kota, 
                tbl_posyandu.id_kecamatan as id_kecamatan, tbl_posyandu.id_kelurahan as id_kelurahan, 
                tbl_kota.nama_kota as nama_kota, tbl_kecamatan.nama_kecamatan as nama_kecamatan, tbl_kelurahan.nama_kelurahan as nama_kelurahan')
                ->join($this->table1, "{$this->table}.id_kota = {$this->table1}.id")
                ->join($this->table2, "{$this->table}.id_kecamatan = {$this->table2}.id")
                ->join($this->table3, "{$this->table}.id_kelurahan = {$this->table3}.id")
                ->where("{$this->table}.id", $idPosyandu)
                ->get();

        return $query->getRow();
    }
}