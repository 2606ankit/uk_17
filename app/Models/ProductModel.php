<?php 
    namespace App\Models;

    use CodeIgniter\Model;

    class ProductModel extends Model
    {   
        public function insertproduct($insertdata)
        {
        	$this->db = db_connect();
            $builder = $this->db->table('uk_product');

            $query = $builder->insert($insertdata);
            if($query){
            	return TRUE;
            }
            else {
            	return FALSE;
            }
        }
        
        public function getallproduct()
        {
        	$this->db = db_connect();
            $catbuilder = $this->db->table('uk_product');
            $active = '1';
        	$query = $catbuilder->select("*")->get()->getResult();
        	return $query;
        }
    }
?>