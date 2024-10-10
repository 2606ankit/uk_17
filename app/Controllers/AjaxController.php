<?php 

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\ProductModel;
use CodeIgniter\Files\File;

class AjaxController extends BaseController
{
    public function changestatus()
    {
        if ($this->request->isAJAX()) {
            $query = $this->request->getPost('hreftype');
            echo $query;
        }
    }
}

?>