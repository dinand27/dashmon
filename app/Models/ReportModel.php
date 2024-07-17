<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{

    protected $table      = 'report';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['idproject', 'tgl','id_unit','keterangan', 'status'];


}
