<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PertanyaanPerkembanganModel;
use App\Models\JawabanPerkembanganModel;
use App\Models\MasterPertanyaanModel;
use App\Models\BalitaModel;

class PerkembanganController extends BaseController
{

    public function show_pertanyaan($id_balita ='null') {
        $pertanyaanPerkembanganModel = new PertanyaanPerkembanganModel();
        $balita = new BalitaModel();
        
        // Load the form helper
        helper('form');
        
        $range = null;
        
        $data_bayi = $balita->getBalitaByIdBalita($id_balita);
        $tanggal_lahir_bayi = $data_bayi->tanggal_lahir;
        
        $tglLahir = new \DateTime($tanggal_lahir_bayi);
        $tglHariIni = new \DateTime();
        
        $selisih = $tglLahir->diff($tglHariIni);
        
        // Ambil nilai umur dalam format yang diinginkan
        $umurHari = $selisih->days;
        $umurBulan = $selisih->y * 12 + $selisih->m;
        $umurTahun = $selisih->y;
        
        if ($umurHari <= 91 && $umurBulan <= 3 && $umurTahun <= 0) {
            $fieldValuePairs = [
                ['field' => 'range_usia', 'value' => '29 Hari - 3 Bulan'],
            ];
            
        } else if ($umurHari <= 182 && $umurBulan > 3 || $umurBulan <= 6 && $umurTahun <= 0) {
            $fieldValuePairs = [
                ['field' => 'range_usia', 'value' => '29 Hari - 3 Bulan'],
                ['field' => 'range_usia', 'value' => '3 - 6 Bulan'],
            ];
        } else if ($umurHari <= 273 && $umurBulan > 6 || $umurBulan <= 9 && $umurTahun <= 0) {
            $fieldValuePairs = [
                ['field' => 'range_usia', 'value' => '29 Hari - 3 Bulan'],
                ['field' => 'range_usia', 'value' => '3 - 6 Bulan'],
                ['field' => 'range_usia', 'value' => '6 - 9 Bulan'],
            ];
        } else if ($umurHari <= 365 && $umurBulan > 9 || $umurBulan <= 12) {
            $fieldValuePairs = [
                ['field' => 'range_usia', 'value' => '29 Hari - 3 Bulan'],
                ['field' => 'range_usia', 'value' => '3 - 6 Bulan'],
                ['field' => 'range_usia', 'value' => '6 - 9 Bulan'],
                ['field' => 'range_usia', 'value' => '9 - 12 Bulan'],
            ];
        } else if ($umurHari <= 547 && $umurBulan > 12 || $umurBulan <= 18 && $umurTahun == 1) {
            $fieldValuePairs = [
                ['field' => 'range_usia', 'value' => '29 Hari - 3 Bulan'],
                ['field' => 'range_usia', 'value' => '3 - 6 Bulan'],
                ['field' => 'range_usia', 'value' => '6 - 9 Bulan'],
                ['field' => 'range_usia', 'value' => '9 - 12 Bulan'],
                ['field' => 'range_usia', 'value' => '12 - 18 Bulan'],
            ];
        } else if ($umurHari <= 730 && $umurBulan > 18 || $umurBulan <= 24 && $umurTahun >= 1 || $umurTahun <= 2) {
            $fieldValuePairs = [
                ['field' => 'range_usia', 'value' => '29 Hari - 3 Bulan'],
                ['field' => 'range_usia', 'value' => '3 - 6 Bulan'],
                ['field' => 'range_usia', 'value' => '6 - 9 Bulan'],
                ['field' => 'range_usia', 'value' => '9 - 12 Bulan'],
                ['field' => 'range_usia', 'value' => '12 - 18 Bulan'],
                ['field' => 'range_usia', 'value' => '18 - 24 Bulan'],
            ];
        } else if ($umurHari >= 730 && $umurBulan >= 24 && $umurTahun >= 2 || $umurHari <= 1095 && $umurBulan <= 36 && $umurTahun <= 3) {
            $fieldValuePairs = [
                ['field' => 'range_usia', 'value' => '29 Hari - 3 Bulan'],
                ['field' => 'range_usia', 'value' => '3 - 6 Bulan'],
                ['field' => 'range_usia', 'value' => '6 - 9 Bulan'],
                ['field' => 'range_usia', 'value' => '9 - 12 Bulan'],
                ['field' => 'range_usia', 'value' => '12 - 18 Bulan'],
                ['field' => 'range_usia', 'value' => '18 - 24 Bulan'],
                ['field' => 'range_usia', 'value' => '2 - 3 Tahun'],
            ];
        } else if ($umurHari >= 1095 && $umurBulan >= 36 && $umurTahun >= 3 || $umurHari <= 1460 && $umurBulan <= 48 && $umurTahun <= 4) {
            $fieldValuePairs = [
                ['field' => 'range_usia', 'value' => '29 Hari - 3 Bulan'],
                ['field' => 'range_usia', 'value' => '3 - 6 Bulan'],
                ['field' => 'range_usia', 'value' => '6 - 9 Bulan'],
                ['field' => 'range_usia', 'value' => '9 - 12 Bulan'],
                ['field' => 'range_usia', 'value' => '12 - 18 Bulan'],
                ['field' => 'range_usia', 'value' => '18 - 24 Bulan'],
                ['field' => 'range_usia', 'value' => '2 - 3 Tahun'],
                ['field' => 'range_usia', 'value' => '3 - 4 Tahun'],
            ];
        } else if ($umurHari >= 1460 && $umurBulan >= 48 && $umurTahun >= 4 || $umurHari <= 1825 && $umurBulan <= 60 && $umurTahun <= 5) {
            $fieldValuePairs = [
                ['field' => 'range_usia', 'value' => '29 Hari - 3 Bulan'],
                ['field' => 'range_usia', 'value' => '3 - 6 Bulan'],
                ['field' => 'range_usia', 'value' => '6 - 9 Bulan'],
                ['field' => 'range_usia', 'value' => '9 - 12 Bulan'],
                ['field' => 'range_usia', 'value' => '12 - 18 Bulan'],
                ['field' => 'range_usia', 'value' => '18 - 24 Bulan'],
                ['field' => 'range_usia', 'value' => '2 - 3 Tahun'],
                ['field' => 'range_usia', 'value' => '3 - 4 Tahun'],
                ['field' => 'range_usia', 'value' => '4 - 5 Tahun'],
            ];
        } else {
            $fieldValuePairs = null;
        }

        $resultGetPertanyaan = $pertanyaanPerkembanganModel->getPertanyaanByRangeUsia($fieldValuePairs);
        $groupedPertanyaanByIdMaster = [];

        // Iterate over the response data
        foreach ($resultGetPertanyaan as $item) {
            $idMasterPertanyaan = 'master_pertanyaan' . $item['id_master_pertanyaan'];
            
            // Check if the key for the current id_master_pertanyaan exists in the grouped data
            if (!array_key_exists($idMasterPertanyaan, $groupedPertanyaanByIdMaster)) {
                // If not, initialize an empty array for that key
                $groupedPertanyaanByIdMaster[$idMasterPertanyaan] = [];
            }
            
            // Append the current item to the array corresponding to its id_master_pertanyaan
            $groupedPertanyaanByIdMaster[$idMasterPertanyaan][] = $item;
        }

        // $result = ['result' => array_values($groupedPertanyaanByIdMaster)];

        // $string = 'master_pertanyaan' . 2;
        // print_r(json_encode($groupedPertanyaanByIdMaster[$string]));
        // die;

        $data = [
            'success' => true,
            'pertanyaan' => $groupedPertanyaanByIdMaster,
        ];
        
        return $data;
    }
    
