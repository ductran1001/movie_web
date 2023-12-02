<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::orderBy('created_at', 'desc')->get() ?? [];

        $dataView = [
            'title_page' => 'Danh sách quốc gia',
            'countries' => $countries,
        ];

        return view('backend.page.country.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataView = [
            'title_page' => 'Tạo mới quốc gia',
        ];

        return view('backend.page.country.create', $dataView);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {
        try {
            Country::create($request->all());
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
        $country = Country::findOrFail($id);

        $dataView = [
            'title_page' => 'Chỉnh sửa quốc gia',
            'country' => $country,
        ];

        return view('backend.page.country.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, string $id)
    {
        try {
            $country = Country::findOrFail($id);
            $country->update($request->all());
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
            $country = Country::findOrFail($id);
            $country->delete();
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
