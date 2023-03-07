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
                        <div class="label-name">
                            <label for="">Họ tên:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="" id="">
                        <div class="label-name">
                            <label for="">Ngày sinh:</label>
                        </div>
                        <input class="inp-tmnv" type="date" name="" id="">
                        <div class="label-name">
                            <label for="">Giới tính:</label>
                        </div>
                        <select class="inp-tmnv" name="" id="">
                            <option value=""></option>
                            <option value="">Nam</option>
                            <option value="">Nữ</option>
                        </select>
                        <div class="label-name">
                            <label for="">CMND:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="" id="">
                        <div class="label-name">
                            <label for="">Địa chỉ:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="" id="">
                        <div class="label-name">
                            <label for="">Email:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="" id="">
                        <div class="label-name">
                            <label for="">HSL:</label>
                        </div>
                        <input class="inp-tmnv" type="text" name="" id="">
                </div>
                <div class="col-sm right-inf">
                    <div class="label-name">
                        <label for="">Quê quán:</label>
                    </div>
                    <input class="inp-tmnv" type="text" name="" id="">
                    <div class="label-name">
                        <label for="">Số điện thoại:</label>
                    </div>
                    <input class="inp-tmnv" type="text" name="" id="">
                    <div class="label-name">
                        <label for="">Phòng ban:</label>
                    </div>
                    <select class="inp-tmnv" name="" id="">
                        <option value=""></option>
                        <option value="">Phòng đào tạo</option>
                        <option value="">Phòng tài chính - kế toán</option>
                    </select>
                    <div class="label-name">
                        <label for="">Chức vụ:</label>
                    </div>
                    <select class="inp-tmnv" name="" id="">
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <div class="label-name">
                        <label for="">Khoa:</label>
                    </div>
                    <select class="inp-tmnv" name="" id="">
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <div class="label-name">
                        <label for="">Trạng thái:</label>
                    </div>
                    <input class="inp-tmnv" type="text" name="" id="">
                    <div class="label-name">
                        <label for="">Bậc lương:</label>
                    </div>
                    <input class="inp-tmnv" type="text" name="" id="">
                </div>
            </div>
            <div class="btn-tmnv">
                <button class="text-xacnhan-tmnv">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
</div>
@endsection