@extends('nhansu.manager')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <h1>{{ $title }}</h1>
    <hr>
    <form action="{{ route('khenthuong_canhan.update', ['id' => $khenThuong_CaNhans->id]) }}" method="post" class="mb-3">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên nhân viên</label>
            <select class="form-select select2" name="ThongTinCaNhan_id">
                @foreach ($caNhans as $caNhan)
                    <option @selected($khenThuong_CaNhans->ThongTinCaNhan_id === $caNhan->id) value="{{ $caNhan->id }}">{{ $caNhan->HoTen }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên khen thưởng</label>
            <select class="form-select select2" name="KhenThuong_id">
                @foreach ($khenThuongs as $khenThuong)
                    <option @selected($khenThuong->id === $khenThuong_CaNhans->KhenThuong_id) value="{{ $khenThuong->id }}">{{ $khenThuong->TenKhenThuong }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày khen thưởng</label>
            <input type="date" class="form-control @error('ChiTietKhenThuong') border border-danger border-3 @enderror"
                name="NgayKhenThuong" value="{{ $khenThuong_CaNhans->NgayKhenThuong }}">
            @error('NgayKhenThuong')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Chi tiết khen thưởng</label>
            <textarea type="text" class="form-control @error('ChiTietKhenThuong') border border-danger border-3 @enderror"
                name="ChiTietKhenThuong" placeholder="Nhập chi tiết khen thưởng...">{{ $khenThuong_CaNhans->ChiTietKhenThuong }}</textarea>
        </div>
        @method('PUT')
        @csrf

        <button type="submit" class="btn btn-warning text-light">Cập nhập</button>
        <a href="{{ route('khenthuong_canhan.index') }}" type="button" class="btn btn-primary">Quay lại</a>
    </form>
@endsection
