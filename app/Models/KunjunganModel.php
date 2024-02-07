<?php

namespace App\Models;

use CodeIgniter\Model;

class KunjunganModel extends Model
{
    protected $table            = 'tbl_kunjungan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'id_balita', 'tgl_kunjungan', 'bulan_kunjungan', 'tahun_kunjungan', 'status_kunjungan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataKunjunganBalita($id = "") {
        $query = $this->db->table($this->table)
                ->select('tbl_kunjungan.id as id, tbl_kunjungan.tgl_kunjungan as tgl_kunjungan, tbl_kunjungan.bulan_kunjungan as bulan_kunjungan, tbl_kunjungan.tahun_kunjungan as tahun_kunjungan, 
                tbl_kunjungan.status_kunjungan as status_kunjungan')
                ->where('id_balita', $id)
                ->get();
        
        $query->getResultArray();
    }

    public function getTotalDataKunjunganByMonth() {
        date_default_timezone_set('Asia/Jakarta');
        $month_now = date('MMMM');

        return $this->db->table($this->table)
                ->where('bulan_kunjungan', $month_now)
                ->countAllResults();
    }

    public function getRiwayatPerTahun($year) {
        $result = $this->db->table($this->table)
            ->select('MONTH(tgl_kunjungan) as month, COUNT(id_balita) as total_visits')
            ->where('YEAR(tgl_kunjungan)', $year)
            ->groupBy('MONTH(tgl_kunjungan)')
            ->get();
        // Use the $result array as needed
        return $result->getResultArray();
    }

}
