<?php 
namespace App\Controllers;


class Testing extends BaseController
{
    public function index()
    {
        return view('testing/index');
    }

    public function cari()
    {
        $db = \Config\Database::connect();
        $cari= $this->request->getVar();

        $builder = $db->table('report');
		$builder->where('id', $cari);
		$query= $builder->get();
		$data['row']= $query->getResult();    
        
        return view('testing/hasil',$data);
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

}