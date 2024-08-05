<?php 
namespace App\Controllers;
use App\Models\ReportModel;



class Testing extends BaseController
{
    public function index()
    {
        $reportModel = new ReportModel();
        $data['report'] = $reportModel->findAll();
        return view('testing/index', $data);
    }

    public function cari()
    {
        $hasil= $this->request->getVar();
        $value=$hasil['cari'];  
        // cariiiiiiiiiiiiiiiiiiiii

        $db      = \Config\Database::connect();
        $builder = $db->table('report');
        $query= $builder->like('id_unit', $value);
        $query= $builder->orLike('keterangan', $value);
        $query = $builder->get();
        $data= $query->getResult();
        $row= array(
            'data' => $data,
            'value' =>$value,
        );
        
        return view('testing/hasil',$row);
    }

    public function nestedloop()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('report');
        $data['report']= $builder->get()->getResult();
        $report= $db->table('project');
        $data['project']= $report->get()->getResult();
        // dd($data); 
        return view('testing/nestedloop',$data);   


    }

    public function edit($id)
    {
        $reportModel = new ReportModel();
        $data['detail'] = $reportModel->find($id);
        // session set
        $session = \Config\Services::session();
        $session->set('id',$data['detail']['id'] );
        $session->set('idproject',$data['detail']['idproject'] );
        $session->set('unit',$data['detail']['id_unit'] );
        echo 'Session terbentuk';
        // return view('testing/detail');
    }

    public function session()
    {  
        $reportModel = new ReportModel();
        $data['report'] = $reportModel->findAll();
        return view('testing/index', $data);

    }

}