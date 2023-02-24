@extends('nhansu.manager')
@section('title')
    {{ $title ?? 'Danh sách khen thưởng của nhân viên' }}
@endsection
@section('content')
    {{-- <div class="mx-5"> --}}
        <h1 class="mt-3">{{ $title ?? 'Danh sách khen thưởng của nhân viên'}}</h1>
        <hr>
        <a href="{{route('khenthuong_canhan.create')}}" class="btn btn-primary">Thêm mới</a>
        @if (session()->has('message'))
            <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <hr>
        <form action="{{ route('khenthuong_canhan.search') }}" method="post" class="mb-3">
            <h3 for="" class="pb-2">Tìm kiếm</h3>
            <div class="row">
                <div id="input-thang" class="col-2 row">
                    <label for="thang" class="form-label col" style="padding: 6px 12px; margin: 0">Tháng</label>
                    <input type="text" class="form-control col" value="{{ $data['Thang'] ?? null }}" placeholder="MM" name="Thang" id="thang">
                </div>
                <div id="input-nam" class="col-2 row">
                    <label for="nam" class="form-label col" style="padding: 6px 12px; margin: 0; width: 2rem">Năm</label>
                    <input type="text" class="form-control col" value="{{ $data['Nam'] ?? null }}" placeholder="YYYY" name="Nam" id="nam">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-3">
                    <input type="text" class="form-control @error('HoTen') border border-danger border-3 @enderror" name="HoTen"
                        placeholder="Nhập tên nhân viên cần tìm..." value="{{ $data['HoTen'] ?? null }}">
                </div>
                <div class="col-1">
                    <button type="submit" id="search" class="btn btn-success text-light">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
                <div class="col-1">
                    <a href="{{route('khenthuong_canhan.index')}}" class="btn btn-primary">
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
                <th>Tên khen thưởng</th>
                <th>Ngày khen thưởng</th>
                <th>Chi tiết khen thưởng</th>
                <th>Tiền thưởng</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </thead>
            <tbody>
                @forelse ($khenThuong_CaNhans as $khenThuong_canhan)
                    <tr class="table-info">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $khenThuong_canhan->thongTinCaNhan->HoTen }}</td>
                        <td>
                            {{ $khenThuong_canhan->khenThuong->TenKhenThuong }}
                        </td>
                        <td>
                            @php
                                $newDate = date("d-m-Y", strtotime($khenThuong_canhan->NgayKhenThuong)); 
                            @endphp
                            {{ $newDate }}
                        </td>
                        {{-- <td>{{ dd($khenThuong_canhan->khenthuong)}}</td> --}}
                        <td>{{ $khenThuong_canhan->ChiTietKhenThuong }}</td>
                        <td>{{ $khenThuong_canhan->khenThuong->TienThuong }}</td>
                        <td>
                            <a href="{{route('khenthuong_canhan.edit', ['id' => $khenThuong_canhan->id])}}"
                                class="btn btn-warning text-light">Sửa</a>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Xóa
                            </button>
                            @if ($khenThuong_CaNhans->count() > 0)
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xóa khen thưởng của nhân viên</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn chắc chắn muốn xóa ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('khenthuong_canhan.destroy', ['id' => $khenThuong_canhan->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        </td>
                    </tr>
                @empty
                    <tr class="table-info">
                        <td colspan="100%" class="text-center">Không có dữ liệu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            {{$khenThuong_CaNhans->links('pagination::bootstrap-4')}}
        </nav>
    {{-- </div> --}}
@endsection