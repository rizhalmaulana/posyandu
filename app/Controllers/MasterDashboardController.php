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
            'title'                 => 'Master Dashboard | Tembang Santri',
            'session'               => session()->get(),
            'status_active_menu'    => 'dashboard',
            'status_active_submenu' => 'monitoring'
        ];
        
        echo view('component/master/header', $data);
        echo view('layout/master/master-dashboard');
        echo view('component/master/footer');
    }
}
