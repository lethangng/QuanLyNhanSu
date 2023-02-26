@extends('nhansu.manager')
@section('title')
    {{ $title ?? 'Danh sách lương của nhân viên' }}
@endsection
@section('content')
    {{-- <div class="mx-5"> --}}
    <h1 class="mt-3">{{ $title ?? 'Danh sách lương của nhân viên' }}</h1>
    <hr>
    <form action="{{ route('chitietluong.search') }}" method="post" class="mb-3">
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
                @php
                    use Carbon\Carbon;
                    $nam = Carbon::now()->year;
                @endphp
                <label for="nam" class="form-label col" style="padding: 6px 12px; margin: 0; width: 2rem">Năm</label>
                <select class="form-select col" aria-label="Default select example" name="Nam">
                    <option value="">YYYY</option>
                    @for ($i = 2000; $i < $nam + 1; $i++)
                        <option @isset($data) @selected( $i == (int)$data['Nam'])  @endisset
                            value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
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
                <a href="{{ route('chitietluong.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-repeat"></i>
                </a>
            </div>
        </div>
        @csrf
    </form>

    <hr>
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-warning">
            <th>Mã cá nhân</th>
            <th>Họ tên</th>
            <th>Tháng năm</th>
            <th>HSL</th>
            <th>SoNgayLamVien</th>
            <th>Tổng tiền lương</th>
            <th>Chi tiết</th>
        </thead>
        <tbody>
            @forelse ($luongs as $luong)
                <tr class="table-info">
                    <td>{{ $luong->thongTinCaNhan->MaCaNhan }}</td>
                    <td>{{ $luong->thongTinCaNhan->HoTen }}</td>
                    <td>{{ $luong->Thang . '-' . $luong->Nam }}</td>
                    <td>{{ $luong->HSL }}</td>
                    <td>{{ $luong->SoNgayLamViec }}</td>
                    <td>{{ $luong->TongTienLuong }}</td>
                    <td>
                        <a href="{{ route('chitietluong.chitiet', ['id' => $luong->id]) }}"
                            class="btn btn-warning text-light">Chi
                            tiết</a>
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
        {{ $luongs->links('pagination::bootstrap-4') }}
    </nav>
    {{-- </div> --}}
@endsection
