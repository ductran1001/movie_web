<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;

class CategoryController extends Controller
{
    public function __construct()
    {
    }

    public function categorySlug()
    {
        $categories = Category::orderBy('created_at', 'desc')->get() ?? [];
        $countries = Country::orderBy('created_at', 'desc')->get() ?? [];
        $genres = Genre::orderBy('created_at', 'desc')->get() ?? [];

        $dataView = [
            'title_page' => 'Danh mục phim',
            'categories' => $categories,
            'countries' => $countries,
            'genres' => $genres,
        ];

        return view("frontend.page.category.index", $dataView);
    }
}
