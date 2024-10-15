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

         public function updateCategory($insertarray,$editid)
        {
             
            $catbuilder = $this->db->table('uk_category');
            // $this->session->get('userdata'); die;
             $todaydate = date('Y-m-d H:i:s');
            $insert_array = [
                                'category_name'         =>  $insertarray['catagoryname'],
                                'category_description'  =>  $insertarray['category_description'],
                                'category_alias'        =>  $insertarray['catagoryalias'],
                                'category_text'         =>  $insertarray['catagoryatext'],
                                'category_image'        =>  $insertarray['filename'],
                                'category_image_url'    =>  $insertarray['filepath'],
                                'is_active'             =>  $insertarray['catstatus'],
                                'updated_by'            =>  $insertarray['updated_by'],
                                'updated_at'            =>  $todaydate,
                            ];

            $query = $catbuilder->where('id',$editid)->set($insert_array)->update();

            if ($query){
                return TRUE;
            }else { return false;}
        }

        // get all cataogry
        public function getallcatagory()
        { 
			 $catbuilder = $this->db->table('uk_category');
             $active = '1';
        	$query = $catbuilder->select("*")->get()->getResult();
        	return $query;
        }
		
        public function acivegetallcatagory()
        { 
             $catbuilder = $this->db->table('uk_category');
             $active = '1';
            $query = $catbuilder->select("*")->where('is_active',$active)->get()->getResult();
            return $query;
        }

        //  get catagory by id 
        public function getCatagoryById($getid)
        {
            $subcatbuilder = $this->db->table('uk_category');
            $query = $subcatbuilder->select("*")
                     ->where("id",base64_decode($getid))
                     ->get()->getResult();
             return $query;
        }
        // get Sub Catagory By Id 
        public function getSubCatbyId($getid)
        {
            $subcatbuilder = $this->db->table('uk_sub_category');
            $query = $subcatbuilder->select("*")
                     ->where("id",base64_decode($getid))
                     ->get()->getResult();
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

        public function updatesubCategory($insertarray,$editid)
        {
            $subcatbuilder = $this->db->table('uk_sub_category');
            $query = $subcatbuilder->where('id',$editid);
                     $subcatbuilder->set($insertarray);
                     $subcatbuilder->update();

            if ($query){
                return TRUE;
            }else { return FALSE;}
        }

		// get all sub catagory 
		public function getallsubcatagory()
		{
			$subcatbuilder = $this->db->table('uk_sub_category as subcat');
			$query = $subcatbuilder->select("subcat.id as id,subcat.sub_category_name as sub_category_name,subcat.parent_category_id as parent_category_id,subcat.subcategory_uid as subcategory_uid,subcat.sub_category_image as sub_category_image,subcat.sub_category_image_url as sub_category_image_url,subcat.sub_category_description as sub_category_description,subcat.sub_category_text as sub_category_text,subcat.is_active as is_active,subcat.created_by as created_by,subcat.updated_by as updated_by,subcat.created_at as created_at,subcat.updated_at as updated_at,cat.id as catid  ,cat.category_name as category_name")
					->join('uk_category as cat', 'cat.id = subcat.parent_category_id')	
					->get()->getResult();
			return $query;
        	 
		}
    }