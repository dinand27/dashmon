<?php

namespace App\Controllers;
use App\Models\EquipmentModel;

class Equipment extends BaseController
{
    // protected $modelUnit;
    // protected $table;
    
    // public function __construct()
    // {

    //     $this->modelUnit= new EquipmentModel();
    // }


    public function index()
    {

        // $getData = $this->modelUnit->getData();
        // $data= array(
        //     'title' => 'All Data Equipment',
        //     'dataUnit' => $getData,
        // );
        $equipmodel = new EquipmentModel();
        $getAlldata = $equipmodel->findAll();
        $data = array(
            'dataUnit' => $getAlldata,
            'title' => 'Alldata',
        );
        session()->setFlashdata('msg','LOGIN Sukses');
        return view('equipment/index', $data);
    }

    public function create_data()
    {
        $data = array(
            'title' => 'Create Data'
        );
        return view('equipment/create_data', $data);

    }


    public function storing()
    {
        $equipmodel = new EquipmentModel();
        $equipmodel->insert($this->request->getPost());
        return redirect()->to(base_url('chart'));

    }


    public function formEditData($id)
    {
        $equipmodel = new EquipmentModel();
        $data_id = $equipmodel->find($id);
        $data= array(
            'detail' => $data_id,
            'title' => 'Edit Data Equipment'
        );

        return view('equipment/detail', $data);
    }

    public function prosesdata()
    {
        $equipmodel = new EquipmentModel();
        $equipmodel->update($this->request->getPost('id_unit'), $this->request->getPost());
        return redirect()->to(base_url('equipment'));

    }

    public function hapusdata($id=false)
    {
        $equipmodel = new EquipmentModel();
        $equipmodel->delete($id);
        return redirect()->to(base_url('equipment'));
    }

    
    public function data_dashboard()
    {

        $db = \Config\Database::connect();
        $query= $db->query("SELECT * FROM equipment WHERE id_project = 1");
        $data= $query->getResultArray();

        $query2= $db->query("SELECT * FROM equipment WHERE id_project = 2");
        $data2= $query2->getResultArray();

        $query3= $db->query("SELECT * FROM equipment WHERE id_project = 3");
        $data3= $query3->getResultArray();

        $query4= $db->query("SELECT * FROM equipment WHERE id_project = 4");
        $data4= $query4->getResultArray();


        $row= array(
            'title' => 'Tampil data Dashboard',
            'kkbm' =>$data,
            'kbdm' => $data2,
            'rbdm' => $data3,
            'rkbm' => $data4,

        );        
        return view('tampildata',$row);
    }

