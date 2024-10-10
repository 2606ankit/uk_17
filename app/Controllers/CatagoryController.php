<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\CatagoryModel;
use CodeIgniter\Files\File;

class CatagoryController extends BaseController
{
    protected $session;
    private $adminmodel;
    private $catagorymodel;
    private $sessiondata;
    private $session_userid;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->adminmodel = new AdminModel();
        $this->catagorymodel = new CatagoryModel();
        $this->sessiondata = $this->session->get('userdata');
        $this->session_userid = $this->sessiondata[0]->id;
    }

    // ======= Add Catagory ===== 
    public function addcatagory()
    {
        return view('catagory/addcatagory');
    }

    // ======= Catagory Listing  ===== 

    public function catagory()
    {
        $allcatagory = $this->catagorymodel->getallcatagory();
        $data = ['allcatagory'=>$allcatagory];
        return view('catagory/catagoryListing',$data);
    }

    // ======= Add Sub Catagory ===== 
     public function addsubcatagory()
    {
          
        $allcatagory = $this->catagorymodel->getallcatagory();
        $data = ['allcatagory'=>$allcatagory];
        return view('catagory/addsubcatagory',$data);
    } 

    // ======= Sub Catagory Listing ===== 
    public function subcatagory()
    {
        $getallsubcatagory = $this->catagorymodel->getallsubcatagory();
        $data = ['getallsubcatagory'=>$getallsubcatagory];
        return view('catagory/subcatagory',$data);
    }

    public function addcatagory_form()
    {
       
        if (strtolower($this->request->getMethod()) == 'post')
            {
                $session_data = $this->session->get('userdata');
                $catgoryID = rand(10,100).'CATPRE';
                $imagetype = $_FILES['catagoryaimage'];
                $image_prefix = CAT_PREFIX;
             
                $catagoryname       =   $this->request->getPost('catagoryname'); 
                $catagoryalias      =   $this->request->getPost('catagoryalias'); 
                $catagoryatext      =   $this->request->getPost('catagoryatext');
                $catagorymessage    =   $this->request->getPost('catagorymessage');
                $catstatus          =   $this->request->getPost('catstatus');


                $imageupload = $this->adminmodel->uploadCatgeory_image($imagetype,$image_prefix);
                if ($imageupload['success'] == TRUE){
                    $filename = $imageupload['file_name'];
                    $filepath = $imageupload['uploded_path'];

                    $insertarray  = array(
                                            'category_uid'  =>  $catgoryID,
                                            'catagoryname'  =>  $catagoryname,
                                            'catagoryalias' =>  $catagoryalias,
                                            'catagoryatext' =>  $catagoryatext,
                                            'category_description'  =>  $catagorymessage,
                                            'catstatus'     =>  $catstatus,
                                            'filename'      =>  $filename,
                                            'filepath'      =>  $filepath,
                                            'session_userid'    =>  $session_data[0]->id
                                        );

                    $insertdata = $this->catagorymodel->insertCategory($insertarray);
                       if($insertdata == TRUE)
                       {
                            return redirect()->to('catagory');
                       }
                       else {
                            return redirect()->to('addcatagory');
                        }
                }
        }
    }

     public function addsubcatagory_form()
    {
       
        if (strtolower($this->request->getMethod()) == 'post')
            {
              
                $subcatgoryID = rand(10,100).'SUB_CATPRE';
                $imagetype = $_FILES['sub_category_image'];
                $image_prefix = SUB_CAT_PREFIX;
             
                $sub_category_name          =   $this->request->getPost('sub_category_name'); 
                $parent_category_id         =   $this->request->getPost('parent_category_id'); 
                $sub_category_text          =   $this->request->getPost('sub_category_text');
                $sub_category_description   =   $this->request->getPost('sub_category_description');
                $is_active                  =   $this->request->getPost('is_active');


                $imageupload = $this->adminmodel->uploadCatgeory_image($imagetype,$image_prefix);
                if ($imageupload['success'] == TRUE){
                    $filename = $imageupload['file_name'];
                    $filepath = $imageupload['uploded_path'];

                    $insertarray  = array(
                                            'subcategory_uid'       =>  $subcatgoryID,
                                            'sub_category_name'     =>  $sub_category_name,
                                            'parent_category_id'    =>  $parent_category_id,
                                            'sub_category_text'     =>  $sub_category_text,
                                            'sub_category_description'  =>  $sub_category_description,
                                            'is_active'             =>  $is_active,
                                            'sub_category_image'    =>  $filename,
                                            'sub_category_image_url'=>  $filepath,
                                            'parent_category_id'    =>  $this->session_userid
                                        );

                    $insertdata = $this->catagorymodel->insertsubCategory($insertarray);
                       if($insertdata == TRUE)
                       {
                            return redirect()->to('subcatagory');
                       }
                       else {
                            return redirect()->to('addsubcatagory');
                        }
                }
        }
    }
   
  
}

//productlisting