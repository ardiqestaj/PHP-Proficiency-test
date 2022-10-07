<?php

namespace App\Controllers;
use \PhpOffice\PhpSpreadsheet\IOFactory;

class Home extends BaseController
{
    public function index()
    {
        return view('home/home');
    }
}