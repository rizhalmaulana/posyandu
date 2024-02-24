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
use App\Models\PemeriksaanModel;
use App\Models\ImunisasiModel;
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
        $kunjunganAllBalita = $balitaModel->getKunjunganBalita();
        $sessIdPosyandu = session()->get('id_posyandu');

        $data = [
            'title'             => 'Dashboard Utama | Tembang Santri',
            'totalbalita'       => $balitaModel->getCountBalitaByIdPosyandu($sessIdPosyandu),
            'totalkunjungan'    => $totalKunjunganPerBulan,
            'kunjunganBalita'   => $kunjunganAllBalita,
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
            'title'     => 'Menu Data Balita | Tembang Santri',
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
            'title'         => 'Menu Tambah Balita | Tembang Santri',
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
    
    public function ubah_balita_view($id = 'null') 
    {
        $request = \Config\Services::request();
        
        helper(['form']);
        
        $balita     = new BalitaModel();
        $posyandu   = new PosyanduModel();
        
        $data = [
            'title'         => 'Menu Ubah Data Balita | Tembang Santri',
            'data_balita'   => $balita->getBalitaByIdBalita($id),
            'session'       => session()->get(),
            'status_active_menu'    => 'masterbalita',
            'status_active_submenu' => 'databalita'
        ];
        
        echo view('component/user/header', $data);
        echo view('layout/user/ubah_balita_user', $data);
        echo view('component/user/footer');
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
        
        // print_r(json_encode($dataPertanyaanPerkembangan));
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
            'title'                 => 'Kunjungan Pemeriksaan | Tembang Santri',
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
        $jawabanPerkembangan = new JawabanPerkembanganModel();
        
        date_default_timezone_set('Asia/Jakarta');
        $date_now = date('Y-m-d');
        $response = [];
        $status[] = "";
        
        // Get post data from the form
        $id_balita          = $this->request->getPost('idBalita');
        $idPertanyaan       = $this->request->getPost('idPertanyaan');
        $idMasterPertanyaan = $this->request->getPost('idMasterPertanyaan');
        $jawaban            = $this->request->getPost('jawaban');
        
        foreach ($idPertanyaan as $id) {
            $keyidpertanyaan = "id_pertanyaan" . intval($id);
            $keymaster = "id_master_pertanyaan" .intval($id);
            $keypertanyaan = "pertanyaan" .intval($id);
            
            if ($jawaban[$keypertanyaan] == "Iya") {
                $jawabanInitialize = '1';
            } else {
                $jawabanInitialize = '0';
            }
            
            $checkJawabanExist = $jawabanPerkembangan->checkIfJawabanExist($id_balita, intval($id));
            
            if (!empty($checkJawabanExist)) {
                if ($checkJawabanExist->jawaban == "0") {
                    $postData = [
                        'id_balita'             => $id_balita,
                        'id_pertanyaan'         => intval($id),
                        'id_master_pertanyaan'  => $idMasterPertanyaan[$keymaster],
                        'jawaban'               => $jawabanInitialize,
                        'created_at'    => $date_now,
                        'updated_at'    => $date_now
                    ];
                    
                    if ($jawabanPerkembangan->updatedData($id_balita, intval($id), $postData)) {
                        // Replace operation was successful
                        $status = "Berhasil memperbaharui data perkembangan";
                    } else {
                        // Replace operation failed
                        $status = "Gagal memperbaharui data perkembangan";
                    }
                }
            } else {
                $postData = [
                    'id_balita'             => $id_balita,
                    'id_pertanyaan'         => intval($id),
                    'id_master_pertanyaan'  => $idMasterPertanyaan[$keymaster],
                    'jawaban'               => $jawabanInitialize,
                    'created_at'    => $date_now,
                    'updated_at'    => $date_now
                ];
                
                $insert = $jawabanPerkembangan->insert($postData);
                if ($insert) {
                    $status = "Berhasil menyimpan data perkembangan";
                } else {
                    $status = "Gagal menyimpan data perkembangan";
                }
            }
        }
        
        $response = [
            'success' => true,
            'message' => "Hore, Berhasil menyimpan jawaban perkembangan!",
            'status' => $status
        ];
        
        // Return a JSON response
        return $this->response->setJSON($response);
    }
    
    public function save_data_pemeriksaan() 
    {
        $balitaModel    = new BalitaModel();
        $posyanduModel  = new PosyanduModel();

        $imunisasiModel     = new ImunisasiModel();
        $pemeriksaanModel   = new PemeriksaanModel();
        $kunjunganModel     = new KunjunganModel();
        
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID.utf8'); // Set the locale to Indonesian

        $date_now = date('Y-m-d');
        $currentMonthName = strftime('%B');
        $currentYear = date('Y');
        $response = [];

        $idBalita           = $this->request->getPost('idBalita');
        $idPosyandu         = $this->request->getPost('idPosyandu');
        $umurBulan          = $this->request->getPost('umurBulan');
        $tglKunjungan       = $this->request->getPost('tglKunjungan');

        $beratBadanLahir    = $this->request->getPost('beratBadanLahir');
        $panjangBadanLahir  = $this->request->getPost('panjangBadanLahir');
        
        $beratBadanSekarang = $this->request->getPost('beratBadanSekarang');
        $hasilTimbangBB     = "";
        $statusGiziBB       = "";

        $panjangBadanSekarang   = $this->request->getPost('panjangBadanSekarang');
        $hasilTimbangPB     = "";

        $lingkarKepalaSekarang  = $this->request->getPost('lingkarKepalaSekarang');
        $hasilTimbangLK     = "";

        $lingkarLenganSekarang  = $this->request->getPost('lingkarLenganSekarang');
        $hasilTimbangLL     = "";

        $skriningBatuk      = $this->request->getPost('skriningBatuk');
        $skriningDemam      = $this->request->getPost('skriningDemam');
        $skriningBBNaik     = $this->request->getPost('skriningBBNaik');
        $skriningKontakTBC  = $this->request->getPost('skriningKontakTBC');
        $statusSkrining     = $this->request->getPost('statusSkrining');

        $asiEksklusif   = $this->request->getPost('asiEksklusif');
        $mpAsi          = $this->request->getPost('mpAsi');
        $imunisasi      = $this->request->getPost('imunisasi');
        $vitaminA       = $this->request->getPost('vitaminA');
        $obatCacing     = $this->request->getPost('obatCacing');
        $panganLokal    = $this->request->getPost('panganLokal');

        $gejalaSakit    = $this->request->getPost('gejalaSakit');
        $opsiRujukan    = $this->request->getPost('opsiRujukan');

        $imunisasi1     = $this->request->getPost('imunisasi1');
        $imunisasi2     = $this->request->getPost('imunisasi2');
        $imunisasi3     = $this->request->getPost('imunisasi3');
        $imunisasi4     = $this->request->getPost('imunisasi4');
        $imunisasi5     = $this->request->getPost('imunisasi5');
        $imunisasi6     = $this->request->getPost('imunisasi6');
        $imunisasi7     = $this->request->getPost('imunisasi7');
        $imunisasi8     = $this->request->getPost('imunisasi8');
        $imunisasi9     = $this->request->getPost('imunisasi9');
        $imunisasi10    = $this->request->getPost('imunisasi10');
        $imunisasi11    = $this->request->getPost('imunisasi11');
        $imunisasi12    = $this->request->getPost('imunisasi12');
        $imunisasi13    = $this->request->getPost('imunisasi13');
        $imunisasi14    = $this->request->getPost('imunisasi14');
        $imunisasi15    = $this->request->getPost('imunisasi15');
        $imunisasi16    = $this->request->getPost('imunisasi16');
        $imunisasi17    = $this->request->getPost('imunisasi17');
        $imunisasi18    = $this->request->getPost('imunisasi8');
        $imunisasi19    = $this->request->getPost('imunisasi19');
        $imunisasi20    = $this->request->getPost('imunisasi20');

        $postDataPemeriksaan = [
            'id_balita'             => $idBalita,
            'id_posyandu'           => $idPosyandu,
            'berat_badan_lahir'     => $beratBadanLahir,
            'panjang_badan_lahir'   => $panjangBadanLahir,
            'umur_bulan'            => $umurBulan,
            'tanggal_kunjungan'     => $tglKunjungan,
            'berat_badan'           => $beratBadanSekarang,
            'hasil_timbang_berat_badan'     => $hasilTimbangBB,
            'status_gizi_berat_badan'       => $statusGiziBB,
            'panjang_badan'                 => $panjangBadanSekarang,
            'hasil_timbang_panjang_badan'   => $hasilTimbangPB,
            'lingkar_kepala'                => $lingkarKepalaSekarang,
            'hasil_ukur_lingkar_kepala'     => $hasilTimbangLK,
            'lingkar_lengan_atas'           => $lingkarLenganSekarang,
            'hasil_lingkar_lengan_atas'     => $hasilTimbangLL,
            'skrining_tbc_batuk'            => $skriningBatuk,
            'skrining_tbc_demam'            => $skriningDemam,
            'skrining_tbc_bb'               => $skriningBBNaik,
            'skrining_tbc_kontak_erat'      => $skriningKontakTBC,
            'status_skrining'   => $statusSkrining,
            'asi_eksklusif'     => $asiEksklusif,
            'mp_asi'            => $mpAsi,
            'imunisasi'         => $imunisasi,
            'vitamin_a'         => $vitaminA,
            'obat_cacing'       => $obatCacing,
            'mp_pangan_lokal'   => $panganLokal,
            'gejala_sakit'      => $gejalaSakit,
            'rujuk_pustu_puskesmas' => $opsiRujukan,
            'created_at'    => $date_now,
            'updated_at'    => $date_now,
        ];

        $postDataKunjungan = [
            'id_balita'     => $idBalita,
            'tgl_kunjungan' => $tglKunjungan,
            'bulan_kunjungan' => $currentMonthName,
            'tahun_kunjungan' => $currentYear,
            'status_kunjungan' => 'Hadir',
            'created_at'    => $date_now,
            'updated_at'    => $date_now
        ];

        $insert = $pemeriksaanModel->insert($postDataPemeriksaan);

        if ($insert) {
            $idPemeriksaan = $pemeriksaanModel->db->insertID();

            if ($imunisasi) {
                $postDataImunisasi = [
                    'id_pemeriksaan'        => $idPemeriksaan,
                    'id_balita'             => $idBalita,
                    'id_posyandu'           => $idPosyandu,
                    'vaksin_hepatitis_b'    => $imunisasi1,
                    'vaksin_bcg'            => $imunisasi2,
                    'vaksin_polio_tetes_1'  => $imunisasi3,
                    'vaksin_dpt_hb_1'       => $imunisasi4,
                    'vaksin_polio_tetes_2'  => $imunisasi5,
                    'vaksin_rota_virus_1'   => $imunisasi6,
                    'vaksin_pcv_1'          => $imunisasi7,
                    'vaksin_dpt_hb_2'       => $imunisasi8,
                    'vaksin_polio_tetes_3'  => $imunisasi9,
                    'vaksin_rota_virus_2'   => $imunisasi10,
                    'vaksin_pcv_2'          => $imunisasi11,
                    'vaksin_dpt_hb_3'       => $imunisasi12,
                    'vaksin_polio_tetes_4'  => $imunisasi13,
                    'vaksin_polio_suntik_1' => $imunisasi14,
                    'vaksin_rota_virus_3'   => $imunisasi15,
                    'vaksin_campak_rubella' => $imunisasi16,
                    'vaksin_polio_suntik_2' => $imunisasi17,
                    'vaksin_pcv_3'          => $imunisasi18,
                    'vaksin_dpt_hb_lanjutan'          => $imunisasi19, 
                    'vaksin_campak_rubella_lanjutan'  => $imunisasi20,
                    'created_at'    => $date_now,
                    'updated_at'    => $date_now
                ];

                $insertImunisasi = $imunisasiModel->insert($postDataImunisasi);

                if ($insertImunisasi) {        
                    $insertKunjungan = $kunjunganModel->insert($postDataKunjungan);
        
                    if ($insertKunjungan) {
                        $response = [
                            'success' => true,
                            'message' => "Berhasil, Semua data pemeriksaan berhasil di simpan!",
                        ];
                    }
                } else {
                    $insertKunjungan = $kunjunganModel->insert($postDataKunjungan);
        
                    if ($insertKunjungan) {
                        $response = [
                            'success' => true,
                            'message' => "Berhasil, Data pemeriksaan dan kunjungan berhasil di simpan!",
                            'info'    => "Fase Insert Imunisasi Gagal!"
                        ];
                    }
                }
            }
        } else {
            $response = [
                'success' => true,
                'message' => "Maaf, Data pemeriksaan perkembangan gagal di simpan!",
            ];
        }
        
        // Return a JSON response
        return $this->response->setJSON($response);
    }

    public function get_riwayat_kunjungan($idBalita) 
    {
        date_default_timezone_set('Asia/Jakarta');
        $currentYear = date('Y');
        
        $balitaModel = new BalitaModel();
        $kunjunganModel = new KunjunganModel();

        if ($request->isAJAX()) {
            $response = [
                'data' => $kunjunganModel->getRiwayatKunjunganBalita($idBalita),
            ];
            
            // Return a JSON response
            return $this->response->setJSON($response);
        }
    }

    public function get_riwayat_kunjungan_chart() 
    {
        date_default_timezone_set('Asia/Jakarta');
        $currentYear = date('Y');
        
        $balitaModel = new BalitaModel();
        $kunjunganModel = new KunjunganModel();

        $sessIdPosyandu = session()->get('id_posyandu');

        $resultBayiPerYear = $balitaModel->getTotalDataBalitaPerMonthOfYear($currentYear, $sessIdPosyandu);
        $resultKunjunganPerYear = $kunjunganModel->getTotalKunjunganPerMonthOfYear($currentYear, $sessIdPosyandu);

        $response = [
            'list_terdaftar'    => $resultBayiPerYear,
            'list_tercatat'     => $resultKunjunganPerYear,
        ];
        
        return $this->response->setJSON($response);
    }
    
    public function rekap_pemeriksaan_view()
    {
        helper(['form']);
        
        $data = [
            'title'     => 'Menu Rekap Pemeriksaan | Tembang Santri',
            'session'   => session()->get(),
            'status_active_menu'    => 'masterrekap',
            'status_active_submenu' => 'hasilrekap'
        ];
        
        echo view('component/user/header', $data);
        echo view('layout/user/rekap_pemeriksaan_user', $data);
        echo view('component/user/footer');
    }

    public function data_kms_balita_view($idBalita = "")
    {
        helper(['form']);
        
        $balitaModel = new BalitaModel();
        $kunjunganModel = new KunjunganModel();
        $pemeriksaanModel = new PemeriksaanModel();

        $idPosyandu = session()->get('id_posyandu');

        
        $listDataBalita = $balitaModel->getBalitaByIdBalita($idBalita);
        $listRiwayatKunjunganBalita = $kunjunganModel->getRiwayatKunjunganBalita($idBalita);
        $listPemeriksaanBalita = $pemeriksaanModel->getListPemeriksaanByIdBalita($idBalita, $idPosyandu);

        $data = [
            'title'     => 'Menu KMS Balita | Tembang Santri',
            'session'   => session()->get(),
            'list_data_balita'      => $listDataBalita,
            'umur_balita_saat_ini'  => $this->hitungUmur($listDataBalita->tanggal_lahir),
            'list_riwayat_kunjungan'    => $listRiwayatKunjunganBalita,
            'list_pemeriksaan'          => $listPemeriksaanBalita,
            'status_active_menu'    => 'masterbalita',
            'status_active_submenu' => 'databalita'
        ];
        
        echo view('component/user/header', $data);
        echo view('layout/user/kms_balita_user', $data);
        echo view('component/user/footer');
    }
    
    public function profile($id = "") {
        helper(['form']);
        
        $adminModel = new AdminModel();
        $posyanduModel = new PosyanduModel();

        $idPosyandu = session()->get('id_posyandu');
        
        $data = [
            'title'     => 'Profile Ku | Tembang Santri',
            'session'   => session()->get(),
            'status_active_menu'    => 'dashboard',
            'status_active_submenu' => 'monitoring'
        ];
        
        echo view('component/user/header', $data);
        echo view('layout/user/profile', $data);
        echo view('component/user/footer');
    }

    public function hitungUmur($tanggalLahir)
    {
        // Konversi tanggal lahir ke objek DateTime
        $tglLahir = new \DateTime($tanggalLahir);
        
        // Dapatkan tanggal hari ini
        $sekarang = new \DateTime();
        
        // Hitung selisih waktu (umur)
        $selisih = $tglLahir->diff($sekarang);
        
        // Ambil nilai umur dalam format yang diinginkan
        $tahun = $selisih->y;
        $bulan = $selisih->m;
        $hari = $selisih->d;

        // Tampilkan hasil
        $umurArray = [
            'umur_hari' => $hari,
            'umur_bulan' => $bulan,
            'umur_tahun' => $tahun,
        ];
        
        return $umurArray;
    }
}