<?php

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model
{
    protected $table            = 'tbl_kecamatan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'id_kota', 'nama_kecamatan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataKecamatan($idKota) {
        $query = $this->where('id_kota', $idKota)
                      ->get();

        // Return the result as an array
        return $query->getResultArray();
    }
}
