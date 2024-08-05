<?php

namespace App\Models;

use CodeIgniter\Model;

class Session extends Model
{

    protected $table      = 'equipment';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['nolambung', 'status','waktu','driver', 'id_project'];


}
