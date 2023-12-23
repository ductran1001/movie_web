<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;

class MovieController extends Controller
{
    public function __construct()
    {
    }

    public function movieSlug($slug)
    {
        $title_page = 'Phim';
        $categories = Category::orderBy('created_at', 'desc')->get() ?? [];
        $countries = Country::orderBy('created_at', 'desc')->get() ?? [];
        $genres = Genre::orderBy('created_at', 'desc')->get() ?? [];

        try {
            $movie = Movie::where('slug', $slug)
                ->with('category', 'genre', 'country')
                ->firstOrFail();

            $relatedMovies = Movie::where('category_id', $movie->category->id)
                ->where('id', '!=', $movie->id)
                ->with('category', 'genre', 'country')
                ->take(5)
                ->get();

            $dataView = [
                'title_page' => $title_page,
                'categories' => $categories,
                'countries' => $countries,
                'genres' => $genres,
                'movie' => $movie,
                'relatedMovies' => $relatedMovies,
            ];

            return view("frontend.page.movie.index", $dataView);
        } catch (\Exception $e) {
            return abort(404);
        }
    }
}
