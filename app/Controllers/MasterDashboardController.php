<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MasterDashboardController extends BaseController
{
    public function index()
    {
        // Load the form helper
        helper('form');
        
        $data = [
            'title' => 'Master Dashboard | Posyandu Dashboard'
        ];
        
        echo view('component/master/header', $data);
        echo view('layout/master/master-dashboard');
        echo view('component/master/footer');
    }
}
