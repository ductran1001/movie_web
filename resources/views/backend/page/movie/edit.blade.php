@extends('backend.layout.main_admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cập nhập phim</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.movies.index') }}" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="arrow-left"></span>
                    Quay lại
                </a>
            </div>
        </div>
    </div>

    @include('backend.page.movie.form')
@stop
@push('js_admin')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script src="{{ asset('backend/js/do-form.js') }}"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
        $('#lfms').filemanager('image');
        $('#content').summernote({
            height: 400
        });
    </script>
@endpush
