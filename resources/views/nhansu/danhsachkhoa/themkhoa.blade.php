@extends('layouts.app')
@section('content')
<div class="header">
    <h1>Thêm mới khoa</h1>
</div>
<div class="container">


    <div class="input-add">
        <p class="input-text">Mã khoa:</p>
        <input type="text" placeholder="Nhập mã khoa" name="" id="inp-add-id" class="input">
    </div>
    <div class="input-add">
        <p class="input-text">Tên khoa:</p>
        <input type="text" placeholder="Nhập tên khoa" name="" id="inp-name" class="input">
    </div>
    <button class="btn-add">Xác nhận</button>

    <div class="modal-success">
        <div class="modal-success-content">
            <div class="modal-close">
                <i class='bx bx-x modal-btn-close'></i>
            </div>
            <div class="modal-icon">
                <i class='bx bxs-check-circle '></i>
            </div>
            <div class="modal-text">
                <p>Thêm thành công</p>
            </div>
            <button class="modal-btn-add">Xác nhận</button>

        </div>
    </div>

</div>
@endsection