@extends('layouts.app')
@section('content')
<div class="tmnv-main">
    <div class="wrap">
        <div class="tmnv-title">
            <h1>Thêm mới nhân viên</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm left-inf">
                <form action="{{url('themnhanvien')}}" method="POST">
                @csrf
                        <div class="label-name">
                            <label for="">Họ tên:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="hoten" id="">
                        <div class="label-name">
                            <label for="">Ngày sinh:</label>
                        </div>
                        <input class="inp-tmnv" type="date" name="ngaysinh" id="">
                        <div class="label-name">
                            <label for="">Giới tính:</label>
                        </div>
                        <select class="inp-tmnv" name="gioitinh" id="">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                        <div class="label-name">
                            <label for="">CMND:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="cccd" id="">
                        <div class="label-name">
                            <label for="">Địa chỉ:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="diachi" id="">
                        <div class="label-name">
                            <label for="">Email:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="email" id="">
                        <div class="label-name">
                            <label for="">HSL:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="hsl" id="">
                </div>
                <div class="col-sm right-inf">
                    <div class="label-name">
                        <label for="">Quê quán:</label>
                    </div>
                    <input class="inp-tmnv" type="text" name="quequan" id="">
                    <div class="label-name">
                        <label for="">Số điện thoại:</label>
                    </div>
                    <input class="inp-tmnv" type="text" name="sodienthoai" id="">
                    <div class="label-name">
                        <label for="">Phòng ban:</label>
                    </div>
                    @empty($phongBan)
                    @endempty
                    <select class="inp-tmnv" name="phongban" id="">
                        @isset($phongBan)
                            @foreach ($phongBan as $item)
                            <option value="{{$item->id}}">{{$item->tenphongban}}</option>
                            @endforeach
                        @endisset
                    </select>
                    <div class="label-name">
                        <label for="">Chức vụ:</label>
                    </div>
                    @empty($chucVu)
                    @endempty
                    <select class="inp-tmnv" name="chucvu" id="">
                        @isset($chucVu)
                            @foreach ($chucVu as $item)
                            <option value="{{$item->id}}">{{$item->tenchucvu}}</option>
                            @endforeach
                        @endisset
                    </select>
                    <div class="label-name">
                        <label for="">Khoa:</label>
                    </div>
                    @empty($khoa)
                    @endempty
                    <select class="inp-tmnv" name="khoa" id="">
                        @isset($khoa)
                            @foreach ($khoa as $item)
                            <option value="{{$item->id}}">{{$item->tenkhoa}}</option>
                            @endforeach
                        @endisset
                    </select>
                    <div class="label-name">
                        <label for="">Trạng thái:</label>
                    </div>
                    <input class="inp-tmnv" type="text" name="trangthai" id="">
                    <div class="label-name">
                        <label for="">Bậc lương:</label>
                    </div>
                    <input class="inp-tmnv" type="text" name="bacluong" id="">
                </div>
            </div>
            <div class="btn-tmnv">

                <button class="text-xacnhan-tmnv">Xác nhận</button>
            </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
