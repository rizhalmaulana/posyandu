<?php

namespace App\Models;

use CodeIgniter\Model;

class RekapPemeriksaanModel extends Model
{
    protected $table            = 'rekappemeriksaans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
