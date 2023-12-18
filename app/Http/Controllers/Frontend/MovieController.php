<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;

class MovieController extends Controller
{
    public function __construct()
    {
    }

    public function movieSlug()
    {
        $title_page = 'Phim';

        $categories = Category::orderBy('created_at', 'desc')->get() ?? [];
        $countries = Country::orderBy('created_at', 'desc')->get() ?? [];
        $genres = Genre::orderBy('created_at', 'desc')->get() ?? [];

        $dataView = [
            'title_page' => $title_page,
            'categories' => $categories,
            'countries' => $countries,
            'genres' => $genres,
        ];

        return view("frontend.page.movie.index", $dataView);
    }
}
