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
            'id_kota'       => $data['id_kota'],
            'id_kecamatan'  => $data['id_kecamatan'],
            'id_kelurahan'  => $data['id_kelurahan'],
            'username'      => $data['username'],
            'nama_lengkap'  => $data['nama_lengkap'],
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
