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
            <label class="form-label">Hệ số lương</label>
            <input type="text" class="form-control" name="HSL" placeholder="Nhập HSL...">
            @error('HSL')
                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tháng</label>
            <select class="form-select" aria-label="Default select example" name="Thang">
                @for ($i = 1; $i < 13; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            @php
                use Carbon\Carbon;
                $nam = Carbon::now()->year;
            @endphp
            <label class="form-label">Năm</label>
            <select class="form-select select2" aria-label="Default select example" name="Nam">
                @for ($i = 2000; $i < $nam + 1; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        @csrf
        <button type="submit" class="btn btn-warning text-light">Thêm</button>
        <a href="{{ route('luong.index') }}" type="button" class="btn btn-primary">Quay lại</a>
    </form>
@endsection
