@extends('backend.layout.main_admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh sách phim</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.movies.create') }}" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus"></span>
                    Tạo mới
                </a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Mô tả ngắn</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hot</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Quốc gia</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Sửa-Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $index => $movie)
                    <tr>
                        <td class="align-middle">{{ $index + 1 }}</td>
                        <td class="d-flex gap-3">
                            <img style="width: 60px;height: 60px; object-fit:cover;border-radius: 50%;"
                                src="{{ $movie['thumbnail'] }}" alt="{{ $movie['title'] }}">
                            <span class="my-auto">
                                {{ $movie['title'] }}
                            </span>
                        </td>
                        <td class="align-middle">{{ $movie['description'] ?? '[N/A]' }} </td>
                        <td class="align-middle">{{ $movie['status'] == 1 ? 'hiển thị' : 'không hiển thị' }} </td>
                        <td class="align-middle">{{ $movie['hot'] == 1 ? 'có' : 'không' }} </td>
                        <td class="align-middle">{{ $movie['category']['title'] }} </td>
                        <td class="align-middle">{{ $movie['country']['title'] }} </td>
                        <td class="align-middle">{{ $movie['genre']['title'] }} </td>
                        <td class="align-middle">{{ $movie['created_at']->format('d/m/Y') }} </td>
                        <td class="align-middle">
                            <a href="{{ route('admin.movies.edit', $movie['id']) }}" class="text-decoration-none">
                                <span class="text-warning" data-feather="edit"></span>
                            </a>
                            <a href="javascript:void(0)" id="delete-action"
                                data-url="{{ route('admin.movies.destroy', $movie['id']) }}">
                                <span class="text-danger" data-feather="x"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@push('js_admin')
    <script src="{{ asset('backend/js/do-form.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        new DataTable('#zero_config');
    </script>
@endpush
