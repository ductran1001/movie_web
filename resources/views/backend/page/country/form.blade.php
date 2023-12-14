@php
    $action = isset($country) ? route('admin.countries.update', $country['id']) : route('admin.countries.store');
    $title = isset($country) ? $country['title'] : '';
    $slug = isset($country) ? $country['slug'] : '';
    $status = isset($country) ? $country['status'] : 1;
    $description = isset($country) ? $country['description'] : '';
    $index = route('admin.countries.index');
    $create = route('admin.countries.create');
@endphp

<form id="do-form" class="row g-5" action="{{ $action }}" method="POST">
    @csrf
    @isset($country)
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
                    <div class="form-check">
                        <input {{ $status == 1 ? 'checked' : '' }} name="status" id="check" value="1"
                            type="radio" class="form-check-input">
                        <label for="check" class="form-check-label">Hiển thị</label>
                    </div>
                    <div class="form-check">
                        <input {{ $status == 0 ? 'checked' : '' }} name="status" id="uncheck" value="0"
                            type="radio" class="form-check-input">
                        <label class="form-check-label" for="uncheck">Không hiển thị</label>
                    </div>
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

    <div class="col-md-7 col-lg-8 mt-lg-0 d-flex g-5 justify-content-between">
        <button name="save" value="{{ $index }}" style="{{ isset($country) ? 'width: 100%' : 'width: 48%' }}"
            class="btn btn-primary btn-lg">
            Lưu
        </button>

        @if (!isset($country))
            <button name="save" value="{{ $create }}" style="width: 48%" class="btn btn-secondary btn-lg">
                Lưu và tiếp tục
            </button>
        @endif
    </div>
</form>
