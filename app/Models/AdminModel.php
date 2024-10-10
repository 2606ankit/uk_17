<?php 
    namespace App\Models;

    use CodeIgniter\Model;

    class AdminModel extends Model
    {   
        

        public function getloginuserdata($username,$userpass)
        {
            $this->db = db_connect();
            $builder = $this->db->table('uk_users');
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
            $builder = $this->db->table('uk_users');

            $query =  $builder->set('session_id', $updateddata['session_id']);
                     $builder->set("last_login_time",$updateddata['last_activity']);
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

        public function uploadCatgeory_image($imagetype,$image_prefix)
        {
           chmod($_SERVER['DOCUMENT_ROOT'].CATEGORY_IMAGE_UPLOAD_PATH, 0777);

           $extension = pathinfo($imagetype['name'], PATHINFO_EXTENSION);

           $extcheck = array('jpg','png','jpeg');
            
           if (in_array($extension,$extcheck))
           {    
                $prefix = $image_prefix.time();

                $uploaddir  = $_SERVER['DOCUMENT_ROOT'].CATEGORY_IMAGE_UPLOAD_PATH;
                $imagename  = $prefix.'_IMG.'.$extension;
                $uploadfile = $uploaddir.$imagename;

              
                if (move_uploaded_file($imagetype['tmp_name'], $uploadfile)) {
                    return array('success'=>TRUE,'uploded_path'=>$uploaddir,'file_name'=>$imagename);
                } else {
                    return array('error'=>'image not uploded');
                }
 
           }
           else {
                return array('error'=>'image should be jpg,jpeg,png formate');
           }
        }

    }
