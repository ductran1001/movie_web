@php
    $action = isset($movie) ? route('admin.movies.update', $movie['id']) : route('admin.movies.store');
    $title = isset($movie) ? $movie['title'] : '';
    $slug = isset($movie) ? $movie['slug'] : '';
    $description = isset($movie) ? $movie['description'] : '';
    $index = route('admin.categories.index');
    $create = route('admin.categories.create');
@endphp

<form id="do-form" class="row g-5" action="{{ $action }}" method="POST">
    @csrf
    @isset($movie)
        @method('PUT')
    @endisset
    <div class="col-md-7 col-lg-8">
        <div>
            <div class="row g-3">
                <div class="col-12">
                    <label for="title" class="form-label">
                        Tiêu đề
                    </label>
                    <input value="{{ $title }}" onkeyup="ChangeToSlug();" id="title" name="title"
                        type="text" class="form-control" placeholder="Nhập tiêu đề...">
                </div>

                <div class="col-12">
                    <label for="slug" class="form-label">
                        Đường dẫn
                    </label>
                    <input value="{{ $slug }}" id="slug" type="text" name="slug"class="form-control"
                        placeholder="Đường dẫn...">
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Mô tả ngắn</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Nhập mô tả ngắn...">{{ $description }}</textarea>
                </div>
            </div>

            <hr class="my-4">

        </div>
    </div>
    <div class="col-md-5 col-lg-4 mt-lg-5 mt-0">
        <div class="card p-2 mt-lg-4">
            <div class="mt-2">
                <label for="category_id" class="form-label">Danh mục</label>
                <select class="form-select" id="category_id">
                    <option value="">Chọn...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['title'] }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="country_id" class="form-label">Quốc gia</label>
                <select class="form-select" id="country_id">
                    <option value="">Chọn...</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country['id'] }}">{{ $country['title'] }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="genre_id" class="form-label">Thể loại</label>
                <select class="form-select" id="genre_id">
                    <option value="">Chọn...</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre['id'] }}">{{ $genre['title'] }} </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mt-4">
                <input type="file" class="form-control" placeholder="Hình ảnh">
            </div>
        </div>
    </div>

    <div class="col-md-7 col-lg-8 mt-lg-0 d-flex g-5 justify-content-between">
        <button name="save" value="{{ $index }}" style="{{ isset($movie) ? 'width: 100%' : 'width: 48%' }}"
            class="btn btn-primary btn-lg">
            Lưu
        </button>

        @if (!isset($movie))
            <button name="save" value="{{ $create }}" style="width: 48%" class="btn btn-secondary btn-lg">
                Lưu và tiếp tục
            </button>
        @endif
    </div>
</form>
