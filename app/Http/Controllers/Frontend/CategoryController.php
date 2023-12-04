<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
    }

    public function categorySlug()
    {
        $dataView = [
            'title_page' => 'Danh mục',
        ];

        return view("frontend.page.category.index", $dataView);
    }
}
