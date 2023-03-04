@extends('layouts.app')
@section('content')
        <div class="dsnv-main">
            <div class="wrap">
                <div class="dsnv-title">
                    <h1>Danh sách nhân viên</h1>
                </div>
                <div class="btn-tnv">
                    <button class="nv">Thêm mới nhân viên</button>
                </div>

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
                          <tr class = "bg-info">
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
                                    <img src="{{ asset('icon/save.png') }}" alt="">
                                </button>
                                <button class="i-edit">
                                    <i class='bx bx-edit'></i>
                                </button>
                                <button class="i-rotate">
                                    <i class='bx bx-trash'></i>
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
</body>
</html>
@endsection
