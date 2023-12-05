<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập.');
        }

        $user = auth()->user();

        if ($user && $user->role !== User::ROLE_ADMIN) {
            \Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }
}