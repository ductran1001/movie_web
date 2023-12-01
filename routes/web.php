<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend as BackendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('dang-nhap', [BackendController\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('dang-nhap', [BackendController\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('dang-xuat', [BackendController\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::get('dang-ky', [BackendController\Auth\AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('dang-ky', [BackendController\Auth\AdminRegisterController::class, 'register'])->name('admin.register.submit');


    Route::middleware(['isAdmin'])->group(function () {
        Route::get('bang-dieu-khien', [BackendController\DashboardController::class, 'dashboard'])->name('admin.dashboard');

        Route::resource('thanh-vien', BackendController\MemberController::class)->names([
            'index' => 'admin.members.index',
            'create' => 'admin.members.create',
            'store' => 'admin.members.store',
            'edit' => 'admin.members.edit',
            'update' => 'admin.members.update',
            'destroy' => 'admin.members.destroy',
        ]);

        Route::resource('danh-muc', BackendController\CategoryController::class)->names([
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'store' => 'admin.categories.store',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy',
        ]);

        Route::resource('quoc-gia', BackendController\CountryController::class)->names([
            'index' => 'admin.countries.index',
            'create' => 'admin.countries.create',
            'store' => 'admin.countries.store',
            'edit' => 'admin.countries.edit',
            'update' => 'admin.countries.update',
            'destroy' => 'admin.countries.destroy',
        ]);

        Route::resource('the-loai', BackendController\GenreController::class)->names([
            'index' => 'admin.genres.index',
            'create' => 'admin.genres.create',
            'store' => 'admin.genres.store',
            'edit' => 'admin.genres.edit',
            'update' => 'admin.genres.update',
            'destroy' => 'admin.genres.destroy',
        ]);

        Route::resource('phim', BackendController\MovieController::class)->names([
            'index' => 'admin.movies.index',
            'create' => 'admin.movies.create',
            'store' => 'admin.movies.store',
            'edit' => 'admin.movies.edit',
            'update' => 'admin.movies.update',
            'destroy' => 'admin.movies.destroy',
        ]);

        Route::resource('cai-dat', BackendController\MovieController::class)->names([
            'index' => 'admin.movies.index',
            'create' => 'admin.movies.create',
            'store' => 'admin.movies.store',
            'edit' => 'admin.movies.edit',
            'update' => 'admin.movies.update',
            'destroy' => 'admin.movies.destroy',
        ]);
    });
});