<?php

namespace App\Models;

use CodeIgniter\Model;

class BalitaModel extends Model
{
    protected $table2 = 'tbl_posyandu';
    protected $table3 = 'tbl_kunjungan';

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

    public function getKunjunganBalita() {
        setlocale(LC_TIME, 'id_ID.utf8'); // Set the locale to Indonesian
        $currentMonthName = strftime('%B');

        $query = $this->db->table($this->table)
                ->select('tbl_balita.id as id, tbl_balita.id_posyandu as id_posyandu, tbl_balita.nik as nik, tbl_balita.nomor_kk as nomor_kk, tbl_balita.nama_lengkap as nama_lengkap, 
                tbl_balita.jenis_kelamin as jenis_kelamin, tbl_balita.tanggal_lahir as tanggal_lahir, tbl_balita.nama_ibu as nama_ibu, tbl_balita.nama_ayah as nama_ayah, tbl_balita.status_balita as status_balita,
                tbl_kunjungan.tgl_kunjungan as tgl_kunjungan, tbl_kunjungan.bulan_kunjungan as bulan_kunjungan, tbl_kunjungan.tahun_kunjungan as tahun_kunjungan, 
                tbl_kunjungan.status_kunjungan as status_kunjungan,')
                ->join($this->table3, "{$this->table}.id = {$this->table3}.id_balita")
                ->where('bulan_kunjungan', $currentMonthName)
                ->get();

        return $query->getResultArray();
    }

    public function getCountBalitaByIdPosyandu($idPosyandu) {
        return $this->where('id_posyandu', $idPosyandu)
            ->countAllResults();
    }

    public function getTotalDataBalitaPerMonthOfYear($year) {
        // Initialize the result array
        $result = [];

        // Query data for the specified year
        $query = $this->db->query("
            SELECT
                MONTH(created_at) AS month,
                COUNT(*) AS total_children
            FROM
                $this->table
            WHERE
                YEAR(created_at) = ?
            GROUP BY
                MONTH(created_at)
            ORDER BY
                MONTH(created_at)
        ", [$year]);

        // Format the result
        foreach ($query->getResult() as $row) {
            $month = intval($row->month);
            $totalChildren = intval($row->total_children);
            $result[$month] = $totalChildren;
        }

        // Fill in missing months with zero children
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($result[$i])) {
                $result[$i] = 0;
            }
        }

        // Sort the result array by month
        ksort($result);

        return $result;
    }

    public function getDataBalitaAndPosyandu($idPosyandu) {
        $query = $this->db->table($this->table2)
            ->join($this->table, "{$this->table2}.id = {$this->table}.id_posyandu")
            ->where("{$this->table}.id_posyandu", $idPosyandu)
            ->orderBy("{$this->table}.id", 'ASC')
            ->get();

        return $query->getResult();
    }
}
