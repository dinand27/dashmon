<?php namespace App\Models;
use CodeIgniter\Model;
class OperatorModel extends Model
{
	protected $table = 'driver';
	protected $primaryKey = 'id';
	protected $allowedFields =['namadriver','nik','notelp' ];
}