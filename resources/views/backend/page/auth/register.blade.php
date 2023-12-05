@php
    $action = route('admin.register.submit');
    $redirect = route('admin.login');
@endphp

@extends('backend.layout.main_auth')
@section('content')
    <main class="form-signin">
        <form id="do-form" action="{{ $action }}" method="POST">
            @csrf

            <img class="mb-4" src="{{ config('site_config')['logo_admin'] }}" alt="" width="72" height="57">

            <h1 class="h3 mb-3 fw-normal">Đăng ký</h1>

            <div class="form-group mb-4">
                <label class="label" for="name">
                    Tên người dùng
                    <span class="text-danger"> *</span>
                </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên...">
            </div>

            <div class="form-group mb-4">
                <label class="label" for="email">
                    Địa chỉ email
                    <span class="text-danger"> *</span>
                </label>
                <input type="email" class="form-control" id="email" name="email"
                    placeholder="Nhập địa chỉ email...">
            </div>

            <div class="form-group mb-4">
                <label class="label" for="password">
                    Mật khẩu
                    <span class="text-danger"> *</span>
                </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu...">
            </div>

            <div class="checkbox mb-3">
                <label class="label">
                    <input type="checkbox" value="remember-me"> Ghi nhớ
                </label>
            </div>

            <button name="save" value="{{ $redirect }}" class="w-100 btn btn-lg btn-primary">
                Đăng Ký
            </button>

            <p class="mt-4 mb-0 text-muted">&copy; 2017–2021</p>
        </form>
    </main>
@stop
@push('js')
    <script src="{{ asset('backend/js/do-form.js') }}"></script>
@endpush
