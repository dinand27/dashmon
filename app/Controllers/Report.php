<?php 
namespace App\Controllers;
use App\Models\ReportModel;
class Report extends BaseController
{ 

    public function index()
    {
        $db = \Config\Database::connect();
       
        $query= $db->query("SELECT * FROM project");
        $data= $query->getResult();
        $project= array(
            'namaproject' => $data,
        );

        return view ('report/index',$project);
    }

    public function detail($id)
    {   
        $db = \Config\Database::connect();
        $query2= $db->query("SELECT * FROM project");
        $data2= $query2->getResult();


        $query= $db->query("SELECT * FROM report WHERE idproject= $id ");
        $data= $query->getResult();

        $project= array(
            'namaproject' => $data,
            'namaproject2' => $data2,

        );
        return view('report/detail', $project);

    }
}

?>