    public function show_all_jawaban($id_balita ='null')
    {
        $jawabanPerkembanganModel = new JawabanPerkembanganModel();
        $masterPertanyaanModel = new MasterPertanyaanModel();
        $balita = new BalitaModel();

        $data_bayi = $balita->getBalitaByIdBalita($id_balita);
        $tanggal_lahir_bayi = $data_bayi->tanggal_lahir;
        
        $tglLahir = new \DateTime($tanggal_lahir_bayi);
        $tglHariIni = new \DateTime();
        
        $selisih = $tglLahir->diff($tglHariIni);
        
        // Ambil nilai umur dalam format yang diinginkan
        $umurHari = $selisih->days;
        $umurBulan = $selisih->y * 12 + $selisih->m;
        $umurTahun = $selisih->y;

        $getJawabanByIdBalita = $jawabanPerkembanganModel->getJawabanByIdMasterPertanyaan($id_balita, 1);
        $getJawabanByIdBalita2 = $jawabanPerkembanganModel->getJawabanByIdMasterPertanyaan($id_balita, 2);
        $getJawabanByIdBalita3 = $jawabanPerkembanganModel->getJawabanByIdMasterPertanyaan($id_balita, 3);
        $getJawabanByIdBalita4 = $jawabanPerkembanganModel->getJawabanByIdMasterPertanyaan($id_balita, 4);
        $getJawabanByIdBalita5 = $jawabanPerkembanganModel->getJawabanByIdMasterPertanyaan($id_balita, 5);
        $getJawabanByIdBalita6 = $jawabanPerkembanganModel->getJawabanByIdMasterPertanyaan($id_balita, 6);
        $getJawabanByIdBalita7 = $jawabanPerkembanganModel->getJawabanByIdMasterPertanyaan($id_balita, 7);
        $getJawabanByIdBalita8 = $jawabanPerkembanganModel->getJawabanByIdMasterPertanyaan($id_balita, 8);
        $getJawabanByIdBalita9 = $jawabanPerkembanganModel->getJawabanByIdMasterPertanyaan($id_balita, 9);

        $getTotalMasterPertanyaan = $masterPertanyaanModel->getTotalPertanyaanById(1);
        $getTotalMasterPertanyaan2 = $masterPertanyaanModel->getTotalPertanyaanById(2);
        $getTotalMasterPertanyaan3 = $masterPertanyaanModel->getTotalPertanyaanById(3);
        $getTotalMasterPertanyaan4 = $masterPertanyaanModel->getTotalPertanyaanById(4);
        $getTotalMasterPertanyaan5 = $masterPertanyaanModel->getTotalPertanyaanById(5);
        $getTotalMasterPertanyaan6 = $masterPertanyaanModel->getTotalPertanyaanById(6);
        $getTotalMasterPertanyaan7 = $masterPertanyaanModel->getTotalPertanyaanById(7);
        $getTotalMasterPertanyaan8 = $masterPertanyaanModel->getTotalPertanyaanById(8);
        $getTotalMasterPertanyaan9 = $masterPertanyaanModel->getTotalPertanyaanById(9);

        $getJawaban = $jawabanPerkembanganModel->getAllJawaban($id_balita, 1);
        $getJawaban2 = $jawabanPerkembanganModel->getAllJawaban($id_balita, 2);
        $getJawaban3 = $jawabanPerkembanganModel->getAllJawaban($id_balita, 3);
        $getJawaban4 = $jawabanPerkembanganModel->getAllJawaban($id_balita, 4);
        $getJawaban5 = $jawabanPerkembanganModel->getAllJawaban($id_balita, 5);
        $getJawaban6 = $jawabanPerkembanganModel->getAllJawaban($id_balita, 6);
        $getJawaban7 = $jawabanPerkembanganModel->getAllJawaban($id_balita, 7);
        $getJawaban8 = $jawabanPerkembanganModel->getAllJawaban($id_balita, 8);
        $getJawaban9 = $jawabanPerkembanganModel->getAllJawaban($id_balita, 9);
        
        $statusAkses = "";
        $statusAkses2 = "";
        $statusAkses3 = "";
        $statusAkses4 = "";
        $statusAkses5 = "";
        $statusAkses6 = "";
        $statusAkses7 = "";
        $statusAkses8 = "";
        $statusAkses9 = "";

        // print_r(json_encode($getJawabanByIdBalita));
        // die;

        if ($getJawabanByIdBalita->jawaban <= 0) {
            $totalJawaban = $getTotalMasterPertanyaan->total_pertanyaan - $getJawabanByIdBalita->jawaban;
            $statusPertanyaan = "Belum Diisi";

            if ($umurHari >= 29 && $umurBulan <= 3) {
                $statusAkses = "primary";
            } else {
                $statusAkses = "secondary";
            }

        } else if ($getTotalMasterPertanyaan->total_pertanyaan > $getJawabanByIdBalita->jawaban) {
            $totalJawaban = $getTotalMasterPertanyaan->total_pertanyaan - $getJawabanByIdBalita->jawaban;
            $statusPertanyaan = "Tidak Lengkap";
        } else  {
            $totalJawaban = 0;
            $statusPertanyaan = "Lengkap";
        }

        if ($getJawabanByIdBalita2->jawaban <= 0) {
            $totalJawaban2 = $getTotalMasterPertanyaan2->total_pertanyaan - $getJawabanByIdBalita2->jawaban;
            $statusPertanyaan2 = "Belum Diisi";

            if ($umurBulan >= 3 && $umurBulan <= 6) {
                $statusAkses2 = "primary";
            } else {
                $statusAkses2 = "secondary";
            }
        } else if ($getTotalMasterPertanyaan2->total_pertanyaan > $getJawabanByIdBalita2->jawaban) {
            $totalJawaban2 = $getTotalMasterPertanyaan2->total_pertanyaan - $getJawabanByIdBalita2->jawaban;
            $statusPertanyaan2 = "Tidak Lengkap";

        } else {
            $totalJawaban2 = 0;
            $statusPertanyaan2 = "Lengkap";
        }

        if ($getJawabanByIdBalita3->jawaban <= 0) {
            $totalJawaban3 = $getTotalMasterPertanyaan3->total_pertanyaan - $getJawabanByIdBalita3->jawaban;
            $statusPertanyaan3 = "Belum Diisi";

            if ($umurBulan >= 6 && $umurBulan <= 9) {
                $statusAkses3 = "primary";
            } else {
                $statusAkses3 = "secondary";
            }
        } else if ($getTotalMasterPertanyaan3->total_pertanyaan > $getJawabanByIdBalita3->jawaban) {
            $totalJawaban3 = $getTotalMasterPertanyaan3->total_pertanyaan - $getJawabanByIdBalita3->jawaban;
            $statusPertanyaan3 = "Tidak Lengkap";

        } else {
            $totalJawaban3 = 0;
            $statusPertanyaan3 = "Lengkap";
        }

        if ($getJawabanByIdBalita4->jawaban <= 0) {
            $totalJawaban4 = $getTotalMasterPertanyaan4->total_pertanyaan - $getJawabanByIdBalita4->jawaban;
            $statusPertanyaan4 = "Belum Diisi";

            if ($umurBulan >= 9 && $umurBulan <= 12) {
                $statusAkses4 = "primary";
            } else {
                $statusAkses4 = "secondary";
            }
        } else if ($getTotalMasterPertanyaan4->total_pertanyaan > $getJawabanByIdBalita4->jawaban) {
            $totalJawaban4 = $getTotalMasterPertanyaan4->total_pertanyaan - $getJawabanByIdBalita4->jawaban;
            $statusPertanyaan4 = "Tidak Lengkap";

        } else {
            $totalJawaban4 = 0;
            $statusPertanyaan4 = "Lengkap";
        }

        if ($getJawabanByIdBalita5->jawaban <= 0) {
            $totalJawaban5 = $getTotalMasterPertanyaan5->total_pertanyaan - $getJawabanByIdBalita5->jawaban;
            $statusPertanyaan5 = "Belum Diisi";

            if ($umurBulan >= 12 && $umurBulan <= 18) {
                $statusAkses5 = "primary";
            } else {
                $statusAkses5 = "secondary";
            }
        } else if ($getTotalMasterPertanyaan5->total_pertanyaan > $getJawabanByIdBalita5->jawaban) {
            $totalJawaban5 = $getTotalMasterPertanyaan5->total_pertanyaan - $getJawabanByIdBalita5->jawaban;
            $statusPertanyaan5 = "Tidak Lengkap";

        } else {
            $totalJawaban5 = 0;
            $statusPertanyaan5 = "Lengkap";
        }

        if ($getJawabanByIdBalita6->jawaban <= 0) {
            $totalJawaban6 = $getTotalMasterPertanyaan6->total_pertanyaan - $getJawabanByIdBalita6->jawaban;
            $statusPertanyaan6 = "Belum Diisi";

            if ($umurBulan >= 18 && $umurBulan <= 24) {
                $statusAkses6 = "primary";
            } else {
                $statusAkses6 = "secondary";
            }
        } else if ($getTotalMasterPertanyaan6->total_pertanyaan > $getJawabanByIdBalita6->jawaban) {
            $totalJawaban6 = $getTotalMasterPertanyaan6->total_pertanyaan - $getJawabanByIdBalita6->jawaban;
            $statusPertanyaan6 = "Tidak Lengkap";

        } else {
            $totalJawaban6 = 0;
            $statusPertanyaan6 = "Lengkap";
        }

        if ($getJawabanByIdBalita7->jawaban <= 0) {
            $totalJawaban7 = $getTotalMasterPertanyaan7->total_pertanyaan - $getJawabanByIdBalita7->jawaban;
            $statusPertanyaan7 = "Belum Diisi";

            if ($umurTahun >= 2 && $umurBulan <= 3) {
                $statusAkses7 = "primary";
            } else {
                $statusAkses7 = "secondary";
            }
        } else if ($getTotalMasterPertanyaan7->total_pertanyaan > $getJawabanByIdBalita7->jawaban) {
            $totalJawaban7 = $getTotalMasterPertanyaan7->total_pertanyaan - $getJawabanByIdBalita7->jawaban;
            $statusPertanyaan7 = "Tidak Lengkap";

        } else {
            $totalJawaban7 = 0;
            $statusPertanyaan7 = "Lengkap";
        }

        if ($getJawabanByIdBalita8->jawaban <= 0) {
            $totalJawaban8 = $getTotalMasterPertanyaan8->total_pertanyaan - $getJawabanByIdBalita8->jawaban;
            $statusPertanyaan8 = "Belum Diisi";

            if ($umurTahun >= 3 && $umurBulan <= 4) {
                $statusAkses8 = "primary";
            } else {
                $statusAkses8 = "secondary";
            }
        } else if ($getTotalMasterPertanyaan8->total_pertanyaan > $getJawabanByIdBalita8->jawaban) {
            $totalJawaban8 = $getTotalMasterPertanyaan8->total_pertanyaan - $getJawabanByIdBalita8->jawaban;
            $statusPertanyaan8 = "Tidak Lengkap";

        } else {
            $totalJawaban8 = 0;
            $statusPertanyaan8 = "Lengkap";
        }

        if ($getJawabanByIdBalita9->jawaban <= 0) {
            $totalJawaban9 = $getTotalMasterPertanyaan9->total_pertanyaan - $getJawabanByIdBalita9->jawaban;
            $statusPertanyaan9 = "Belum Diisi";

            if ($umurTahun >= 4 && $umurBulan <= 5) {
                $statusAkses9 = "primary";
            } else {
                $statusAkses9 = "secondary";
            }
        } else if ($getTotalMasterPertanyaan9->total_pertanyaan > $getJawabanByIdBalita9->jawaban) {
            $totalJawaban9 = $getTotalMasterPertanyaan9->total_pertanyaan - $getJawabanByIdBalita9->jawaban;
            $statusPertanyaan9 = "Tidak Lengkap";

        } else {
            $totalJawaban9 = 0;
            $statusPertanyaan9 = "Lengkap";
        }

        $arrayJawabanPertanyaan1 = [
            'total_pertanyaan_belum_dijawab' => $totalJawaban,
            'status_jawaban' => $statusPertanyaan,
            'status_akses' => $statusAkses,
            'list_jawaban' => $getJawaban
        ];

        $arrayJawabanPertanyaan2 = [
            'total_pertanyaan_belum_dijawab' => $totalJawaban2,
            'status_jawaban' => $statusPertanyaan2,
            'status_akses' => $statusAkses2,
            'list_jawaban' => $getJawaban2
        ];

        $arrayJawabanPertanyaan3 = [
            'total_pertanyaan_belum_dijawab' => $totalJawaban3,
            'status_jawaban' => $statusPertanyaan3,
            'status_akses' => $statusAkses3,
            'list_jawaban' => $getJawaban3
        ];

        $arrayJawabanPertanyaan4 = [
            'total_pertanyaan_belum_dijawab' => $totalJawaban4,
            'status_jawaban' => $statusPertanyaan4,
            'status_akses' => $statusAkses4,
            'list_jawaban' => $getJawaban4
        ];

        $arrayJawabanPertanyaan5 = [
            'total_pertanyaan_belum_dijawab' => $totalJawaban5,
            'status_jawaban' => $statusPertanyaan5,
            'status_akses' => $statusAkses5  ,
            'list_jawaban' => $getJawaban5
        ];

        $arrayJawabanPertanyaan6 = [
            'total_pertanyaan_belum_dijawab' => $totalJawaban6,
            'status_jawaban' => $statusPertanyaan6,
            'status_akses' => $statusAkses6,
            'list_jawaban' => $getJawaban6
        ];

        $arrayJawabanPertanyaan7 = [
            'total_pertanyaan_belum_dijawab' => $totalJawaban7,
            'status_jawaban' => $statusPertanyaan7,
            'status_akses' => $statusAkses7,
            'list_jawaban' => $getJawaban7
        ];

        $arrayJawabanPertanyaan8 = [
            'total_pertanyaan_belum_dijawab' => $totalJawaban8,
            'status_jawaban' => $statusPertanyaan8,
            'status_akses' => $statusAkses8,
            'list_jawaban' => $getJawaban8
        ];

        $arrayJawabanPertanyaan9 = [
            'total_pertanyaan_belum_dijawab' => $totalJawaban9,
            'status_jawaban' => $statusPertanyaan9,
            'status_akses' => $statusAkses9,
            'list_jawaban' => $getJawaban9
        ];
        
        // Load the form helper
        helper('form');
        
        $data = [
            $arrayJawabanPertanyaan1,
            $arrayJawabanPertanyaan2,
            $arrayJawabanPertanyaan3,
            $arrayJawabanPertanyaan4,
            $arrayJawabanPertanyaan5,
            $arrayJawabanPertanyaan6,
            $arrayJawabanPertanyaan7,
            $arrayJawabanPertanyaan8,
            $arrayJawabanPertanyaan9,
        ];

        return $data;
    }
}