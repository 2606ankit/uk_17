<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\ProductModel;
use CodeIgniter\Files\File;

class ProductController extends BaseController
{
    protected $session;
    private $adminmodel;
    private $productmodel;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->adminmodel = new AdminModel();
        $this->productmodel = new productModel();
    }

    public function addcatagory()
    {
        return view('product/addcatagory');
    }

    public function catagory()
    {
        return view('product/catagoryListing');
    }

    public function addsubcatagory()
    {
        $allcatagory = $this->adminmodel->getallcatagory();
        $data = ['allcatagory'=>$allcatagory];
        return view('product/addsubcatagory',$data);
    } 

    public function addcatagory_form()
    {
       
        if (strtolower($this->request->getMethod()) == 'post')
            {
                $session_data = $this->session->get('userdata');
                $catgoryID = rand(10,100).'CATPRE';
                $imagetype = $_FILES['catagoryaimage'];
             
                $catagoryname       =   $this->request->getPost('catagoryname'); 
                $catagoryalias      =   $this->request->getPost('catagoryalias'); 
                $catagoryatext      =   $this->request->getPost('catagoryatext');
                $catagorymessage    =   $this->request->getPost('catagorymessage');
                $catstatus          =   $this->request->getPost('catstatus');


                $imageupload = $this->adminmodel->uploadCatgeory_image($imagetype);
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

                    $insertdata = $this->productmodel->insertCategory($insertarray);
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
                echo '<pre>'; print_r($_POST); die;
                $session_data = $this->session->get('userdata');
                $catgoryID = rand(10,100).'CATPRE';
                $imagetype = $_FILES['catagoryaimage'];
             
                $catagoryname       =   $this->request->getPost('catagoryname'); 
                $catagoryalias      =   $this->request->getPost('catagoryalias'); 
                $catagoryatext      =   $this->request->getPost('catagoryatext');
                $catagorymessage    =   $this->request->getPost('catagorymessage');
                $catstatus          =   $this->request->getPost('catstatus');


                $imageupload = $this->adminmodel->uploadCatgeory_image($imagetype);
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

                    $insertdata = $this->productmodel->insertCategory($insertarray);
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
   

    public function productlisting()
    {
        return view('');
    }

    public function addproduct()
    {
        
        return view('product/addproduct');
    }
}

//productlisting