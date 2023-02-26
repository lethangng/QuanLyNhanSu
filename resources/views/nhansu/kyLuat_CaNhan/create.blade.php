@extends('nhansu.manager')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <h1>{{ $title }}</h1>
    <hr>
    <form action="" method="post" class="mb-3">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên nhân viên</label>
            <select class="form-select select2" aria-label="Default select example" name="ThongTinCaNhan_id">
                @foreach ($caNhans as $caNhan)
                    <option value="{{ $caNhan->id }}">{{ $caNhan->HoTen }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên kỷ luật</label>
            <select class="form-select select2" aria-label="Default select example" name="KyLuat_id">
                @foreach ($kyLuats as $kyLuat)
                    <option value="{{ $kyLuat->id }}">{{ $kyLuat->TenKyLuat }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày kỷ luật</label>
            <input type="date" class="form-control" name="NgayKyLuat">
            @error('NgayKyLuat')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Chi tiết kỷ luật</label>
            <textarea type="text" class="form-control" id="exampleInputPassword1" name="ChiTietKyLuat"
                placeholder="Nhập chi tiết kỷ luật..."></textarea>
        </div>
        @csrf
        <button type="submit" class="btn btn-warning text-light">Thêm</button>
        <a href="{{ route('kyluat_canhan.index') }}" type="button" class="btn btn-primary">Quay lại</a>
    </form>
@endsection
