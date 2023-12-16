<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;

class CountryController extends Controller
{
    public function __construct()
    {
    }

    public function country($slug)
    {
      
        $title_page = 'Quốc gia';
        $country = Country::where('slug', $slug)->firstOrFail();
        $moviesInCountry= Movie::where('country_id', $country->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $categories = Category::orderBy('created_at', 'desc')->get() ?? [];
        $countries = Country::orderBy('created_at', 'desc')->get() ?? [];
        $genres = Genre::orderBy('created_at', 'desc')->get() ?? [];
     
        $dataView = [
            'title_page' => $title_page,
            'country' => $country,
            'moviesInCountry' => $moviesInCountry,
            'categories' => $categories,
            'countries' => $countries,
            'genres' => $genres,
        ];

        return view("frontend.page.country.index", $dataView);
    }
}
