<?php

    namespace App\Controllers;
    use App\Models\AdminModel;
    use App\Models\CatagoryModel;
    use App\Models\ProductModel;
    use CodeIgniter\Files\File;

    class ProductController extends BaseController
    {
        protected $session;
        private $adminmodel;
        private $catagorymodel;
        private $sessiondata;
        private $session_userid;
        private $productmodel;

        function __construct()
        {
            $this->session = \Config\Services::session();
            $this->session->start();
            $this->adminmodel = new AdminModel();
            $this->catagorymodel = new CatagoryModel();
            $this->productmodel = new ProductModel();
            $this->sessiondata = $this->session->get('userdata');
            $this->session_userid = $this->sessiondata[0]->id;
        }

        public function addproduct()
        {
            $getallcatagory = $this->catagorymodel->acivegetallcatagory();
            $data = ['allcatagory'=>$getallcatagory];
            return view('product/addproduct',$data);
        }

        public function addproduct_form()
        {
            try{
                  if (strtolower($this->request->getMethod()) == 'post')
                    {
                        $session_data   =   $this->session->get('userdata');
                        $timeprefix     =   time();
                        $result         =   substr($timeprefix, 0, 6);
                        $productUid     =   $result.'_PRODUCT';
                       
                        $image_prefix   =   PROD_IMAGE_PREFIX;
                        $folder_name    =   $productUid;
                        $imagename_forinsert      =   array();
                        // CREATE FOLDER FOR PRDUOCT IMAGE 
                        $imageupload_folder = $_SERVER['DOCUMENT_ROOT'].PRODUCT_IMAGE_UPLOAD_PATH.$folder_name;
                        if (!file_exists($_SERVER['DOCUMENT_ROOT'].PRODUCT_IMAGE_UPLOAD_PATH.$folder_name)) {
                            mkdir($_SERVER['DOCUMENT_ROOT'].PRODUCT_IMAGE_UPLOAD_PATH.$folder_name, 0777, true);
                        }
                        // INSERT IMAGE IN FOLDER 
                        foreach($_FILES["prodcut_image"]["tmp_name"] as $key=>$tmp_name) 
                        {
                            $imagetype      =   $_FILES['prodcut_image']['name'][$key];
                            //$uploadimage = $this->adminmodel->Mulliple_productImage($imagetype,$image_prefix);
                            chmod($_SERVER['DOCUMENT_ROOT'].PRODUCT_IMAGE_UPLOAD_PATH, 0777);
                              $extension = pathinfo($_FILES["prodcut_image"]['name'][$key], PATHINFO_EXTENSION);
                                   $extcheck = array('jpg','png','jpeg');
                                   if (in_array($extension,$extcheck))
                                   {    
                                        $prefix = $image_prefix.time().rand(0,100);
                                        $uploaddir  = $_SERVER['DOCUMENT_ROOT'].PRODUCT_IMAGE_UPLOAD_PATH.$folder_name.'/' ;
                                        $imagename  = $prefix.'_IMG.'.$extension;
                                        $uploadfile = $uploaddir.$imagename;
                                        if (move_uploaded_file($_FILES['prodcut_image']['tmp_name'][$key], $uploadfile)) {
                                            $imagename_forinsert[] = array('success'=>TRUE,'uploded_path'=>$uploaddir,'file_name'=>$imagename);
                                             
                                        } else {
                                            return array('error'=>'image not uploded');
                                        }
                                   }
                                   else {
                                        return array('error'=>'image should be jpg,jpeg,png formate');
                                   }
                        }
                        // END HERE
                        $imagenametoDB  = '';
                         
                        foreach ($imagename_forinsert as $k=>$v){
                            $imagenametoDB .= $v['file_name'].',';
                        }
                        
                        $insertdata = [
                                    'product_name'               =>  $this->request->getPost('product_name'), 
                                    'product_category_id'        =>  $this->request->getPost('product_category_id'), 
                                    'in_stoke'                   =>  $this->request->getPost('in_stoke'),
                                    'product_price'              =>  $this->request->getPost('product_price'),
                                    'product_gender'             =>  $this->request->getPost('product_gender'),
                                    'in_stoke_message'           =>  $this->request->getPost('in_stoke_message'),
                                    'out_of_stoke_message'       =>  $this->request->getPost('out_of_stoke_message'),
                                    'product_sale_type'          =>  $this->request->getPost('product_sale_type'),
                                    'product_description'        =>  $this->request->getPost('product_description'),
                                    'is_active'                  =>  $this->request->getPost('is_active'),
                                    'product_image'              =>  substr($imagenametoDB, 0,-1),
                                    'product_image_location'     =>  $imageupload_folder,
                                    'created_by'                 =>  $this->session_userid,
                                    'created_at'                 =>  date('Y-m-d H:i:s'),
                                    'product_un_id'              =>  $productUid,
                                    'image_folder'               =>  $folder_name,
                            ];

                            $inserquerydata = $this->productmodel->insertproduct($insertdata);
                            if($inserquerydata == TRUE)
                               {
                                    $this->session->setFlashdata(data:'success',value:'Product Inserted Successfully');
                                    return redirect()->to('product_listing');
                               }
                           else {
                                $this->session->setFlashdata(data:'error',value:'Some error! Please Re-Enter Product Detail');
                                return redirect()->to('product_listing');
                            }
 
                        // GET POST VALUE
                    }
            }
            catch(Exception $e){
                 $this->session->setFlashdata(data:'error',value:$e->getMessage());
            }
        }
        public function product_listing()
        {
            $succes_message = $this->session->getFlashdata(key:'success');
            $error_message = $this->session->getFlashdata(key:'error');
            
            $getallproduct = $this->productmodel->getallproduct();
            $sesid = $this->session_userid;
            $data = ['succes_message'=>$succes_message,'error_message'=>$error_message,'getallproduct'=>$getallproduct,'sesid'=>$sesid];

            return view('product/product_listing',$data);
        }
    }
?>