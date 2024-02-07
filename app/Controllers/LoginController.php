<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\AdminModel;
use App\Models\KotaModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\PosyanduModel;

class LoginController extends ResourceController
{
    use ResponseTrait;
    
    public function login()
    {
        // Load the form helper
        helper(['form']);
        
        $data = [
            'title' => 'Login | Posyandu Dashboard'
        ];
        
        echo view('component/authentication/header', $data);
        echo view('authentication/login');
        echo view('component/authentication/footer');
    }

    public function auth_process() 
    {
        // Retrieve user input
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        // Authenticate the user
        if ($this->validateCredentials($username, $password)) {
            // Login successful
            // Redirect to a secure page after successful login
            $this->setUserSession($username);

            // Set Routes With Status
            $status = session()->get('status');
            switch ($status) {
                case 'Master Admin':
                    return redirect()->to('/master-dashboard');
                case 'Admin':
                    return redirect()->to('/admin-dashboard');
                case 'User':
                    return redirect()->to('/dashboard');
                default:
                    // Handle default case or unauthorized access
                    return redirect()->to('/dashboard');
            }

        } else {
            // Login failed
            $session->setFlashdata('msg', 'Email atau password anda salah.');   
            return redirect()->to('/login');
        }
    }

    public function registration()
    {
        helper(['form']);
        
        $data = [
            'title' => 'Registrasi Akun | Posyandu Dashboard'
        ];
        
        $kotaModel = new KotaModel();
        $data['listKota'] = $kotaModel->findAll();
        
        echo view('component/authentication/registrasi/regristration_header', $data);
        echo view('authentication/registration', $data);
        echo view('component/authentication/registrasi/regristration_footer', $data);
    }

    public function registration_process()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d');
        $response = [];
        
        // Get post data from the form
        $firstName = $this->request->getPost('firstname');
        $lastName = $this->request->getPost('lastname');
        $mergedString = $firstName . " " . $lastName;
        
        $validationRules = [
            'posyandu' => 'required',
            'gender' => 'required|in_list[Laki-laki,Perempuan]',
            'city' => 'required',
        ];
        
        if ($this->validate($validationRules)) {
            $postData = [
                'id_posyandu'   => $this->request->getPost('posyandu'),
                'id_kota'       => $this->request->getPost('city'),
                'id_kecamatan'  => $this->request->getPost('kecamatan'),
                'id_kelurahan'  => $this->request->getPost('kelurahan'),
                'username'      => $this->request->getPost('username'),
                'nama_lengkap'  => $mergedString,
                'jenis_kelamin' => $this->request->getPost('gender'),
                'tanggal_lahir' => $date_now,
                'verified'      => 1,
                'alamat'        => $this->request->getPost('address'),
                'password'      => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'status'        => $this->request->getPost('status'),
                'admin_selfie'  => "",
                'created_at'    => $date_now,
                'updated_at'    => $date_now
            ];
            
            $adminModel = new AdminModel();
            $adminModel->insert($postData);

            $response = [
                'success' => true,
                'message' => 'Proses Registrasi berhasil!',
            ];
        } else {
            $errors = $this->validator->getErrors();
            // Validation failed, redirect back to the registration form with errors
            $response = [
                'success' => false,
                'message' => 'Coba lagi, pastikan data sudah diisi semua!',
            ];
        }
        
        // Return a JSON response
        return $this->response->setJSON($response);
        
    }

    public function kecamatan_process()
    {
        $kecamatanModel = new KecamatanModel();
        $response = [];

        $getIdKota = $this->request->getPost('idKota');
        $resultData = $kecamatanModel->getDataKecamatan($getIdKota);

        if (isset($resultData)) {
            $response = [
                'success' => true,
                'idKota' => $getIdKota,
                'message' => 'Berhasil mendapatkan data kecamatan',
                'data' => $resultData
            ];
        } else {
            $response = [
                'success' => false,
                'idKecamatan' => $getIdKecamatan,
                'message' => 'Gagal mendapatkan data kecamatan',
                'data' => ''
            ];
        }

        return $this->response->setJSON($response);
    }

    public function kelurahan_process()
    {
        $kelurahanModel = new KelurahanModel();
        $response = [];

        $getIdKecamatan = $this->request->getPost('idKecamatan');
        $resultData = $kelurahanModel->getDataKelurahan($getIdKecamatan);

        if (isset($resultData)) {
            $response = [
                'success' => true,
                'idKecamatan' => $getIdKecamatan,
                'message' => 'Berhasil mendapatkan data kelurahan',
                'data' => $resultData
            ];
        } else {
            $response = [
                'success' => false,
                'idKecamatan' => $getIdKecamatan,
                'message' => 'Gagal mendapatkan data kelurahan',
                'data' => ''
            ];
        }

        return $this->response->setJSON($response);
    }

    public function posyandu_process()
    {
        $posyanduModel = new PosyanduModel();
        $response = [];

        $getIdKota      = $this->request->getPost('idKota');
        $getIdKecamatan = $this->request->getPost('idKecamatan');
        $getIdKelurahan = $this->request->getPost('idKelurahan');

        $resultData = $posyanduModel->getDataPosyandu($getIdKota, $getIdKecamatan, $getIdKelurahan);

        if (isset($resultData) && !empty($resultData)) {
            $response = [
                'success' => true,
                'message' => 'Berhasil mendapatkan data posyandu',
                'data' => $resultData
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Posyandu tidak tersedia',
                'data' => 'tidak tersedia'
            ];
        }

        return $this->response->setJSON($response);
    }
    
    private function setUserSession($username)
    {
        // Get user data from the database based on the username
        $adminModel = new AdminModel();
        $data = $adminModel->where('username', $username)->first();

        // Set user session
        $authSession = new SessionController();
        $authSession->authorised($data);
    }
    
    private function validateCredentials($username, $password)
    {
        // Use your user model to check if the credentials are valid
        $adminModel = new AdminModel();
        $admin = $adminModel->where('username', $username)->first();
        
        if ($admin && password_verify($password, $admin['password'])) {
            // Valid credentials
            return true;
        }
        
        // Invalid credentials
        return false;
    }
    
    public function logout()
    {
        // Destroy the user session
        session()->destroy();

        // Redirect to the login page or any other page
        return redirect()->to('login');
    }
}