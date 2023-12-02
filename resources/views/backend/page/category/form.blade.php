@php
    $action = isset($category) ? route('admin.categories.update', $category['id']) : route('admin.categories.store');
    $title = isset($category) ? $category['title'] : '';
    $slug = isset($category) ? $category['slug'] : '';
    $description = isset($category) ? $category['description'] : '';
    $text_button = isset($category) ? 'Cập nhập' : 'Tạo mới';
@endphp

<form id="do-form" class="row g-5" action="{{ $action }}" method="POST"
    redirect="{{ route('admin.categories.index') }}">
    @csrf
    @isset($category)
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
        <div class="card p-2  mt-lg-4">
            <div class="input-group">
                <input type="file" class="form-control" placeholder="Hình ảnh">
            </div>
        </div>
    </div>

    <div class="col-md-7 col-lg-8 mt-lg-0">
        <button class="w-100 btn btn-primary btn-lg">
            {{ $text_button }}
        </button>
    </div>
</form>
