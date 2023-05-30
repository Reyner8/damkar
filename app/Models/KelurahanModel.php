<?php

namespace App\Models;

use CodeIgniter\Model;

class KelurahanModel extends Model
{
    protected $table      = 'kelurahan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['id', 'idKecamatan', 'nama'];
}
