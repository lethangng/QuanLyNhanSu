@extends('nhansu.manager')
@section('title')
    {{ $title ?? 'Danh sách lương của nhân viên' }}
@endsection
@section('content')
    <h1 class="mt-3">{{ $title ?? 'Danh sách lương của nhân viên' }}</h1>
    <hr>
    <a href="{{ route('luong.create') }}" class="btn btn-primary">Thêm mới</a>
    <hr>
    <form action="{{ route('luong.search') }}" method="post" class="mb-3">
        <h3 for="" class="pb-2">Tìm kiếm</h3>
        <div class="row mt-2">
            <div class="col-3">
                <select class="form-select select2" aria-label="Default select example" name="HoTen">
                    <option value="">Nhập tên nhân viên cần tìm...</option>
                    @foreach ($caNhans as $caNhan)
                        <option @isset($data) @selected( $caNhan->HoTen == $data['HoTen']) @endisset
                            value="{{ $caNhan->HoTen }}">{{ $caNhan->HoTen }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-1">
                <button type="submit" id="search" class="btn btn-success text-light">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            <div class="col-1">
                <a href="{{ route('luong.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-repeat"></i>
                </a>
            </div>
        </div>
        @csrf
    </form>

    <hr>
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-warning">
            <th>STT</th>
            <th>Mã cá nhân</th>
            <th>Họ tên</th>
            <th>Hệ số lương</th>
            <th>Tháng</th>
            <th>Năm</th>
            <th>Lương cơ bản</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </thead>
        <tbody>
            @forelse ($luongs as $luong)
                <tr class="table-info">
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $luong->thongTinCaNhan->MaCaNhan }}</td>
                    <td>{{ $luong->thongTinCaNhan->HoTen }}</td>
                    <td>{{ $luong->HSL }}</td>
                    <td>{{ $luong->Thang }}</td>
                    <td>{{ $luong->Nam }}</td>
                    <td>
                        {{ $luong->thongTinCaNhan->chucVu->LuongCoBan }}
                    </td>
                    <td>
                        <a href="{{ route('luong.edit', ['id' => $luong->id]) }}"
                            class="btn btn-warning text-light">Sửa</a>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Xóa
                        </button>

                    </td>
                </tr>
            @empty
                <tr class="table-info">
                    <td colspan="100%" class="text-center">Không có dữ liệu.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if ($luongs->count() > 0)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xóa lương của nhân viên
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ 'Bạn chắc chắn muốn xóa lương của nhân viên ' . $luong->thongTinCaNhan->HoTen . ' ?' }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <form action="{{ route('luong.destroy', ['id' => $luong->id]) }}" method="POST">
                            <input type="text" value="{{ $luong->thongTinCaNhan->HoTen }}" name="HoTen"
                                style="display: none">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <nav aria-label="Page navigation example">
        {{ $luongs->links('pagination::bootstrap-4') }}
    </nav>
@endsection
