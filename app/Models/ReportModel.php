<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{

    protected $table      = 'report';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'idproject', 'tgl','id_unit','keterangan', 'status'];

    
    function search($keyword)
    {
        return $this->table('report')->like('status',$keyword);
  
    }

}
