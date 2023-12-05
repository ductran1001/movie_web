<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct()
    {
    }

    public function movieSlug()
    {
        $dataView = [
            'title_page' => 'Phim',
        ];

        return view("frontend.page.movie.index", $dataView);
    }
}
