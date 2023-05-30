<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table      = 'petugas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $allowedFields = ['id', 'idJabatan', 'nama', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'agama', 'nomorHp', 'alamat'];
}
