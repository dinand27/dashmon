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
            'user' => 'admin27',
            'unit' => 'DT123',
            'retase' => 1,
            'tonase' => '50000',
        );
        $session->set('username',$data['user'] );
        $session->set('unit',$data['unit'] );
        $session->set('ret',$data['retase'] );
        $session->set('ton',$data['tonase'] );
        echo 'session up !'; 
        return view('session/index');

    }

    public function data_session()
    {
        $session= session();
        if ($session->get('id')){
            echo 'Username : '.$session->get('user');
            echo 'id Terpilih : '.$session->get('id');
            echo 'Project ID : '.$session->get('idproject');
            echo 'Unit : '.$session->get('unit');
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
        
        return view('session/add');
    }



}
