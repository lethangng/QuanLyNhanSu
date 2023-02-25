@extends('nhansu.manager')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <h1>{{ $title }}</h1>
    <hr>
    <form action="{{ route('kyluat_canhan.update', ['id' => $kyLuat_CaNhans->id]) }}" method="post" class="mb-3">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên nhân viên</label>
            <select class="form-select select2" name="ThongTinCaNhan_id">
                @foreach ($caNhans as $caNhan)
                    <option @selected($kyLuat_CaNhans->ThongTinCaNhan_id === $caNhan->id) value="{{ $caNhan->id }}">{{ $caNhan->HoTen }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên kỷ luật</label>
            <select class="form-select select2" name="KyLuat_id">
                @foreach ($kyLuats as $kyLuat)
                    <option @selected($kyLuat->id === $kyLuat_CaNhans->KyLuat_id) value="{{ $kyLuat->id }}">{{ $kyLuat->TenKyLuat }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày kỷ luật</label>
            <input type="date" class="form-control @error('ChiTietKyLuat') border border-danger border-3 @enderror"
                name="NgayKyLuat" value="{{ $kyLuat_CaNhans->NgayKyLuat }}">
            @error('NgayKyLuat')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Chi tiết kỷ luật</label>
            <textarea type="text" class="form-control @error('ChiTietKyLuat') border border-danger border-3 @enderror"
                name="ChiTietKyLuat" placeholder="Nhập chi tiết kỷ luật...">{{ $kyLuat_CaNhans->ChiTietKyLuat }}</textarea>
        </div>
        @method('PUT')
        @csrf

        <button type="submit" class="btn btn-warning text-light">Cập nhập</button>
        <a href="{{ route('kyluat_canhan.index') }}" type="button" class="btn btn-primary">Quay lại</a>
    </form>
@endsection
