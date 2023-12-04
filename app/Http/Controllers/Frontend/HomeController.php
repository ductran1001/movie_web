<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function home()
    {
        $dataView = [
            'title_page' => 'Trang chủ',
        ];

        return view("frontend.page.home.index", $dataView);
    }
}
