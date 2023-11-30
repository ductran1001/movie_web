<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construc()
    {
    }

    public function dashboard()
    {
        $dataView = [
            'title_page' => 'Bảng điều khiển',
        ];
        return view("backend.page.dashboard.index", $dataView);
    }
}
