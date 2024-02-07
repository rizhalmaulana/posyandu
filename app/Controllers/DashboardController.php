<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel;
use App\Models\PosyanduModel;
use App\Models\BalitaModel;
use App\Models\PertanyaanPerkembanganModel;
use App\Models\JawabanPerkembanganModel;
use App\Models\MasterPertanyaanModel;
use App\Models\KunjunganModel;
use App\Controllers\PerkembanganController;

class DashboardController extends ResourceController
{
    use ResponseTrait;
    
    public function index()
    {
        // Load the form helper
        helper('form');
        
        $balitaModel = new BalitaModel();
        $kunjunganModel = new KunjunganModel();
        
        $totalKunjunganPerBulan = $kunjunganModel->getTotalDataKunjunganByMonth();
        $sessIdPosyandu = session()->get('id_posyandu');
        
        $data = [
            'title'             => 'Dashboard Utama | Posyandu Dashboard',
            'totalbalita'       => $balitaModel->getCountBalitaByIdPosyandu($sessIdPosyandu),
            'totalkunjungan'    => $totalKunjunganPerBulan,
            'listBalita'        => $balitaModel->where('id_posyandu', $sessIdPosyandu)->paginate(8, 'tbl_balita'),
            'pager'             => $balitaModel->pager,
            'session'           => session()->get(),
            'status_active_menu'    => 'dashboard',
            'status_active_submenu' => 'monitoring'
        ];
        
        echo view('component/user/header', $data);
        echo view('layout/user/dashboard', $data);
        echo view('component/user/footer');
    }
    
    public function data_balita_view()
    {
        $request = \Config\Services::request();
        
        $balita     = new BalitaModel();
        $posyandu   = new PosyanduModel();
        
        if ($request->isAJAX()) {
            $sessIdPosyandu = session()->get('id_posyandu');
            
            $response = [
                'data' => $balita->getDataBalitaAndPosyandu($sessIdPosyandu),
            ];
            
            // Return a JSON response
            return $this->response->setJSON($response);
        }
        
        $data = [
            'title'     => 'Menu Data Balita | Posyandu Dashboard',
            'session'   => session()->get(),
            'status_active_menu'    => 'masterbalita',
            'status_active_submenu' => 'databalita'
        ];
        
        echo view('component/user/header', $data);
        echo view('layout/user/data_balita_user', $data);
        echo view('component/user/footer');
    }
    
    public function tambah_balita_view()
    {
        helper(['form']);
        
        $posyandu = new PosyanduModel();
        $sessIdPosyandu = session()->get('id_posyandu');
        
        $data = [
            'title'         => 'Menu Tambah Balita | Posyandu Dashboard',
            'posyanduKader' => $posyandu->getDataPosyanduById($sessIdPosyandu),
            'session'       => session()->get(),
            'status_active_menu'    => 'masterbalita',
            'status_active_submenu' => 'tambahbalita'
        ];
        
        echo view('component/user/header', $data);
        echo view('layout/user/tambah_balita_user', $data);
        echo view('component/user/footer');
    }
    
    public function tambah_balita_process()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d');
        $response = [];
        
        // Get post data from the form
        $fullname   = $this->request->getPost('fullname');
        $nik        = $this->request->getPost('nik');
        $kk         = $this->request->getPost('kk');
        $birthday   = $this->request->getPost('tglLahir');
        $ayah       = $this->request->getPost('ayah');
        $ibu        = $this->request->getPost('ibu');
        $alamat     = $this->request->getPost('alamat');
        $gender     = $this->request->getPost('gender');
        $posyandu   = $this->request->getPost('posyandu');
        
        $tanggalLahirObj = new \DateTime($birthday);
        $tanggalSekarang = new \DateTime();
        $umur = $tanggalLahirObj->diff($tanggalSekarang);
        
        // Ambil tahun, bulan, dan hari dari hasil perhitungan umur
        $tahun = $umur->y;
        $bulan = $umur->m;
        $hari = $umur->d;
        
        $validationRules = [
            'nik'       => 'required|numeric|exact_length[16]',
            'kk'        => 'required|numeric|exact_length[16]',  
            'posyandu'  => 'required',
            'gender'    => 'required|in_list[Laki-laki,Perempuan]',
        ];
        
        if ($this->validate($validationRules)) {
            $postData = [
                'id_posyandu'   => $posyandu,
                'nik'           => $nik,
                'nomor_kk'      => $kk,
                'nama_lengkap'  => $fullname,
                'jenis_kelamin' => $gender,
                'tanggal_lahir' => $birthday,
                'nama_ibu'      => $ibu,
                'nama_ayah'     => $ayah,
                'alamat'        => $alamat,
                'created_at'    => $date_now,
                'updated_at'    => $date_now
            ];
            
            $balitaModel = new BalitaModel();
            $balitaModel->insert($postData);
            
            $response = [
                'success' => true,
                'message' => 'Proses Tambah Balita berhasil!',
            ];
        } else {
            $errors = $this->validator->getErrors();
            
            if (!empty($errors)) {
                // Concatenate error messages with <br> tags
                $errorMessages = implode('<br>', $errors);
                // Validation failed, redirect back to the registration form with errors
                $response = [
                    'success' => false,
                    'message' => 'Coba lagi, NIK atau nomor KK minimal 16 angka.',
                ];
            } else {
                // Validation passed
                $response = [
                    'success' => false,
                    'message' => 'Coba lagi, Pastikan semuda data sesuai!',
                ];
            }
            
        }
        
