<?php namespace App\Models;

    use CodeIgniter\Model;

    class ProductModel extends Model
    {
    	protected $db;
     
    	public function __constructor()
    	{
			$this->db = db_connect();
           
    	}
        public function insertCategory($insertarray)
        {
        	$this->db = db_connect();
        	 $catbuilder = $this->db->table('uk_category');
        	// $this->session->get('userdata'); die;
        	 $todaydate = date('Y-m-d H:i:s');
        	$insert_array = [
        						'category_uid' 			=> 	$insertarray['category_uid'],
        						'category_name'			=>	$insertarray['catagoryname'],
        						'category_description'	=>	$insertarray['catagoryatext'],
        						'category_alias'		=>	$insertarray['catagoryalias'],
        						'category_text'			=>	$insertarray['category_description'],
        						'category_image'		=>	$insertarray['filename'],
        						'category_image_url'	=>	$insertarray['filepath'],
        						'is_active'				=>	$insertarray['catstatus'],
        						'created_by'			=>	$insertarray['session_userid'],
        						'created_at'			=>	$todaydate,
        						'updated_at'			=>	$todaydate,
        					];

        	$query = $catbuilder->insert($insert_array);

        	if ($query){
        		return TRUE;
        	}
        }	

        // get all cataogry
        public function getallcatagory()
        {
        	 $this->db = db_connect();
        	 $catbuilder = $this->db->table('uk_category');
        	 $query = $catbuilder->select("*")->get()->getResult();
        	return $query;
        }
    }