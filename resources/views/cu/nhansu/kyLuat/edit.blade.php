@extends('nhansu.manager')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <h1>{{ $title }}</h1>
    <hr>
    <form action="{{ route('kyluat.update', ['id' => $kyluat->id]) }}" method="post" class="mb-3">
        <div class="mb-3 mt-3">
            <label for="exampleInputEmail1" class="form-label">ID</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id"
                value="{{ $kyluat->id }}" readonly>
        </div>
        <div class="mb-3 mt-3">
            <label for="exampleInputEmail1" class="form-label">Tên kỷ luật</label>
            <input type="text" class="form-control @error('TenKyLuat') border border-danger border-3 @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp" name="TenKyLuat" value="{{ $kyluat->TenKyLuat }}"
                placeholder="Nhập tên kỷ luật...">
            @error('TenKyLuat')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3  mt-3">
            <label for="exampleInputPassword1" class="form-label">Tiền phạt</label>
            <input type="text" class="form-control @error('TienPhat') border border-danger border-3 @enderror"
                id="exampleInputEmail1" aria-describedby="emailHelp" name="TienPhat" value="{{ $kyluat->TienPhat }}"
                placeholder="Nhập tiền phạt...">
            @error('TienPhat')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        @csrf
        @method('PUT')

        <button type="submit" class="btn btn-warning text-light">Cập nhập</button>
        <a href="{{ route('kyluat.index') }}" type="button" class="btn btn-primary">Quay lại</a>
    </form>
@endsection
