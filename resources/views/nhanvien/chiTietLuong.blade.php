@extends('nhanvien.masterLayout');
@section('main-contend')
    <h2>Chi tiết lương</h2>
    <label for="">Mã cá nhân:</label>
    <input type="text" value="{{ $caNhan->MaCaNhan }}">
    <label for="">Họ tên:</label>
    <input type="text" value="{{ $caNhan->HoTen }}">
    <label for="">Phòng ban:</label>
    <input type="text" value="{{ $caNhan->chucVu->TenChucVu }}">
    <label for="">Lương cơ bản</label>
    <input type="text" value="{{ $caNhan->chucVu->LuongCoBan }}">
    <label for="">Hệ số lương:</label>
    <input type="text" value="{{ $caNhan->luong->HSL }}">
    <label for="">Số ngày làm việc</label>
    <input type="text" value="10">
    <label for="">Tổng tiền thưởng</label>
    <input type="text" value="100000">
    <label for="">Tổng tiền phạt</label>
    <input type="text" value="200000">
    <label for="">Tổng tiền lương</label>
    <input type="text" value="500000">

    <a class="btn btn-primary" href="{{ route('canhan.index') }}">Quay lại</a>
@endsection
