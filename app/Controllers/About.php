<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "About Me",
            "heading" => "About Me",
            "breadcumb" => [
                "About Me",
            ],
        ];
        return view('about/index', $data);
    }
}
