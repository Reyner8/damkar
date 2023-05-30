<?php

namespace App\Models;

use CodeIgniter\Model;

class KejadianModel extends Model
{
    protected $table      = 'kejadian';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['id', 'idKelurahan', 'alamat', 'latitude', 'longitude', 'penyebab', 'tanggal', 'jamLapor', 'jamTanggap'];
}
