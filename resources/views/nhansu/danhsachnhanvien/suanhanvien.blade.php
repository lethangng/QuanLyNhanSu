@extends('layouts.app')
@section('content')
<div class="tmnv-main">
    <div class="wrap">
        <div class="tmnv-title">
            <h1>Sửa nhân viên</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm left-inf-tmnv">
                    <form action="{{ url('capnhatnhanvien/id='.$caNhan->id) }}" method="POST">
                    @csrf

                        <div class="label-name">
                            <label for="">Họ tên:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="hoten" id="" value="{{ $caNhan->tennv }}">
                        <div class="label-name">
                            <label for="">Ngày sinh:</label>
                        </div>
                        <input class="inp-tmnv" type="date" name="ngaysinh" id="" value="{{ $caNhan->ngaysinh }}">
                        <div class="label-name">
                            <label for="">Giới tính:</label>
                        </div>
                        <select class="inp-tmnv" name="gioitinh" id="" >
                            @if($caNhan->gioitinh=="Nam")
                            <option value="Nam" selected>Nam</option>
                            <option value="Nữ">Nữ</option>
                            @else
                            <option value="Nam">Nam</option>
                            <option value="Nữ" selected>Nữ</option>
                            @endif
                        </select>
                        <div class="label-name">
                            <label for="">CMND:</label>
                        </div>
                        <input class="inp-tmnv" type="number" name="cccd" id="" value="{{ $caNhan->cccd }}">
                        <div class="label-name">
                            <label for="">Địa chỉ:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="diachi" id="" value="{{ $caNhan->diachi }}">
                        <div class="label-name">
                            <label for="">Email:</label>
                        </div>
                        <input class="inp-tmnv" type="email" name="email" id="" value="{{ $caNhan->email }}">
                        <div class="label-name">
                            <label for="">HSL:</label>
                        </div>
                        <input class="inp-tmnv" type="number" name="hsl" id="" value="{{ $caNhan->hsl }}">
                </div>
                <div class="col-sm right-inf-tmnv">
                    <div class="label-name">
                        <label for="">Quê quán:</label>
                    </div>
                    <input class="inp-tmnv" type="text" name="quequan" id="" value="{{ $caNhan->quequan }}">
                    <div class="label-name">
                        <label for="">Số điện thoại:</label>
                    </div>
                    <input class="inp-tmnv" type="number" name="sodienthoai" id="" value="{{ $caNhan->sdt }}">
                    <div class="label-name">
                        <label for="">Phòng ban:</label>
                    </div>
                    <select class="inp-tmnv" name="phongban" id="">
                    @foreach($phongBan as $item)
                        @if($caNhan->maphongban==$item->id)
                        <option value="{{$item->id}}" selected>{{$item->tenphongban}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->tenphongban}}</option>
                        @endif
                    @endforeach
                    </select>
                    <div class="label-name">
                        <label for="">Chức vụ:</label>
                    </div>
                    <select class="inp-tmnv" name="chucvu" id="">
                    @foreach($chucVu as $item)
                        @if($caNhan->machucvu==$item->id)
                        <option value="{{$item->id}}" selected>{{$item->tenchucvu}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->tenchucvu}}</option>
                        @endif
                    @endforeach
                    </select>
                    <div class="label-name">
                        <label for="">Khoa:</label>
                    </div>
                    <select class="inp-tmnv" name="khoa" id="">
                    @foreach($khoa as $item)
                        @if($caNhan->makhoa==$item->id)
                        <option value="{{$item->id}}" selected>{{$item->tenkhoa}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->tenkhoa}}</option>
                        @endif
                    @endforeach
                    </select>
                    <div class="label-name">
                        <label for="">Trạng thái:</label>
                    </div>
                    <select class="inp-tmnv" name="trangthai" id="">
                    @foreach($trangThai as $item)
                        @if($caNhan->matrangthai==$item->id)
                        <option value="{{$item->id}}" selected>{{$item->tentrangthai}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->tentrangthai}}</option>
                        @endif
                    @endforeach
                    </select>

                    </select>
                    <div class="label-name">
                        <label for="">Bậc lương:</label>
                    </div>
                    <input class="inp-tmnv" type="number" name="bacluong" id="" value="{{ $caNhan->bacluong }}">
                </div>
                @if (\Session::has('message'))
                <div class="alert alert-danger">
                <strong>{!! \Session::get('message') !!}</strong>
                </div>
                @endif
            </div>
            <div class="btn-tmnv">
                <button class="text-xacnhan-tmnv">Xác nhận</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
