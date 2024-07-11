<?php 
namespace App\Controllers;
class Testing extends BaseController
{
    public function index()
    {
        $p= $this->request->getVar();
        $row= array(
            'data'=> $p,

        );
        echo view('getparam',$row);
    }

  
   

}
?>