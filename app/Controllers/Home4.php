<?php

namespace App\Controllers;
// use App\Models\EquipmentModel;
use App\Models\HomeModel;

class Home4 extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $query= $db->query('SELECT * FROM project_rfid WHERE status=1 ');
        // $query_chart= $db->query('SELECT report.tgl AS tanggal, report.id_unit AS unit, report.status AS STATUS, project.nm_project AS project 
        // FROM report INNER JOIN project ON project.id = report.idproject ');

        // $query_status= $db->query('SELECT report.tgl AS tanggal, report.id_unit AS unit, report.status AS STATUS, project.nm_project AS project 
        // FROM report INNER JOIN project ON project.id = report.idproject group by project ');
        $data['project']= $query->getResultArray();
        // $data['report'] = $query_chart->getResult();
        // $data['status'] = $query_status->getResultArray();
        return view('home_4', $data);
    }

    public function homefilter()
    {
        $db = \Config\Database::connect();
        $filter= $this->request->getVar();
        $value=$filter['filter'];
        $query= $db->query("SELECT * FROM report WHERE idproject= '$value' ");
        $data= $query->getResult();
        return view('home2_view');
    }


    public function tampil_project()
    {
        $db = \Config\Database::connect();

        $query= $db->query('SELECT * FROM project');
        $result= $query->getResult();
        // $query2= $db->query('SELECT * FROM project where id=$param ');
        // $result2= $query->getResult();


        $row= array(
            'project'=> $result,
            // 'filter' => $result2,
        );
        // $queryfilter= $db->query(('SELECT * from project where id= $keyword '));

        return view('tampil_project',$row);

    }

    public function tampil_project_detail($id)
    {
        $db = \Config\Database::connect();
        $query= $db->query('SELECT * FROM project WHERE id= $id');
        $result= $query->getResult();
        // $query2= $db->query('SELECT * FROM project where id=$param ');
        // $result2= $query->getResult();


        $row= array(
            'project'=> $result,
            // 'filter' => $result2,
        );
        print_r($this->request->getVar());

        // return view('tampil_project_detail');
    }
 
    public function tampilAll()
    {
        $db = \Config\Database::connect();
       
        $query= $db->query("SELECT * FROM equipment");
        $data= $query->getResult();
        $row= array(
            'data'=>$data,

        );
        return view('tampilsemua',$row);

    }

    public function tampil_id()
    {
        $db = \Config\Database::connect();

        $status= $this->request->getVar();
        $value=$status['status'];         
        $query= $db->query("SELECT * FROM equipment WHERE status= '$value' ");
        $data= $query->getResult();
        $row= array(
            'data' => $data,
        );
        return view('tampil_id', $row);

    }



    
    
}
