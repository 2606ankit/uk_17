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

    public function addcatagory_form()
    {
        $catgoryID = rand(10,100).'CATPRE';
 
        $fielinfo = $this->request->getfile('catagoryaimage');
        $path = WRITEPATH;
        
        $validationRule = [
            'catagoryaimage' => [
               
                'rules' => [
                     'mime_in[catagoryaimage,image/jpg,image/jpeg,image/gif,image/png]',
                 ],
            ],
        ];
        if (! $this->validateData(['catagoryaimage'], $validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
                
            return view('upload_form', $data);
        }
        else{
            if (! $fielinfo->hasMoved()) {
                    $filepath = WRITEPATH . 'catagoary_image/' . $fielinfo->store();

                    $data = ['uploaded_fileinfo' => new File($filepath)];
                    echo '<pre>'; print_r($data);
                    //return view('upload_success', $data);
                }
            echo'<pre>'; print_r($_POST); die;
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