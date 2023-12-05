<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AdminRegisterController extends Controller
{
    public function __construct()
    {
    }


    public function showRegistrationForm()
    {
        $dataView = [
            'title_page' => 'Đăng kí',
        ];

        return \Auth::check() ? redirect()->route('admin.dashboard') : view('backend.page.auth.register', $dataView);
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return response()->json([
            "status" => true,
            'msg' => 'Đăng ký thành công.'
        ], 200);
    }

}
