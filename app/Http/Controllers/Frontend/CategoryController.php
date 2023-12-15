<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;

class CategoryController extends Controller
{
    public function __construct()
    {
    }

    public function categorySlug($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $categories = Category::orderBy('created_at', 'desc')->get() ?? [];
        $moviesInCategory = Movie::where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $countries = Country::orderBy('created_at', 'desc')->get() ?? [];
        $genres = Genre::orderBy('created_at', 'desc')->get() ?? [];

        $dataView = [
            'title_page' => 'Danh mục phim',
            'category' => $category,
            'categories' => $categories,
            'moviesInCategory' => $moviesInCategory,
            'countries' => $countries,
            'genres' => $genres,
        ];

        return view("frontend.page.category.index", $dataView);
    }
}
