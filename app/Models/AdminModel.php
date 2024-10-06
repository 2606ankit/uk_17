<?php namespace App\Models;

    use CodeIgniter\Model;

    class AdminModel extends Model
    {

        public function getloginuserdata($username,$userpass)
        {
            $this->db = db_connect();
            $builder = $this->db->table('store_admin_login');
            //WHERE username = '".."' AND status = ? AND author = ?
            $getdata =  $builder->select('*')
                        ->where('username', $username)
                        ->where('password',$userpass)
                        ->get()->getResult();
            return $getdata;
        }

        public function updatelogindata($updateddata)
        {
            //echo '<pre>'; print_r($updateddata); die;
            $this->db = db_connect();
            $builder = $this->db->table('store_admin_login');

            $query =  $builder->set('session_id', $updateddata['session_id']);
                     $builder->set("last_activity",$updateddata['last_activity']);
                     $builder->where('id', $updateddata['userid']);
                     $builder->update();
                   
            return true;
        }
        public function checkifsession()
        {
            if (empty($this->session->get('userdata'))){
                return redirect()->to('login');
            }
            
        }

    }
