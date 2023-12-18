<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;

class GenreController extends Controller
{
    public function __construct()
    {
    }

    public function genre($slug)
    {
        $title_page = 'Thể loại';

        $genre = Genre::where('slug', $slug)->firstOrFail();
        $moviesInGenre = Movie::where('genre_id', $genre->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $categories = Category::orderBy('created_at', 'desc')->get() ?? [];
        $countries = Country::orderBy('created_at', 'desc')->get() ?? [];
        $genres = Genre::orderBy('created_at', 'desc')->get() ?? [];

        $dataView = [
            'title_page' => $title_page,
            'genre' => $genre,
            'moviesInGenre' => $moviesInGenre,
            'categories' => $categories,
            'countries' => $countries,
            'genres' => $genres,
        ];

        return view("frontend.page.genre.index", $dataView);
    }
}
