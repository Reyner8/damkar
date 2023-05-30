<?php

namespace App\Models;

use CodeIgniter\Model;

class ReguModel extends Model
{
    protected $table      = 'regu';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['id', 'nama'];
}
