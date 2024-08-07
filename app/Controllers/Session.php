<?php

namespace App\Controllers;
use App\Models\ReportModel;
use App\Models\SessionModel;

class Session extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $data = array(
            'id' => '1',
            'username' => 'admin27',
            'unit' => 'DT123',
            'idproject' => 5,
            'retase' => 1,
            'tonase' => '50000',
        );
        $session->set('username',$data['username'] );
        $session->set('unit',$data['unit'] );
        $session->set('retase',$data['retase'] );
        $session->set('tonase',$data['tonase'] );
        $session->set('idproject',$data['idproject'] );
        echo 'session up !'; 
        return view('session/index');

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
