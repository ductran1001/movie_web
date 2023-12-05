@php
    $action = route('admin.login.submit');
    $redirect = route('admin.dashboard');
@endphp

@extends('backend.layout.main_auth')
@section('content')
    <main class="form-signin">
        <form id="do-form" action="{{ $action }}" method="POST">
            @csrf

            <img class="mb-4" src="{{ config('site_config')['logo_admin'] }}" alt="" width="72" height="57">

            <h1 class="h3 mb-3 fw-normal">Đăng nhập admin</h1>

            <div class="form-group mb-4">
                <label class="label" for="email">
                    Địa chỉ email
                    <span class="text-danger"> *</span>
                </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>

            <div class="form-group mb-4">
                <label class="label" for="password">
                    Mật khẩu
                    <span class="text-danger"> *</span>
                </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <div class="checkbox mb-3">
                <label class="label">
                    <input type="checkbox" value="remember-me"> Ghi nhớ
                </label>
            </div>

            <button name="save" value="{{ $redirect }}" class="w-100 btn btn-lg btn-primary">
                Đăng nhập
            </button>

            <p class="mt-4 mb-0 text-muted">&copy; 2017–2021</p>
        </form>
    </main>
@stop
@push('js')
    <script src="{{ asset('backend/js/do-form.js') }}"></script>
@endpush
