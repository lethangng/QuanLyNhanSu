@extends('nhansu.manager')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <h1>{{ $title }}</h1>
    <hr>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
    @endif --}}
    <form action="" method="post" class="mb-3">
        <div class="mb-3 mt-3">
            <label for="exampleInputEmail1" class="form-label">Tên khen thưởng</label>
            <input type="text" class="form-control @error('TenKhenThuong') border border-danger border-3 @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="TenKhenThuong"
                value="{{ old('TenKhenThuong') }}" placeholder="Nhập tên khen thưởng">
            @error('TenKhenThuong')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tiền thưởng</label>
            <input type="text" class="form-control @error('TienThuong') border border-danger border-3 @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="TienThuong"
                value="{{ old('TienThuong') }}" placeholder="Nhập tiền thưởng">
            @error('TienThuong')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        @csrf

        <button type="submit" class="btn btn-warning text-light">Submit</button>
        <a href="{{ route('khenthuong.index') }}" type="button" class="btn btn-primary">Exit</a>
    </form>
@endsection
