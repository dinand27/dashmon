<?php 
namespace App\Controllers;
class Param extends BaseController
{
    public function index()
    {
        $p= $this->request->getVar();
        $row= array(
            'data'=> $p,

        );
        echo view('getparam',$row);
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

    public function getview()
    {
        $uri = current_url(true);
        $datauri= $uri->getSegment(2);
        // $data = array(
        //     'segment'=>$datauri
        // );

        // var_dump($datauri);
        return view('getview');
    }
    
   

}
?>