<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'tbl_admin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id','id_posyandu', 'id_kota', 'id_kecamatan', 'id_kelurahan', 'username', 'nama_lengkap', 'jenis_kelamin', 'tanggal_lahir', 'verified', 'phone_admin', 'email_admin', 'alamat', 'password', 'status', 'admin_selfie'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
