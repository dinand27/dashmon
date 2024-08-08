<?php

namespace App\Controllers;
use App\Models\ReportModel;
use App\Models\SessionModel;


class Session extends BaseController
{
    public function index()
    {
        return view('session/index');

    }

    public function tambah_session()
    {
        $session = session();
        $id = $_POST['id'];
        $nama= $_POST['nama'];
        $unit= $_POST['unit'];
        $ret= $_POST['retase'];
        // $aray= array();
        $aray[]=array(
            'id' => $id,
            'nama'  => $nama,
            'unit'     => $unit,
            'retase' => $ret
        );

    //     $merg = array_merge($aray, $aray['new']);           
    // dd($merg);  
    if($session->get('id') == $id){
        echo 'id sdh ada';
        $tambah = (int)$ret + 1;

        $aray[] = array(
            'id' => $id,
            'nama'  => $nama,
            'unit'     => $unit,
            'retase' => $tambah
        );

        $session->set($olddata);

    }else { echo 'id kosong' ;
        $aray['new'] = array(
            'id' => $id,
            'nama'  => $nama,
            'unit'     => $unit,
            'retase' => 1
        );


        $gabungan = array_merge($aray, $aray['new']);
        $json= json_encode($gabungan);
        var_dump($json);
        
    }

       
        return view('session/data');

    }

    public function data_session()
    {
        $session= session();
        if ($session){
            echo 'username : '.$session->get('username');
            echo '<br> retase : '.$session->get('retase');
            echo '<br> Project_ID : '.$session->get('idproject');
            echo '<br> Unit : '.$session->get('unit');
            echo '<br> ton : '.$session->get('tonase');
        }else { 
            echo 'session kosong';
        } 
    }

    public function data_session_unset()
    {
        $session= session();
        $session->remove('ret');
        echo 'Session Retase dihapus';
    }

    public function data_session_del()
    {
        $session= session();
        $session->destroy();
        echo 'Session Retase dihapus semuanya';

    }

    public function session_add()
    {
        $newdata = [
            'username'  => 'johndoe',
            'unit'     => 'DT-234',
            'tonase' => '70000',
        ];
        $session= session();
        $session->set($newdata);
        echo 'session di update';
        return view('session/add');
    }



}
