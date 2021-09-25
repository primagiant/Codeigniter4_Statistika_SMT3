<?php

namespace App\Controllers;

class Statistika extends BaseController
{

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

    public function detailData($id)
    {
        $Skor = new \App\Models\Skor();
        $hasil = $Skor->getDataById($id);

        $data = [
            "title" => "Detail Data | " . $hasil[0]['nama'],
            "heading" =>  $hasil[0]['nama'],
            "breadcumb" => [
                "Detail Data",
                $hasil[0]['nama'],
            ],
        ];
        $data["skor"] = $hasil;

        return view('statistika/detailData', $data);
    }

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

    public function deleteData()
    {
        $id = $this->request->getGet('id');

        return redirect()->to('/statistika');
    }

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
};
