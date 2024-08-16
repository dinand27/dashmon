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
		$databes= $builder->get();
		$builder->like('status','OPR');
		$opr= $builder->get();
		$builder->like('status','HMSI');
		$builder->like('status','SA');
		$builder->like('status','HONG');
		$breakdown= $builder->get();
		$builder->like('status','STB');
		$stb= $builder->get();
		$builder->like('status','TLO');
		$tlo= $builder->get();
		$builder->like('status','COM');
		$com= $builder->get();
		$builder->like('status','ACD');
		$acd= $builder->get();
		// -----bats kueri REPORT


		$data['opr']= $opr->getResultArray();
		$data['breakdown']= $breakdown->getResultArray();
		$data['stb']= $stb->getResultArray();
		$data['tlo']= $tlo->getResultArray();
		$data['com']= $com->getResultArray();
		$data['acd']= $acd->getResultArray();
		$data['listproject'] =$project->getResultArray();
		$data['databes']= $databes->getResultArray();
		// batas kueri Project
		$db = db_connect();
		$queri= $db->query(" SELECT* FROM report INNER JOIN report_dt ON report.id_unit LIKE '%'+report_dt.nomor+'%' ");
		$data['data_dt']= $queri->getResultArray();

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

		$query_breakdown= $db->query("SELECT * FROM report WHERE idproject= '$value' AND (status LIKE 'HMSI' OR status like 'SA'
		OR status like 'HONG') 
		
		");
        $breakdown= $query_breakdown->getResult();

		$query_stb= $db->query("SELECT * FROM report WHERE idproject= '$value' AND (status LIKE 'STB' OR status LIKE 'TLO' OR status LIKE 'COM') ");
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
			'breakdown' => $breakdown,
			'stb' => $stb,
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

				$savereport = [
					'tanggal' => date('Y-m-d'),
                    'idreport'=> date('ymd'),
					'idproject' => $idproject, 
					'tgl'=> $newDate,
                    'idunit' => $id_unit,
                    'keterangan ' => $keterangan,
                    'status' => $status,
				];
	
				$db->table('report')->insert($simpandata);
				$db->table('laporan')->insert($savereport);
				session()->setFlashdata('message','Berhasil import excel'); 
			}
		}
			
			return redirect()->to(base_url('report'));
		}


		
		public function init_data()
		{
			$db = \Config\Database::connect();
			$db->query("TRUNCATE TABLE report");

			
			return view('report/laporan_import');
		}
				
		public function init_data_rfid()
		{
			$db = \Config\Database::connect();
			$db->query("TRUNCATE TABLE report_rfid");

			
			return view('report/laporan_import_rfid');
		}

		public function init_data_dt()
		{
			$db = \Config\Database::connect();
			$db->query("TRUNCATE TABLE report_dt");

			
			return view('report/laporan_import_dt');
		}

		public function get_datajson()
		{
			// $url= 'https://script.googleusercontent.com/macros/echo?user_content_key=NnI2d9gOhW3_nqHWu0atEL1Avl3aSV0VFBb5QB33MIvmKmxeL0tH9UT4inQr5Latj-f-BGwr9drzFpUkWnnh7V2z8IHnyXV5m5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnFg3m0xI19rReabDXUY9OrZ26mFBDeZYs3IlFe4IfWGarKd8tvAjP9SSjKQWOyvQocyF2np5e7IQHwhzhM5BofuvwI05XIJDYw&lib=MMk8yv13cfUoo7y-0OMoxFzUvRdERJ6Za';
			$url = "https://dummy.restapiexample.com/api/v1/employees";
			$getURL = file_get_contents($url);
			$data= json_decode($getURL);
			$dataArray= array(
				'datalist' =>$data,
			);
			// dd($data);
			return view('report/json', $dataArray);
		}
		// untuk menyimpan otomatis hasil import an
		public function rekap_laporan()
		{
			$db      = \Config\Database::connect();
			$builder = $db->table('laporan');
			$builder->orderBy('id','desc');
			$query= $builder->get();
			$data['rekapan']= $query->getResultArray();
			echo view('report/rekapan',$data);
		}
  
		// bagian RFID
		public function index_rfid(){
			$db      = \Config\Database::connect();
			$builder = $db->table('report_rfid');
			$builder->orderBy('id','desc');
			$query= $builder->get();
			$data['laporan']= $query->getResultArray();
			echo view('report/laporan_rfid',$data);
		}

		public function simpanExcelRfid()
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
				$project = $row[1];
				$eq_name = $row[2];
                $unit = $row[3];
				$jam_keluar = $row[4];
				$jam_masuk = $row[5];
				$driver = $row[6];
				$jam_finger = $row[7];
				$eq_status = $row[8];
				$dt_status = $row[9];
				$driver_status = $row[10];

	
				$db = \Config\Database::connect();

				$cekid = $db->table('report_rfid')->getWhere(['id'=>$id])->getResult();

				if(count($cekid) > 0) {
					session()->setFlashdata('message','<b style="color:red">Data Gagal di Import, Duplikat ID</b>');
				} else {
	
				$simpandata = [
                    'id'=> $id,
					'project' => $project, 
					'eq_name'=> $eq_name,
                    'unit' => $unit,
					'jam_keluar' => $jam_keluar,
					'jam_masuk' => $jam_masuk,
					'driver' => $driver,
					'jam_finger' => $jam_finger,
					'eq_status' => $eq_status,
					'dt_status' => $dt_status,
					'driver_status' => $driver_status,
					// 'user' =>$user,
				];

				// $savereport = [
				// 	'tanggal' => date('Y-m-d'),
                //     'idreport'=> date('ymd'),
				// 	'idproject' => $idproject, 
				// 	'tgl'=> $newDate,
                //     'idunit' => $id_unit,
                //     'keterangan ' => $keterangan,
                //     'status' => $status,
				// ];
	
				$db->table('report_rfid')->insert($simpandata);
				// $db->table('laporan')->insert($savereport);
				session()->setFlashdata('message','Berhasil import excel'); 
			}
		}
			
			return redirect()->to(base_url('report_rfid'));
		}


				// bagian RFID
				public function index_dt(){
					$db      = \Config\Database::connect();
					$builder = $db->table('report_dt');
					$builder->orderBy('id','desc');
					$query= $builder->get();
					$data['laporan']= $query->getResultArray();
					echo view('report/laporan_dt',$data);
				}
		
				public function simpanExcelDT()
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
						$nomor = $row[1];
						$nolambung = $row[2];
						$merk = $row[3];
						$company = $row[4];
		
			
						$db = \Config\Database::connect();
		
						$cekid = $db->table('report_dt')->getWhere(['id'=>$id])->getResult();
		
						if(count($cekid) > 0) {
							session()->setFlashdata('message','<b style="color:red">Data Gagal di Import, Duplikat ID</b>');
						} else {
			
						$simpandata = [
							'id'=> $id,
							'nomor' => $nomor, 
							'nolambung'=> $nolambung,
							'merk' => $merk,
							'company' => $company,
						];
		
						// $savereport = [
						// 	'tanggal' => date('Y-m-d'),
						//     'idreport'=> date('ymd'),
						// 	'idproject' => $idproject, 
						// 	'tgl'=> $newDate,
						//     'idunit' => $id_unit,
						//     'keterangan ' => $keterangan,
						//     'status' => $status,
						// ];
			
						$db->table('report_dt')->insert($simpandata);
						// $db->table('laporan')->insert($savereport);
						session()->setFlashdata('message','Berhasil import excel'); 
					}
				}
					
					return redirect()->to(base_url('report_dt'));
				}



}