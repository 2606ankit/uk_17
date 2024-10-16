<?php 

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\ProductModel;
use CodeIgniter\Files\File;

class AjaxController extends BaseController
{
    protected $session;
    private $adminmodel;

	function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->adminmodel = new AdminModel();
    }

    public function changestatus()
    {
        $hreftype	=	$_POST['hreftype'];
        $catstatus	=	$_POST['catstatus'];
        $catid		=	$_POST['catid'];
        $tablename	=	$_POST['tablename'];
        $ses_user_id=	$_POST['ses_user_id'];

        $data = [
        			'hreftype'	=>	$hreftype,
        			'catstatus'	=>	$catstatus,
        			'catid'		=>	$catid,
        			'tablename'	=>	$tablename,
        			'ses_user_id'	=>	$ses_user_id,
        		];

        	$result = $this->adminmodel->changestatus($data);
    }

    public function globaldelete()
    {
    	$pagetype  	=	$_POST['pagetype'];
    	$tablename  =	$_POST['tablename'];
    	$uid  		=	$_POST['uid'];
	
		$data =	[
					'pagetype' => $pagetype,
					'tablename'	=>	$tablename,
					'uid'	=>	$uid
				];

		$result = $this->adminmodel->globaldelete($data);		     
    }
}

?>