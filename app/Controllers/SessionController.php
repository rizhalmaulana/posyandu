<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SessionController extends BaseController
{
    public function authorised($data)
    {
        $session = session();
        $authData = [
            'id'            => $data['id'],
            'id_posyandu'   => $data['id_posyandu'],
            'username'      => $data['username'],
            'nama_lengkap'  => $data['nama_lengkap'],
            'email'         => $data['email_admin'],
            'phone'         => $data['phone_admin'],
            'verified'      => $data['verified'],
            'status'        => $data['status'],
            'isLoggedIn'    => true,
        ];

        $session->set($authData);
    }

    public function unauthorised()
    {
        $session = session();
        $authData = ['isLoggedIn' => false];

        $session->set($authData);
    }
}
