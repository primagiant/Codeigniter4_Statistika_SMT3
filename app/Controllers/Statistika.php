<?php

namespace App\Controllers;

class Statistika extends BaseController
{
    // Menampilkan Semua Data
    public function index()
    {
        $Datas = new \App\Models\Datas();
        $data = [
            "title" => "Statistika App",
            "heading" => "Statistika App",
            "breadcumb" => [
                "Statistika",
            ],
        ];

        $data["datas"] = $Datas->getAllData();

        return view("statistika/index", $data);
    }

    // Menampilkan Detail Data
    public function detailData($id)
    {
        $Skor = new \App\Models\Skor();
        $hasil = $Skor->getDataById($id);
        $frekuensiTable = $Skor->getFrekuensiTable($hasil);

        if (!empty($hasil)) {
            $data = [
                "title" => "Detail Data | " . $hasil[0]['nama'],
                "heading" =>  $hasil[0]['nama'],
                "breadcumb" => [
                    "Detail Data",
                    $hasil[0]['nama'],
                ],
                "skor" => $hasil,
                "min" => $Skor->getMinimum($hasil),
                "max" => $Skor->getMaksimum($hasil),
                "rataRata" => $Skor->getRataRata($hasil),
                "frekuensiTable" => $frekuensiTable,
            ];
            return view('statistika/detailData', $data);
        } else {
            $Datas = new \App\Models\Datas();
            $Datas->deleteDataById($id);
            return redirect()->to('/statistika');
        }
    }

    // Tambah Data Pada View Index
    public function tambahData()
    {
        $nama = $this->request->getPost("namaData");
        $nama = rtrim($nama);

        $nilai = $this->request->getPost("nilai");
        $nilai = rtrim($nilai, "\t\n\r\0\x0B,");
        $nilai = explode(',', $nilai);

        foreach ($nilai as $n) {
            if (strlen($n) == 0) {
                unset($nilai[array_search('', $nilai)]);
            }
        }

        $Datas = new \App\Models\Datas();
        $Datas->addData($nama);

        $id = $Datas->getIdByName($nama)[0]['id'];


        $Skor = new \App\Models\Skor();
        $Skor->addMultipleNilai($id, $nilai);

        return redirect()->to("/statistika");
    }

    // Delete data pada view Index
    public function deleteData()
    {
        $id = $this->request->getGet('id');
        $Datas = new \App\Models\Datas();
        $Datas->deleteDataById($id);

        return redirect()->to('/statistika');
    }

    // Update Data pada view index
    public function editData()
    {
        $oldNama = $this->request->getPost('oldNama');
        $newNama = $this->request->getPost('newNama');
        $Datas = new \App\Models\Datas();
        $Datas->editNamaData($oldNama, $newNama);

        return redirect()->to('/statistika');
    }

    // Tambah nilai Pada view Detail Data
    public function tambahNilai()
    {
        $id = $this->request->getGet('id');
        $nilai = $this->request->getPost("nilai");
        $nilai = rtrim($nilai, "\t\n\r\0\x0B,");
        $nilai = explode(',', $nilai);

        foreach ($nilai as $n) {
            if (strlen($n) == 0) {
                unset($nilai[array_search('', $nilai)]);
            }
        }

        $Skor = new \App\Models\Skor();
        $Skor->addMultipleNilai($id, $nilai);

        return redirect()->to('/statistika/detailData/' . $id);
    }

    public function deleteNilai()
    {
        $id = $this->request->getGet('id');
        $datas_id = $this->request->getGet('datas_id');
        $Skor = new \App\Models\Skor();
        $Skor->deleteNilai($id);

        return redirect()->to('/statistika/detailData/' . $datas_id);
    }

    public function editNilai()
    {
        $id = $this->request->getPost('skor_id');
        $datas_id = $this->request->getPost('datas_id');
        $newNilai = $this->request->getPost('newNilai');
        $Skor = new \App\Models\Skor();
        $Skor->editNilai($id, $newNilai);
        return redirect()->to('/statistika/detailData/' . $datas_id);
    }
};