    public function jum_data_status()
    {
        $db = \Config\Database::connect();
       
        $query= $db->query("SELECT * FROM equipment WHERE id_project = 1");
        $data= $query->getResultArray();

        $query2= $db->query("SELECT * FROM equipment WHERE id_project = 2");
        $data2= $query2->getResultArray();

        $query3= $db->query("SELECT * FROM equipment WHERE id_project = 3");
        $data3= $query3->getResultArray();

        $query4= $db->query("SELECT * FROM equipment WHERE id_project = 4");
        $data4= $query4->getResultArray();

        $query4= $db->query("SELECT * FROM equipment WHERE id_project = 4");
        $data4= $query4->getResultArray();

        $query_accident = $db->query("SELECT * FROM equipment WHERE STATUS = 'Accident' AND id_project=1;");
        $data_accident= $query_accident->getResultArray();
        $query_breakdown = $db->query("SELECT * FROM equipment WHERE STATUS = 'Breakdown' AND id_project=1;");
        $data_breakdown= $query_breakdown->getResultArray();
        $query_standby = $db->query("SELECT * FROM equipment WHERE STATUS = 'Standby' AND id_project=1;");
        $data_standby= $query_standby->getResultArray();
        $query_ready = $db->query("SELECT * FROM equipment WHERE STATUS = 'Operation' AND id_project=1;");
        $data_ready= $query_ready->getResultArray();

        $query_accident2 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Accident' AND id_project=2;");
        $data_accident2= $query_accident2->getResultArray();
        $query_breakdown2 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Breakdown' AND id_project=2;");
        $data_breakdown2= $query_breakdown2->getResultArray();
        $query_standby2 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Standby' AND id_project=2;");
        $data_standby2= $query_standby2->getResultArray();
        $query_ready2 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Operation' AND id_project=2;");
        $data_ready2= $query_ready2->getResultArray();

        $query_accident3 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Accident' AND id_project=3;");
        $data_accident3= $query_accident3->getResultArray();
        $query_breakdown3 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Breakdown' AND id_project=3;");
        $data_breakdown3= $query_breakdown3->getResultArray();
        $query_standby3 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Standby' AND id_project=3;");
        $data_standby3= $query_standby3->getResultArray();
        $query_ready3 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Operation' AND id_project=3;");
        $data_ready3= $query_ready3->getResultArray();

        $query_accident4 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Accident' AND id_project=4;");
        $data_accident4= $query_accident4->getResultArray();
        $query_breakdown4 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Breakdown' AND id_project=4;");
        $data_breakdown4= $query_breakdown4->getResultArray();
        $query_standby4 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Standby' AND id_project=4;");
        $data_standby4= $query_standby4->getResultArray();
        $query_ready4 = $db->query("SELECT * FROM equipment WHERE STATUS = 'Operation' AND id_project=4;");
        $data_ready4= $query_ready4->getResultArray();


        // $query6= $db->query("SELECT status, COUNT(*) as total_data from equipment where id_project=4 GROUP BY status");
        // $data6= $query6->getResultArray();
        // $query7= $db->query("SELECT status, COUNT(*) as total_data from equipment where id_project=3 GROUP BY status");
        // $data7= $query7->getResultArray();
        // $query8= $db->query("SELECT status, COUNT(*) as total_data from equipment where id_project=3 GROUP BY status");
        // $data8= $query8->getResultArray();

        // echo count($data6);

        $row= array(
            'title' => 'Tampil data Dashboard',
            'kkbm' =>$data,
            'kbdm' => $data2,
            'rbdm' => $data3,
            'rkbm' => $data4,
            'data_accident' => $data_accident,
            'data_breakdown'=> $data_breakdown,
            'data_standby' => $data_standby,
            'data_ready' => $data_ready,

            'data_accident2' => $data_accident2,
            'data_breakdown2'=> $data_breakdown2,
            'data_standby2' => $data_standby2,
            'data_ready2' => $data_ready2,

            'data_accident3' => $data_accident3,
            'data_breakdown3'=> $data_breakdown3,
            'data_standby3' => $data_standby3,
            'data_ready3' => $data_ready3,

            'data_accident4' => $data_accident4,
            'data_breakdown4'=> $data_breakdown4,
            'data_standby4' => $data_standby4,
            'data_ready4' => $data_ready4,

        );        
        return view('chart', $row);

    }

    public function formEditchart($id)
    {
        $equipmodel = new EquipmentModel();
        $data_id = $equipmodel->find($id);
        $data= array(
            'detail' => $data_id,
            'title' => 'Edit Data Equipment'
        );


        return view('chartedit', $data);
    }

    public function prosesdatachart()
    {
        $equipmodel = new EquipmentModel();
        $equipmodel->update($this->request->getPost('id_unit'), $this->request->getPost());
        return redirect()->to(base_url('/'));

    }

    public function hapusdatachart($id=false)
    {
        $equipmodel = new EquipmentModel();
        $equipmodel->delete($id);
        return redirect()->to(base_url('/'));
    }

    public function init_data()
    {
        $db = \Config\Database::connect();
       
        $db->query("UPDATE equipment SET waktu='00.00' ");
        return redirect()->to(base_url('/equipment'));
    }
    

}

?>