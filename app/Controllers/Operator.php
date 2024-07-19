<?php namespace App\Controllers;
use App\Models\OperatorModel;
class Operator extends BaseController
{
	

	public function index(){
		$opermodel = new OperatorModel();
		$data['driver'] = $opermodel->findAll();
		echo view('driver/index',$data);
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
				$namadriver = $row[1];
				$nik = $row[2];
	
				$db = \Config\Database::connect();

				$cekid = $db->table('driver')->getWhere(['id'=>$id])->getResult();

				if(count($cekid) > 0) {
					session()->setFlashdata('message','<b style="color:red">Data Gagal di Import NIS ada yang sama</b>');
				} else {
	
				$simpandata = [
					'id' => $id, 'namadriver' => $namadriver, 'nik'=> $nik
				];
	
				$db->table('driver')->insert($simpandata);
				session()->setFlashdata('message','Berhasil import excel'); 
			}
		}
			
			return redirect()->to('driver');
		}
	
} 