        // Return a JSON response
        return $this->response->setJSON($response);
    }
    
    public function kunjungan_pemeriksaan_view($id = 'null')
    {
        $request = \Config\Services::request();
        
        $balitaModel = new BalitaModel();
        $posyanduModel = new PosyanduModel();
        $masterPertanyaanModel = new MasterPertanyaanModel();
        $kunjunganModel = new KunjunganModel();
        
        $perkembanganController = new PerkembanganController();
        
        $sessIdPosyandu = session()->get('id_posyandu');
        $resultPosyandu = $posyanduModel->getDataPosyanduById($sessIdPosyandu);
        
        $dataBalita = $balitaModel->getBalitaByIdBalita($id);
        $dataPosyandu = $posyanduModel->getDataKotaJoinPosyandu($sessIdPosyandu);
        $masterPertanyaan = $masterPertanyaanModel->getDataPertanyaan();
        $jumlahPertanyaan = $masterPertanyaanModel->getJumlahMasterPertanyaan();
        $dataPertanyaanPerkembangan = $perkembanganController->show_pertanyaan($id);
        $dataJawabanPerkembangan = $perkembanganController->show_all_jawaban($id);
        
        // print_r(json_encode($masterPertanyaan[1]));
        // die;
        
        if ($request->isAJAX()) {
            $response = [
                'data' => $kunjunganModel->getDataKunjunganBalita($id),
            ];
            
            // Return a JSON response
            return $this->response->setJSON($response);
        }
        
        helper(['form']);
        
        // print_r(json_encode($dataJawabanPerkembangan));
        // die;
        
        $data = [
            'title'                 => 'Kunjungan Pemeriksaan | Posyandu Dashboard',
            'umur_bayi_saat_ini'    => $this->hitungUmur($dataBalita->tanggal_lahir),
            'data_balita'           => $dataBalita,
            'data_posyandu'         => $dataPosyandu,
            'master_pertanyaan'     => $masterPertanyaan,
            'jumlah_pertanyaan'     => $jumlahPertanyaan,
            'data_pertanyaan'       => $dataPertanyaanPerkembangan,
            'data_jawaban'          => $dataJawabanPerkembangan,
            'session'               => session()->get(),
            'status_active_menu'    => 'dashboard',
            'status_active_submenu' => 'kunjunganperiksa'
        ];
        
        echo view('component/user/header', $data);
        echo view('layout/user/kunjungan_pemeriksaan_user', $data);
        echo view('component/user/footer');
    }
    
    public function save_data_kunjungan_process()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d');
        $response = [];
        
        // Get post data from the form
        $id_balita          = $this->request->getPost('idBalita');
        $idPertanyaan       = $this->request->getPost('idPertanyaan');
        $idMasterPertanyaan = $this->request->getPost('idMasterPertanyaan');
        $jawaban            = $this->request->getPost('jawaban');
        
        // print_r($jawaban);
        // die;
        
        for ($i = 1; $i <= count($idPertanyaan); $i++) {
            $keyidpertanyaan = "id_pertanyaan" . $i;
            $keymaster = "id_master_pertanyaan" .$i;
            $keypertanyaan = "pertanyaan" .$i;
            
            if ($jawaban[$keypertanyaan] == "Iya") {
                $jawabanInitialize = '1';
            } else {
                $jawabanInitialize = '0';
            }
            
            $postData = [
                'id_balita'             => $id_balita,
                'id_pertanyaan'         => $idPertanyaan[$keyidpertanyaan],
                'id_master_pertanyaan'  => $idMasterPertanyaan[$keymaster],
                'jawaban'               => $jawabanInitialize,
                'created_at'    => $date_now,
                'updated_at'    => $date_now
            ];
            
            $jawabanPerkembangan = new JawabanPerkembanganModel();
            $jawabanPerkembangan->insert($postData);
        }
        
        $response = [
            'success' => true,
            'message' => 'Proses Tambah Kunjungan berhasil!',
        ];
        
        // Return a JSON response
        return $this->response->setJSON($response);
    }
    
    public function get_riwayat_kunjungan() {
        $currentYear = date('yyyy');
        
        $kunjunganModel = new KunjunganModel();
        $response = [
            'list_kunjungan' => $kunjunganModel->getRiwayatPerTahun($currentYear)
        ];
        
        return $this->response->setJSON($response);
    }
    
    public function rekap_pemeriksaan_view()
    {
        helper(['form']);
        
        $data = [
            'title'     => 'Menu Rekap Pemeriksaan | Posyandu Dashboard',
            'session'   => session()->get(),
            'status_active_menu'    => 'masterrekap',
            'status_active_submenu' => 'hasilrekap'
        ];
        
        echo view('component/user/header', $data);
        echo view('layout/user/rekap_pemeriksaan_user', $data);
        echo view('component/user/footer');
    }
    
    public function hitungUmur($tanggalLahir)
    {
        // Konversi tanggal lahir ke objek DateTime
        $tglLahir = new \DateTime($tanggalLahir);
        
        // Dapatkan tanggal hari ini
        $tglHariIni = new \DateTime();
        
        // Hitung selisih waktu (umur)
        $selisih = $tglLahir->diff($tglHariIni);
        
        // Ambil nilai umur dalam format yang diinginkan
        $umurHari = $selisih->days;
        $umurBulan = $selisih->y * 12 + $selisih->m;
        $umurTahun = $selisih->y;
        
        // Tampilkan hasil
        $umurArray = [
            'umur_hari' => $umurHari,
            'umur_bulan' => $umurBulan,
            'umur_tahun' => $umurTahun,
        ];
        
        return $umurArray;
    }
}