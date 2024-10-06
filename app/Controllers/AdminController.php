<?php

namespace App\Controllers;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    protected $session;
    private $adminmodel;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->adminmodel = new AdminModel();
    }

    public function expirepage()
    {
        return view('admin/404');
    }

    public function login()
    {
        //echo'<pre>'; print_r($_SESSION); die;
        $data = [
            "site_title" => "UK17"
        ];
        if (!empty($this->session->get('userdata'))){
            return redirect()->to('home');
        }
        return view('admin/index',['data'=>$data]);
    }

    public function userlogin()
    {
        
        if (strtolower($this->request->getMethod()) == 'post')
            {
                $username =  $this->request->getPost('username'); 
                $userpass =  md5($this->request->getPost('userpass'));

                $getdata = $this->adminmodel->getloginuserdata($username,$userpass);
                
                if (!empty($getdata))
                {   
                    $this->session->set('userdata',$getdata);
                    $todaydaye = date('Y-m-d H:i:s');
                    $updateddata = array(
                                        "session_id"    =>  $_SESSION['__ci_last_regenerate'],
                                        "last_activity" =>  $todaydaye,
                                        "userid"        =>  $getdata[0]->id
                    );
                    $udpateuserdata = $this->adminmodel->updatelogindata($updateddata);
                    return redirect()->to('home');
                }
                else {
                    $this->session->set('login_error',LOGIN_USER_ERROR_TEXT);
                    return redirect()->to('login');
                }
            }
        else {
            return redirect()->to('expirepage');
        }

    }
   

    function logout()
    {
        $user_data = $this->session->get('userdata');
            
        $this->session->destroy();
        //$this->session->sess_destroy();
        return redirect()->to('login');
    }

    public function home()
    {
       // echo '<pre>'; print_r($_SESSION); die;        
        unset($_SESSION['login_error']);
        if (empty($this->session->get('userdata'))){
            return redirect()->to('login');
        }
        $data = [
            "site_title" => "UK17"
        ];
        return view('admin/home',['data'=>$data]);
    }
}
