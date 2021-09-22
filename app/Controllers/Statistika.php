<?php

namespace App\Controllers;

class Statistika extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Statistika App",
        ];
        return view("statistika/index", $data);
    }
};
