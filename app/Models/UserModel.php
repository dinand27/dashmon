<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model
{
    // protected $table = "user";
    // protected $primaryKey = "id";
    // protected $returnType = "object";
    // protected $useTimestamps = true;
    // protected $allowedFields = ['id','username', 'passw', 'namalengkap'];

    public function get_data($username, $password)
    {
        return $this->db->table('user')
        ->where(array('username' => $username, 'passw' => $password) )
        ->get()->getRowArray();
    }

    function cek_login($table,$where){		
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $query = $builder->getWhere($where, $table);
	}	
    
}

?>