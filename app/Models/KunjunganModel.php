<?php

namespace App\Models;

use CodeIgniter\Model;

class KunjunganModel extends Model
{
    protected $table1           = 'tbl_balita';

    protected $table            = 'tbl_kunjungan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id', 'id_balita', 'tgl_kunjungan', 'bulan_kunjungan', 'tahun_kunjungan', 'status_kunjungan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataKunjunganBalita($idBalita = "") {
        $query = $this->db->table($this->table)
                ->where('id_balita', $idBalita)
                ->get();
        
        $query->getResult();
    }

    public function getTotalDataKunjunganByMonth() {
        setlocale(LC_TIME, 'id_ID.utf8'); // Set the locale to Indonesian
        $currentMonthName = strftime('%B');

        return $this->db->table($this->table)
                ->where('bulan_kunjungan', $currentMonthName)
                ->countAllResults();
    }

    public function getTotalKunjunganPerMonthOfYear($year) {
        // Initialize the result array
        $result = [];

        // Query data for the specified year
        $query = $this->db->query("
            SELECT
                MONTH(tgl_kunjungan) AS month,
                COUNT(*) AS total_visits
            FROM
                $this->table
            WHERE
                tahun_kunjungan = ?
            GROUP BY
                MONTH(tgl_kunjungan)
            ORDER BY
                MONTH(tgl_kunjungan)
        ", [$year]);

        // Format the result
        foreach ($query->getResult() as $row) {
            $month = intval($row->month);
            $totalVisits = intval($row->total_visits);
            $result[$month] = $totalVisits;
        }

        // Fill in missing months with zero visits
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($result[$i])) {
                $result[$i] = 0;
            }
        }

        // Sort the result array by month
        ksort($result);

        return $result;
    }

    public function getRiwayatKunjunganBalita($idBalita = "") {
        $query = $this->db->table($this->table)
                ->select('tbl_kunjungan.id as id, tbl_kunjungan.tgl_kunjungan as tanggal_kunjungan, tbl_kunjungan.status_kunjungan as status_kunjungan,
                tbl_balita.nama_lengkap as nama_balita')
                ->join($this->table1, "{$this->table}.id_balita = {$this->table1}.id")
                ->where("{$this->table}.id_balita", $idBalita)
                ->get();

        return $query->getResultArray();
    }

}
