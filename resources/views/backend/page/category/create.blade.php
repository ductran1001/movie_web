@extends('backend.layout.main_admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tạo mới phim</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="arrow-left"></span>
                    Quay lại
                </a>
            </div>
        </div>
    </div>

    <div class="row g-5">
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">[Chưa có tiêu đề]</h4>
            <form class="needs-validation" novalidate="">
                <div class="row g-3">
                    <div class="col-12">
                        <label for="title" class="form-label">
                            Tiêu đề
                        </label>
                        <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề...">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Mô tả ngắn</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Nhập mô tả ngắn..."></textarea>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Tạo mới</button>
            </form>
        </div>
    </div>
@stop
