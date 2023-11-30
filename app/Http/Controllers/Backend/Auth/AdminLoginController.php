<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{

    public function __construct()
    {
    }


    public function showLoginForm()
    {
        $dataView = [
            'title_page' => 'Đăng nhập',
        ];

        return Auth::check() ? redirect()->route('admin.dashboard') : view('backend.page.auth.login', $dataView);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                "status" => false,
                'msg' => 'Địa chỉ email hoặc mật khẩu không đúng.'
            ], 500);
        }

        $user = Auth::user();

        if ($user->role === User::ROLE_USER) {
            Auth::logout();
            return response()->json([
                "status" => false,
                'msg' => 'Bạn không có quyền truy cập.'
            ], 500);
        }

        return response()->json([
            "status" => true,
            'msg' => 'Đăng nhập thành công.'
        ], 200);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
