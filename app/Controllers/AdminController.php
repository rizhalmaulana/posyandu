<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {
        // Load the form helper
        helper('form');
        
        $data = [
            'title' => 'Admin Dashboard | Posyandu Dashboard'
        ];
        
        echo view('component/admin/header', $data);
        echo view('layout/admin/admin-dashboard');
        echo view('component/admin/footer');
    }
}
