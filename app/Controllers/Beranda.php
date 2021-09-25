<?php

namespace App\Controllers;

class Beranda extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Beranda",
            "heading" => "Beranda",
            "breadcumb" => [
                "Beranda",
            ],
        ];
        return view('beranda/index', $data);
    }
}
