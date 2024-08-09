<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{

    protected $table      = 'transaksi';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['id_unit', 'idproject','keterangan','status', 'tgl_transaksi','nama_user', 'id_transaksi'];


}
