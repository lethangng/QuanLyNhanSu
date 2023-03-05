@extends('layouts.app')
@section('content')
    <div class="modal js-modal ">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>
            <div class="Update-successful">
                <p style="line-height:12;">Bạn có chắc chắn muốn xóa không</p>
                <button class="btn btn-primary" style="width:50%;height:20%;position:absolute;bottom: 0;left:0;">xác
                    nhận</button>
                <button class="btn btn-danger" style="width:50%;height:20%;position:absolute;bottom: 0;right:0;">Hủy</button>
            </div>
        </div>
    </div>
    <div class="dsnv-main">
        <div class="wrap">
            <div class="dsnv-title">
                <h1>Danh sách nhân viên</h1>
            </div>
            <form action="{{ route('themmoinhanvien') }}">
                <div class="btn-tnv">
                    <button class="nv">Thêm mới nhân viên</button>
                </div>
            </form>

            <div class="text-filter">
                <span>Lọc theo:</span>
                <label class="form-filter" for="">
                    <input class="" type="radio" name="" id=""> Phòng ban
                </label>
                <label class="form-filter" for="">
                    <input class="" type="radio" name="" id=""> Chức vụ
                </label>
                <label class="form-filter" for="">
                    <input class="" type="radio" name="" id=""> Khoa
                </label>
            </div>

            <div class="custom-select-input">
                <select class="select-name" name="" id="">
                    <option value=""></option>
                    <option value="">abc</option>
                </select>
                <span class="icon-reset">
                    <img src="{{ asset('icon/reset.png') }}" alt="">
                </span>
                <span class="icon-search">
                    <img src="{{ asset('icon/search.png') }}" alt="">
                </span>

                <input class="input-search-name" type="text" placeholder="Nhập tên nhân viên cần tìm">

            </div>
            <div class="list-dsnv">
                <table class="table-dsnv table-bordered">
                    <thead>
                        <tr class="bg-info">
                            <th class="head-table" scope="col">Mã nhân viên</th>
                            <th class="head-table" scope="col">Họ tên</th>
                            <th class="head-table" scope="col">Emai</th>
                            <th class="head-table" scope="col">CMND</th>
                            <th class="head-table" scope="col">Giới tính</th>
                            <th class="head-table" scope="col">Chức vụ</th>
                            <th class="head-table" scope="col">Tên phòng ban</th>
                            <th class="head-table" scope="col">Khoa</th>
                            <th class="head-table" scope="col">Trạng thái</th>
                            <th class="head-table" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <th class="h1" scope="row">1</th>
                            <th class="h1" scope="row">Vũ Trí Thành</th>
                            <th class="h1" scope="row">thanhvu@</th>
                            <th class="h1" scope="row">23929923012</th>
                            <th class="h1" scope="row">Nam</th>
                            <th class="h1" scope="row">Giám đốc</th>
                            <th class="h1" scope="row">Phòng nhân sự</th>
                            <th class="h1" scope="row">Null</th>
                            <th class="h1" scope="row">Đi làm</th>
                            <th class="h1" scope="row">
                                <button class="i-save">
                                    <a href="">
                                        <img src="{{ asset('icon/save.png') }}" alt="">
                                    </a>
                                </button>
                                <button class="i-edit">
                                    <i class='bx bx-edit'></i>
                                </button>z
                                <button class="i-rotate">
                                    <i class='bx bx-trash js-buy-ticket'></i>
                                </button>

                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            // modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })
    </script>
    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');

        function showBuyTickets() {
            modal.classList.add('open')
        }

        function hideBuyTickets() {
            modal.classList.remove('open')
        }

        for (const buyBtn of buyBtns) {
            buyBtn.addEventListener('click', showBuyTickets)
        }

        modalClose.addEventListener('click', hideBuyTickets)

        modal.addEventListener('click', hideBuyTickets)

        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })
    </script>
    </body>

    </html>
@endsection
