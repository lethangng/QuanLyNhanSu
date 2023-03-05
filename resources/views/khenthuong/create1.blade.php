@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <h1>{{ $title }}</h1>
    <hr>
    <form action="" method="post" class="mb-3" enctype="multipart/form-data" id="add-khenthuong">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tên nhân viên</label>
            <input type="text" class="form-control" name="tennv" value="{{ old('tennv') }}">
            @error('err_tennv')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
            @error('tennv')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mã nhân viên</label>
            <input type="text" class="form-control" name="manv" value="{{ old('manv') }}">
            @error('manv')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày khen thưởng</label>
            <input type="date" class="form-control" name="ngaykhenthuong" value="{{ old('ngaykhenthuong') }}">
            @error('ngaykhenthuong')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Lý do</label>
            <input type="text" class="form-control" name="lydo" value="{{ old('lydo') }}">
            @error('lydo')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Chi tiết khen thưởng</label>
            <input type="file" name="upfile" accept=".doc,.docx,.pdf,image/*" class="col-12 form-control">
            @error('file')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        @csrf
        <button type="submit" class="btn btn-warning text-light">Thêm</button>
        <a href="{{ route('khenthuong.index') }}" type="button" class="btn btn-primary">Quay lại</a>
    </form>
@endsection
