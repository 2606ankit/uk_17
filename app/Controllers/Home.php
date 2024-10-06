<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function user_login()
    {
        $data = [
            "site_title" => "UK17"
        ];
        return view('admin/index');
        //return $parser->setdata($data)->render('admin/index');
    }
}
