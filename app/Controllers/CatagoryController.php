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
        $succes_message = $this->session->getFlashdata(key:'success');
        $error_message = $this->session->getFlashdata(key:'error');

        $allcatagory = $this->catagorymodel->getallcatagory();
        $data = ['allcatagory'=>$allcatagory,'sesid'=>$this->sessiondata[0]->id,'succes_message'=>$succes_message,'error_message'=>$error_message];
        return view('catagory/catagoryListing',$data);
    }

    // edit sub catagory
    public function edit_catagory()
    {
         $this->uri = service('uri'); 
        //echo '<pre>'; print_r($this->uri);
        $getid = $this->uri->getsegments();

        $getCatagoryById = $this->catagorymodel->getCatagoryById($getid[1]);
        $data = ['getCatagoryById'=>$getCatagoryById];
        return view('catagory/edit_catagory',$data);
    }

    // ======= Add Sub Catagory ===== 
     public function addsubcatagory()
    {
          
        $allcatagory = $this->catagorymodel->getallcatagory();
        $data = ['allcatagory'=>$allcatagory,'sesid'=>$this->sessiondata[0]->id];
        return view('catagory/addsubcatagory',$data);
    } 

    // ======= Sub Catagory Listing ===== 
    public function subcatagory()
    {
        $succes_message = $this->session->getFlashdata(key:'success');
        $error_message = $this->session->getFlashdata(key:'error');

        $getallsubcatagory = $this->catagorymodel->getallsubcatagory();
        //echo '<pre>'; print_r($getallsubcatagory); die;
        $data = ['getallsubcatagory'=>$getallsubcatagory,'sesid'=>$this->sessiondata[0]->id,'succes_message'=>$succes_message,'error_message'=>$error_message];
        return view('catagory/subcatagory',$data);
    }

    public function edit_subcatagory()
    {   
        $this->uri = service('uri'); 
        //echo '<pre>'; print_r($this->uri);
        $getid = $this->uri->getsegments();

        $getallcatagory = $this->catagorymodel->acivegetallcatagory();
        $getsubcatbyid = $this->catagorymodel->getSubCatbyId($getid[1]);
      // echo '<pre>'; print_r($getallcatagory); die;
        $data = ['allcatagory'=>$getallcatagory,'sesid'=>$this->sessiondata[0]->id,'getsubcatbyid'=>$getsubcatbyid];
        return view('catagory/edit_subcatagory',$data);
    }

    public function addcatagory_form()
    {
       try {
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
                                $this->session->setFlashdata(data:'success',value:'Catagory Inserted Successfully');
                                return redirect()->to('catagory');
                           }
                           else {
                                $this->session->setFlashdata(data:'error',value:'Some error! Please Re-Enter Catagory Detail');
                                return redirect()->to('addcatagory');
                            }
                    }
                    else{
                         $this->session->setFlashdata(data:'error',value:'Image Not Uploaded!');
                    }
            }
        }
        catch(Exception $e) {
             // echo 'Message: ' .$e->getMessage();
              $this->session->setFlashdata(data:'error',value:$e->getMessage());
            }
    }

    // edit catagory form
    public function edit_catagoryform()
    {
       try {
                if (strtolower($this->request->getMethod()) == 'post')
                    {
                        $session_data = $this->session->get('userdata');

                        if (!empty($_FILES['catagoryaimage']['name'])){
                            $imagetype = $_FILES['catagoryaimage'];
                            $image_prefix = CAT_PREFIX; 
                            $imageupload = $this->adminmodel->uploadCatgeory_image($imagetype,$image_prefix);
                            if ($imageupload['success'] == TRUE){
                                $filename = $imageupload['file_name'];
                                $filepath = $imageupload['uploded_path'];
                            }
                            else{
                                 $this->session->setFlashdata(data:'error',value:'Image Not Uploaded!');
                            }

                        }
                        else {
                            $filename = $this->request->getPost('pre_image_name');
                            $filepath = $this->request->getPost('pre_image_path');
                        }
                       
                     
                        $catagoryname       =   $this->request->getPost('catagoryname'); 
                        $catagoryalias      =   $this->request->getPost('catagoryalias'); 
                        $catagoryatext      =   $this->request->getPost('catagoryatext');
                        $catagorymessage    =   $this->request->getPost('catagorymessage');
                        $catstatus          =   $this->request->getPost('catstatus');
                        $editid             =   $this->request->getPost('editid');


                       
                      

                            $insertarray  = array(
                                                    
                                                    'catagoryname'  =>  $catagoryname,
                                                    'catagoryalias' =>  $catagoryalias,
                                                    'catagoryatext' =>  $catagoryatext,
                                                    'category_description'  =>  $catagorymessage,
                                                    'catstatus'     =>  $catstatus,
                                                    'filename'      =>  $filename,
                                                    'filepath'      =>  $filepath,
                                                    'updated_by'    =>  $session_data[0]->id,
                                                );

                            $insertdata = $this->catagorymodel->updateCategory($insertarray,$editid);
                               if($insertdata == TRUE)
                               {
                                    $this->session->setFlashdata(data:'success',value:'Catagory Updated Successfully');
                                    return redirect()->to('catagory');
                               }
                               else {
                                    $this->session->setFlashdata(data:'error',value:'Catagory Not Updated Successfully');
                                    return redirect()->to('addcatagory');
                                }
                         
                }
            }
         catch(Exception $e) {
             // echo 'Message: ' .$e->getMessage();
              $this->session->setFlashdata(data:'error',value:$e->getMessage());
            }
    }
    // end here


     public function addsubcatagory_form()
    {
       
       try{
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
                                                'created_by'    =>  $this->session_userid
                                            );

                        $insertdata = $this->catagorymodel->insertsubCategory($insertarray);
                           if($insertdata == TRUE)
                           {
                                $this->session->setFlashdata(data:'success',value:'Sub-Catagory Inserted Successfully');
                                return redirect()->to('subcatagory');
                           }
                           else {
                                $this->session->setFlashdata(data:'error',value:'Some error! Please Re-Enter Sub Catagory Detail');
                                return redirect()->to('addsubcatagory');
                            }
                    }
                    else{
                         $this->session->setFlashdata(data:'error',value:'Image Not Uploaded!');
                    }
            }
        }
        catch(Exception $e) {
             // echo 'Message: ' .$e->getMessage();
              $this->session->setFlashdata(data:'error',value:$e->getMessage());
            }
    }

    // edit subcatagory details
    public function edit_subcatagoryform()
    {
        try{
           if (strtolower($this->request->getMethod()) == 'post')
                {
                  
                    
                    $image_prefix = SUB_CAT_PREFIX;
                  //  echo '<pre>'; print_r($_FILES); die;
                    if (!empty($_FILES['sub_category_image']['name'])){
                        $imagetype = $_FILES['sub_category_image'];
                        $imageupload = $this->adminmodel->uploadCatgeory_image($imagetype,$image_prefix);
                        
                        if ($imageupload['success'] == TRUE)
                        {
                            $filename = $imageupload['file_name'];
                            $filepath = $imageupload['uploded_path'];
                        }
                        else {
                            $this->session->setFlashdata(data:'error',value:'Image Not Uploaded!');
                        }
                    }
                    else {
                        $filename = $this->request->getPost('pre_image_name');
                        $filepath = $this->request->getPost('pre_image_path');
                    }

                    $sub_category_name          =   $this->request->getPost('sub_category_name'); 
                    $parent_category_id         =   $this->request->getPost('parent_category_id'); 
                    $sub_category_text          =   $this->request->getPost('sub_category_text');
                    $sub_category_description   =   $this->request->getPost('sub_category_description');
                    $is_active                  =   $this->request->getPost('is_active');
                    $editid                     =   $this->request->getPost('editid');

                        $insertarray  = array(
                                                
                                                'sub_category_name'     =>  $sub_category_name,
                                                'parent_category_id'    =>  $parent_category_id,
                                                'sub_category_text'     =>  $sub_category_text,
                                                'sub_category_description'  =>  $sub_category_description,
                                                'is_active'             =>  $is_active,
                                                'sub_category_image'    =>  $filename,
                                                'sub_category_image_url'=>  $filepath,
                                                'updated_by'    =>  $this->session_userid,
                                                 
                                            );

                        $insertdata = $this->catagorymodel->updatesubCategory($insertarray,$editid);
                           if($insertdata == TRUE)
                           {
                                $this->session->setFlashdata(data:'success',value:'Sub-Catagory Updated Successfully');
                                return redirect()->to('subcatagory');
                           }
                           else {
                                $this->session->setFlashdata(data:'error',value:'Some error! Please Re-Enter Sub Catagory Detail');
                                return redirect()->to('addsubcatagory');
                            }
                    
            } 
        }
        catch(Exception $e) {
             // echo 'Message: ' .$e->getMessage();
              $this->session->setFlashdata(data:'error',value:$e->getMessage());
            }
    }
    // end here
   
  
}

//productlisting