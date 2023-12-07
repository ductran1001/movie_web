<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;

class MovieController extends Controller {
    public function __construct() {
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $movies = Movie::with('category', 'country', 'genre')->orderBy('created_at', 'desc')->get() ?? [];

        $dataView = [
            'title_page' => 'Danh sách phim',
            'movies' => $movies,
        ];

        return view('backend.page.movie.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::orderBy('created_at', 'desc')->get() ?? [];
        $countries = Country::orderBy('created_at', 'desc')->get() ?? [];
        $genres = Genre::orderBy('created_at', 'desc')->get() ?? [];

        $dataView = [
            'title_page' => 'Tạo mới phim',
            'categories' => $categories,
            'countries' => $countries,
            'genres' => $genres,
        ];

        return view('backend.page.movie.create', $dataView);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request) {
        try {
            Movie::create($request->all());
            return response()->json([
                "status" => true,
                'msg' => 'Thêm mới thành công.'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                'msg' => 'Có lỗi xảy ra.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $movie = Movie::findOrFail($id);
        $categories = Category::orderBy('created_at', 'desc')->get() ?? [];
        $countries = Country::orderBy('created_at', 'desc')->get() ?? [];
        $genres = Genre::orderBy('created_at', 'desc')->get() ?? [];

        $dataView = [
            'title_page' => 'Chỉnh sửa phim',
            'movie' => $movie,
            'categories' => $categories,
            'countries' => $countries,
            'genres' => $genres,
        ];

        return view('backend.page.movie.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, string $id) {
        try {
            $movie = Movie::findOrFail($id);
            $movie->update($request->all());
            return response()->json([
                "status" => true,
                'msg' => 'Cập nhập thành công.'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                'msg' => 'Có lỗi xảy ra.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        try {
            $movie = Movie::findOrFail($id);
            $movie->delete();
            return response()->json([
                "status" => true,
                'msg' => 'Xóa thành công.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                'msg' => 'Có lỗi xảy ra.'
            ], 500);
        }
    }
}
