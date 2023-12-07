<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend as BackendController;
use App\Http\Controllers\Frontend as FrontendController;


Route::get('/', [FrontendController\HomeController::class, 'home'])->name('home');
Route::get('/danh-muc/{slug}', [FrontendController\CategoryController::class, 'categorySlug'])->name('category.slug');
Route::get('/the-loai/{slug}', [FrontendController\GenreController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [FrontendController\CountryController::class, 'country'])->name('country');
Route::get('/phim/{slug}', [FrontendController\MovieController::class, 'movieSlug'])->name('movie.slug');

Route::group(['prefix' => 'admin'], function () {
    Route::get('dang-nhap', [BackendController\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('dang-nhap', [BackendController\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('dang-xuat', [BackendController\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::get('dang-ky', [BackendController\Auth\AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('dang-ky', [BackendController\Auth\AdminRegisterController::class, 'register'])->name('admin.register.submit');


    Route::middleware(['isAdmin'])->group(function () {
        Route::get('dashboard', [BackendController\DashboardController::class, 'dashboard'])->name('admin.dashboard');

        Route::resource('member', BackendController\MemberController::class)->names([
            'index' => 'admin.members.index',
            'create' => 'admin.members.create',
            'store' => 'admin.members.store',
            'edit' => 'admin.members.edit',
            'update' => 'admin.members.update',
            'destroy' => 'admin.members.destroy',
        ]);

        Route::resource('category', BackendController\CategoryController::class)->names([
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'store' => 'admin.categories.store',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy',
        ]);

        Route::resource('countries', BackendController\CountryController::class)->names([
            'index' => 'admin.countries.index',
            'create' => 'admin.countries.create',
            'store' => 'admin.countries.store',
            'edit' => 'admin.countries.edit',
            'update' => 'admin.countries.update',
            'destroy' => 'admin.countries.destroy',
        ]);

        Route::resource('genre', BackendController\GenreController::class)->names([
            'index' => 'admin.genres.index',
            'create' => 'admin.genres.create',
            'store' => 'admin.genres.store',
            'edit' => 'admin.genres.edit',
            'update' => 'admin.genres.update',
            'destroy' => 'admin.genres.destroy',
        ]);

        Route::resource('movie', BackendController\MovieController::class)->names([
            'index' => 'admin.movies.index',
            'create' => 'admin.movies.create',
            'store' => 'admin.movies.store',
            'edit' => 'admin.movies.edit',
            'update' => 'admin.movies.update',
            'destroy' => 'admin.movies.destroy',
        ]);

        // Route::resource('cai-dat', BackendController\MovieController::class)->names([
        //     'index' => 'admin.movies.index',
        //     'create' => 'admin.movies.create',
        //     'store' => 'admin.movies.store',
        //     'edit' => 'admin.movies.edit',
        //     'update' => 'admin.movies.update',
        //     'destroy' => 'admin.movies.destroy',
        // ]);
    });
});
