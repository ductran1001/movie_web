<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get() ?? [];

        $dataView = [
            'title_page' => 'Danh sách danh mục',
            'categories' => $categories,
        ];

        return view('backend.page.category.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataView = [
            'title_page' => 'Tạo mới danh mục',
        ];

        return view('backend.page.category.create', $dataView);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            Category::create($request->all());
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
        $category = Category::findOrFail($id);

        $dataView = [
            'title_page' => 'Chỉnh sửa danh mục',
            'category' => $category,
        ];

        return view('backend.page.category.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->all());
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
            $category = Category::findOrFail($id);
            $category->delete();
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
