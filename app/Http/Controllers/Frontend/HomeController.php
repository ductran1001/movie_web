<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function home()
    {
        $categories = Category::orderBy('created_at', 'desc')->get() ?? [];
        $countries = Country::orderBy('created_at', 'desc')->get() ?? [];
        $genres = Genre::orderBy('created_at', 'desc')->get() ?? [];
        $movies = Movie::orderBy('created_at', 'desc')->get() ?? [];

        $dataView = [
            'title_page' => 'Trang chủ',
            'categories' => $categories,
            'countries' => $countries,
            'genres' => $genres,
            'movies' => $movies,
        ];

        return view("frontend.page.home.index", $dataView);
    }
}
