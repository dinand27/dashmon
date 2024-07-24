<?php 
namespace App\Controllers;
use App\Models\ReportModel;
class Report extends BaseController
{ 

    public function index(){
		$db      = \Config\Database::connect();
		$builder = $db->table('report');
		$builder->orderBy('id','desc');
		$query= $builder->get();
		$data['laporan']= $query->getResultArray();
		echo view('report/laporan',$data);
	}

    public function laporanharian(){
		$report = new ReportModel();
        $date = date('d-m-Y', strtotime('now'));
        // dd($date);
		$data['laporan'] = $report->where('tgl', $date)->findAll();

		echo view('report/laporan_harian',$data);
	}


	public function laporandetail()
	{
		$db      = \Config\Database::connect();
		$builder_project= $db->table('project');
		$project= $builder_project->get();

		$builder = $db->table('report');
		
		$builder->like('status','OPR');
		$opr= $builder->get();
		$builder->like('status','HMSI');
		$hmsi= $builder->get();
		$builder->like('status','SA');
		$sa= $builder->get();
		$builder->like('status','HONG');
		$hong= $builder->get();
		$builder->like('status','STB');
		$stb= $builder->get();
		$builder->like('status','TLO');
		$tlo= $builder->get();
		$builder->like('status','COM');
		$com= $builder->get();
		$builder->like('status','ACD');
		$acd= $builder->get();

		$data['opr']= $opr->getResultArray();
		$data['hmsi']= $hmsi->getResultArray();
		$data['sa']= $sa->getResultArray();
		$data['hong']= $hong->getResultArray();
		$data['stb']= $stb->getResultArray();
		$data['tlo']= $tlo->getResultArray();
		$data['com']= $com->getResultArray();
		$data['acd']= $acd->getResultArray();
		$data['listproject'] =$project->getResultArray();

		echo view('report/laporan_detail',$data);
	}

	public function filter()
	{
		$db      = \Config\Database::connect();
		
        $filter= $this->request->getVar();
        $value=$filter['filter'];
        $query= $db->query("SELECT * FROM report WHERE idproject= '$value' ");
        $data= $query->getResult();

		$query_opr= $db->query("SELECT * FROM report WHERE idproject= '$value' AND status LIKE 'OPR' ");
        $opr= $query_opr->getResult();

		$query_hmsi= $db->query("SELECT * FROM report WHERE idproject= '$value' AND status LIKE 'HMSI' ");
        $hmsi= $query_hmsi->getResult();

		$query_sa= $db->query("SELECT * FROM report WHERE idproject= '$value' AND status LIKE 'SA' ");
        $sa= $query_sa->getResult();

		$query_hong= $db->query("SELECT * FROM report WHERE idproject= '$value' AND status LIKE 'HONG' ");
        $hong= $query_hong->getResult();

		$query_stb= $db->query("SELECT * FROM report WHERE idproject= '$value' AND status LIKE 'STB' ");
        $stb= $query_stb->getResult();

		$query_tlo= $db->query("SELECT * FROM report WHERE idproject= '$value' AND status LIKE 'TLO' ");
        $tlo= $query_tlo->getResult();

		$query_com= $db->query("SELECT * FROM report WHERE idproject= '$value' AND status LIKE 'COM' ");
        $com= $query_com->getResult();

		$query_acd= $db->query("SELECT * FROM report WHERE idproject= '$value' AND status LIKE 'ACD' ");
        $acd= $query_acd->getResult();
		
		$proj= $db->query("SELECT * FROM project ");
        $project= $proj->getResult();


        $row= array(
            'data' => $data,
			'opr'=> $opr,
			'hmsi' => $hmsi,
			'sa' => $sa,
			'hong' => $hong,
			'stb' => $stb,
			'tlo' => $tlo,
			'com' => $com,
			'acd' => $acd,
			'listproject' =>$project,
        );

		

		return view('report/laporan_filter', $row);

	}


    public function simpanExcel()
		{
			$file_excel = $this->request->getFile('fileexcel');
			$ext = $file_excel->getClientExtension();
			if($ext == 'xls') {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $render->load($file_excel);
	
			$data = $spreadsheet->getActiveSheet()->toArray();
			foreach($data as $x => $row) {
				if ($x == 0) {
					continue;
				}
				
				$id = $row[0];
				$idproject = $row[1];
				$tgl = $row[2];
                $id_unit = $row[3];
                $keterangan = $row[4];
                $status = $row[5];

	
				$db = \Config\Database::connect();

				$cekid = $db->table('report')->getWhere(['id'=>$id])->getResult();

				if(count($cekid) > 0) {
					session()->setFlashdata('message','<b style="color:red">Data Gagal di Import, Duplikat ID</b>');
				} else {
	
			$newDate = date("d-m-Y", strtotime($tgl));
				$simpandata = [
                    'id'=> $id,
					'idproject' => $idproject, 
					'tgl'=> $newDate,
                    'id_unit' => $id_unit,
                    'keterangan ' => $keterangan,
                    'status' => $status,
				];
	
				$db->table('report')->insert($simpandata);
				session()->setFlashdata('message','Berhasil import excel'); 
			}
		}
			
			return redirect()->to(base_url('report'));
		}


		
		public function init_data()
		{
			$db = \Config\Database::connect();
		   
			$db->query("TRUNCATE TABLE report");
			return redirect()->to(base_url('/report'));
		}





    



}