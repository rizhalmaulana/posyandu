<?php

namespace App\Models;

use CodeIgniter\Model;

class KelurahanModel extends Model
{
    protected $table            = 'tbl_kelurahan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'id_kecamatan', 'nama_kelurahan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataKelurahan($idKecamatan) {
        $query = $this->where('id_kecamatan', $idKecamatan)
                      ->get();

        // Return the result as an array
        return $query->getResultArray();
    }
}
