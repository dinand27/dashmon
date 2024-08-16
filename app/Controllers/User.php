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
        return view('user/index', $data);

    }

    public function register()
    {
        $data= array(
            'title'=> 'Reg',

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
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'passw' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[passw]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'namalengkap' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new UserModel();
        $users->insert([
            'username' => $this->request->getVar('username'),
            'passw' => password_hash($this->request->getVar('passw'), PASSWORD_BCRYPT),
            'namalengkap' => $this->request->getVar('namalengkap')
        ]);
        return redirect()->to('/login');
    }
 
    public function do_login()
    {
        $M_user= new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('passw');
        $where= array(
            'username' => $username,
            'password' => $password, 

        );
        $cek= $M_user->get_data($username, $password);

        if($cek >0)
        {
            session()->set('username', $cek['username']);
            session()->set('id', $cek['id']);
            session()->set('namalengkap', $cek['namalengkap']);
            session()->set('role', $cek['role']);

            session()->setFlashdata('msg','sukses');
            return redirect()->to(base_url(''));

        } else {

            session()->setFlashdata('msg','Username / Password Salah!');
            return redirect()->to(base_url('login'));
        }

    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
  
   

}
?>