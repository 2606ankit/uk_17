<?php namespace App\Models;

    use CodeIgniter\Model;

    class catagorymodel extends Model
    {
    	protected $db;
		protected $catbuilder;
     
    	public function __constructor()
    	{
			$this->db = db_connect();
           
    	}
		
        public function insertCategory($insertarray)
        {
        	 
			$catbuilder = $this->db->table('uk_category');
        	// $this->session->get('userdata'); die;
        	 $todaydate = date('Y-m-d H:i:s');
        	$insert_array = [
        						'category_uid' 			=> 	$insertarray['category_uid'],
        						'category_name'			=>	$insertarray['catagoryname'],
        						'category_description'	=>	$insertarray['category_description'],
        						'category_alias'		=>	$insertarray['catagoryalias'],
        						'category_text'			=>	$insertarray['catagoryatext'],
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
        	}else { return false;}
        }	

        // get all cataogry
        public function getallcatagory()
        { 
			 $catbuilder = $this->db->table('uk_category');
        	$query = $catbuilder->select("*")->get()->getResult();
        	return $query;
        }
		
		// ADD SUB CATAGORY START HERE
		public function insertsubCategory($insertarray)
		{
			$subcatbuilder = $this->db->table('uk_sub_category');
			$query = $subcatbuilder->insert($insertarray);

        	if ($query){
        		return TRUE;
        	}else { return false;}
		}

		// get all sub catagory 
		public function getallsubcatagory()
		{
			$subcatbuilder = $this->db->table('uk_sub_category');
			$query = $subcatbuilder->select("*")
					->join('uk_category', 'uk_category.id = uk_sub_category.parent_category_id')	
					->get()->getResult();
			return $query;
        	 
		}
    }