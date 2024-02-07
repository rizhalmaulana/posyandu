<?php

namespace App\Models;

use CodeIgniter\Model;

class PertanyaanPerkembanganModel extends Model
{
    protected $table            = 'tbl_pertanyaan_perkembangan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'id_master_pertanyaan', 'pertanyaan', 'range_usia'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPertanyaanByRangeUsia($fieldValuePairs) {
        $query = $this->db->table($this->table);

        foreach ($fieldValuePairs as $pair) {
            $query->orWhere($pair['field'], $pair['value']);
        }

        return $query->get()->getResultArray();
    }
}
