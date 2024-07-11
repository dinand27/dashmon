<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table      = 'project';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['nm_project', 'description'];

  
    // public function ambil_data_project($keyword=null){
    //     // $db = \Config\Database::connect(); 
	// 	// $this->$db->select('*');
	// 	// $this->$db->from('project');
	// 	// if(!empty($keyword)){
	// 	// 	$this->$db->where('id',$keyword);
	// 	// }
	// 	return $this->$db->get()->result_array();
	// }


}
