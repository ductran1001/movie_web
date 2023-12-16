@php
    $action = isset($movie) ? route('admin.movies.update', $movie['id']) : route('admin.movies.store');
    $title = isset($movie) ? $movie['title'] : '';
    $slug = isset($movie) ? $movie['slug'] : '';
    $status = isset($movie) ? $movie['status'] : 1;
    $hot = isset($movie) ? $movie['hot'] : 1;
    $description = isset($movie) ? $movie['description'] : '';
    $content = isset($movie) ? $movie['content'] : '';
    $index = route('admin.movies.index');
    $create = route('admin.movies.create');
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
                    <label class="form-label">
                        Trạng thái
                    </label>
                    <div class="d-flex gap-5">
                        <div class="form-check" style="min-width: 70px">
                            <input {{ $status == 1 ? 'checked' : '' }} name="status" id="active" value="1"
                                type="radio" class="form-check-input">
                            <label for="active" class="form-check-label">Hiển thị</label>
                        </div>
                        <div class="form-check">
                            <input {{ $status == 0 ? 'checked' : '' }} name="status" id="unactive" value="0"
                                type="radio" class="form-check-input">
                            <label class="form-check-label" for="unactive">Không hiển thị</label>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label">
                        Phim hot
                    </label>
                    <div class="d-flex gap-5">
                        <div class="form-check" style="min-width: 70px">
                            <input {{ $hot == 1 ? 'checked' : '' }} name="hot" id="hot" value="1"
                                type="radio" class="form-check-input">
                            <label for="hot" class="form-check-label">Có</label>
                        </div>
                        <div class="form-check">
                            <input {{ $hot == 0 ? 'checked' : '' }} name="hot" id="unhot" value="0"
                                type="radio" class="form-check-input">
                            <label class="form-check-label" for="unhot">Không</label>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Mô tả ngắn</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Nhập mô tả ngắn...">{{ $description }}</textarea>
                </div>

                <div class="col-12">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea class="form-control" name="content" id="content" placeholder="Nhập mô nội dung...">{{ $content }}</textarea>
                </div>
            </div>

            <hr class="my-4">

        </div>
    </div>
    <div class="col-md-5 col-lg-4 mt-lg-5 mt-0">
        <div class="card p-2 mt-lg-4">
            <div class="mt-2">
                <label for="category_id" class="form-label">Danh mục</label>
                <select class="form-select" id="category_id" name="category_id">
                    <option value="default">Chọn...</option>
                    @foreach ($categories as $category)
                        <option {{ isset($movie) && $movie['category_id'] == $category['id'] ? 'selected' : '' }}
                            value="{{ $category['id'] }}">{{ $category['title'] }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="country_id" class="form-label">Quốc gia</label>
                <select class="form-select" id="country_id" name="country_id">
                    <option value="default">Chọn...</option>
                    @foreach ($countries as $country)
                        <option {{ isset($movie) && $movie['country_id'] == $country['id'] ? 'selected' : '' }}
                            value="{{ $country['id'] }}">{{ $country['title'] }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="genre_id" class="form-label">Thể loại</label>
                <select class="form-select" id="genre_id" name="genre_id">
                    <option value="default">Chọn...</option>
                    @foreach ($genres as $genre)
                        <option {{ isset($movie) && $movie['genre_id'] == $genre['id'] ? 'selected' : '' }}
                            value="{{ $genre['id'] }}">{{ $genre['title'] }} </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mt-4">
                <span style="width: 36%" class="input-group-btn">
                    <a id="lfm" style="width: 100%" data-input="thumbnail" data-preview="holder_photo"
                        class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Ảnh đại diện
                    </a>
                </span>
                <input style="width: 64%" readonly
                    value="{{ isset($movie['thumbnail']) ? $movie['thumbnail'] : '' }}" id="thumbnail"
                    class="form-control" type="text" name="thumbnail">
            </div>
            @if (isset($movie['thumbnail']))
                <div id="holder_photo" style="margin-top:15px;max-height:100px;">
                    <img src="{{ $movie['thumbnail'] }}" alt=""
                        style="width: 80px;height: 80px; object-fit: cover;" />
                </div>
            @else
                <div id="holder_photo" style="margin-top:15px;max-height:100px;">
                </div>
            @endif

            <div class="input-group mt-3">
                <span style="width: 36%" class="input-group-btn">
                    <a id="lfms" style="width: 100%" data-input="abums" data-preview="holder_photos"
                        class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Ảnh abums
                    </a>
                </span>
                <input style="width: 64%" readonly value="{{ isset($movie['abums']) ? $movie['abums'] : '' }}"
                    id="abums" class="form-control" type="text" name="abums">
            </div>
            @if (isset($movie['abums']))
                <div id="holder_photos" style="margin-top:15px;max-height:100px;">
                    @foreach (json_decode($movie['abums']) as $abum)
                        <img src="{{ $abum }}" alt="abums"
                            style="width: 80px;height: 80px; object-fit: cover; margin-right: 5px;" />
                    @endforeach
                </div>
            @else
                <div id="holder_photos" style="margin-top:15px;max-height:100px;">
                </div>
            @endif
        </div>
    </div>

    <div class="col-md-7 col-lg-8 mt-lg-0 d-flex g-5 justify-content-between">
        <button name="save" value="{{ $index }}"
            style="{{ isset($movie) ? 'width: 100%' : 'width: 48%' }}" class="btn btn-primary btn-lg">
            Lưu
        </button>

        @if (!isset($movie))
            <button name="save" value="{{ $create }}" style="width: 48%" class="btn btn-secondary btn-lg">
                Lưu và tiếp tục
            </button>
        @endif
    </div>
</form>
