@extends('nhansu.manager')
@section('title')
    {{ $title ?? 'Danh sách kỷ luật của nhân viên' }}
@endsection
@section('content')
    <h1 class="mt-3">{{ $title ?? 'Danh sách kỷ luật của nhân viên' }}</h1>
    <hr>
    <a href="{{ route('kyluat_canhan.create') }}" class="btn btn-primary">Thêm mới</a>
    <hr>
    <form action="{{ route('kyluat_canhan.search') }}" method="post" class="mb-3">
        <h3 for="" class="pb-2">Tìm kiếm</h3>
        <div class="row">
            <div id="input-thang" class="col-2 row">
                <label for="thang" class="form-label col" style="padding: 6px 12px; margin: 0">Tháng</label>
                <select class="form-select col" aria-label="Default select example" name="Thang">
                    <option value="">MM</option>
                    @for ($i = 1; $i < 13; $i++)
                        <option @isset($data) @selected( $i == (int)$data['Thang'])  @endisset
                            value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div id="input-nam" class="col-2 row">
                <label for="nam" class="form-label col" style="padding: 6px 12px; margin: 0; width: 2rem">Năm</label>
                <input type="text" class="form-control col"
                    @isset($data) value="{{ $data['Nam'] }}"  @endisset placeholder="YYYY"
                    name="Nam" id="nam">
            </div>
        </div>
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
                <a href="{{ route('kyluat_canhan.index') }}" class="btn btn-primary">
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
            <th>Tên nhân viên</th>
            <th>Tên kỷ luật</th>
            <th>Ngày kỷ luật</th>
            <th>Chi tiết kỷ luật</th>
            <th>Tiền thưởng</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </thead>
        <tbody>
            @forelse ($kyLuat_CaNhans as $kyLuat_canhan)
                <tr class="table-info">
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $kyLuat_canhan->thongTinCaNhan->HoTen }}</td>
                    <td>
                        {{ $kyLuat_canhan->kyLuat->TenKyLuat }}
                    </td>
                    <td>
                        @php
                            $newDate = date('d-m-Y', strtotime($kyLuat_canhan->NgayKyLuat));
                        @endphp
                        {{ $newDate }}
                    </td>
                    {{-- <td>{{ dd($kyLuat_canhan->khenthuong)}}</td> --}}
                    <td>{{ $kyLuat_canhan->ChiTietKyLuat }}</td>
                    <td>{{ $kyLuat_canhan->kyLuat->TienPhat }}</td>
                    <td>
                        <a href="{{ route('kyluat_canhan.edit', ['id' => $kyLuat_canhan->id]) }}"
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
    @if ($kyLuat_CaNhans->count() > 0)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xóa kỷ luật của nhân viên
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ 'Bạn chắc chắn muốn xóa kỷ luật của nhân viên ' . $kyLuat_canhan->thongTinCaNhan->HoTen . ' ?' }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <form action="{{ route('kyluat_canhan.destroy', ['id' => $kyLuat_canhan->id]) }}" method="POST">
                            <input type="text" value="{{ $kyLuat_canhan->thongTinCaNhan->HoTen }}" name="HoTen"
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
        {{ $kyLuat_CaNhans->links('pagination::bootstrap-4') }}
    </nav>
    {{-- </div> --}}
@endsection
