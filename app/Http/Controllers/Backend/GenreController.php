<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;

class GenreController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::orderBy('created_at', 'desc')->get() ?? [];

        $dataView = [
            'title_page' => 'Danh sách thể loại',
            'genres' => $genres,
        ];

        return view('backend.page.genre.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataView = [
            'title_page' => 'Tạo mới thể loại',
        ];

        return view('backend.page.genre.create', $dataView);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request)
    {
        try {
            Genre::create($request->all());
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::findOrFail($id);

        $dataView = [
            'title_page' => 'Chỉnh sửa thể loại',
            'genre' => $genre,
        ];

        return view('backend.page.genre.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request, string $id)
    {
        try {
            $genre = Genre::findOrFail($id);
            $genre->update($request->all());
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
    public function destroy(string $id)
    {
        try {
            $genre = Genre::findOrFail($id);
            $genre->delete();
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
