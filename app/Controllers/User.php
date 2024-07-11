<?php 
namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $data= array(
            'title'=> 'Data User',

        );
        return view('user', $data);

    }

    public function register()
    {
        $data= array(
            'title'=> 'Register',

        );
        return view('user/register', $data);
    }
    public function login()
    {
        $data= array(
            'title'=> 'Login',

        );
        return view('user/login', $data);
    }

    public function do_register()
    {
        echo "Register Success";
    }

    public function do_login()
    {
        echo "Login SUccess";

    }

  
   

}
?>