<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('fonts/themify-icons/themify-icons.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!----======== CSS ======== -->
    {{-- <link rel="stylesheet" href="./css/style1.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    
    <!----===== Boxicons CSS ===== -->

    <!--<title>Dashboard Sidebar Menu</title>-->

</head>

<body>
    <div class="wrap-thongtincanhan">
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    {{-- <span class="image2">
                        <img src="{{ asset('css/Img/download.jpeg') }}" alt="">
                    </span> --}}
                    <div class="text logo-text">
                        <span class="name">Team 3</span>
                        <span class="profession">Web developer</span>
                    </div>
                </div>
                <i class='bx bx-chevron-right toggle'></i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-home-alt icon'></i>
                                <span class="text nav-text">Quản lý tài chính</span>
                            </a>
                            <div class="sub-nav-link">
                                <a href="#">
                                    <span class="text nav-text">Quản lý lương </span>
                                </a>
                                <a href="#">
                                   <span class="text nav-text">Quản lý tính lương</span>
                                </a>  
                            </div>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('canhan.index') }}">
                                <i class='bx bx-bar-chart-alt-2 icon'></i>
                                <span class="text nav-text">Thông tin cái nhân</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="">
                        <a href="{{ route('login') }}">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </nav>
        <div class="dsl-main">
            <div class="wrap">
                <div class="dsl-title">
                    <h1>Danh sách lương nhân viên</h1>
                </div>
                <div class="container-dsl">
                    <div class="btn-payroll">
                        <button class="payroll">Tính lương</button>
                    </div>
                    @php
                    if(isset($_GET['s'])) {
                        // print_r($nhanvien);
                        $search = $_GET['s'];
                    }
                    else {
                        $search = '';
                    }
                    @endphp
                    <div class="component-dsl">
                        <form action="" id="luong-form">
                            {{-- @csrf --}}
                            <div>
                                <div class="date" style="margin-bottom: 20px">
                                    <label for="">Tháng</label>
                                    <input pattern="[0-9]+" class="input-month" type="text" placeholder="MM" name="m" id="m" value='<?php if(isset($_GET['s'])){echo $_GET['m']; }?>'>
                                    <label for="">Năm</label>
                                    <input pattern="[0-9]+" class="input-year" type="text" placeholder="YYYY" name="y" id="y" value='<?php if(isset($_GET['s'])){echo $_GET['y']; }?>'>
                                </div>
                                <div class="container-input-search">
                                    <input type="text" name="s" class="input-search" placeholder="Nhập tên nhân viên cần tìm"
                                    value='<?php if(isset($_GET['s'])){echo $_GET['s']; }?>'>
                                </div>
                            </div>
                            <div class="i-con" > 
                                <button type="submit" class="btn-icon-search">
                                    <i class='bx bx-search'></i>
                                </button>
                            </div>
                            <div class="i-con" > 
                                <button type="reset" class="btn-icon-rotate">
                                    <i class='bx bx-rotate-right'></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="list-dsl">
                    <table class="table-dsl table-bordered">
                        <thead>
                          <tr class = "bg-info">
                            <th class="head-table" style="max-width: 100px" scope="col">Mã nhân viên</th>
                            <th class="head-table" scope="col">Họ tên</th>
                            <th class="head-table" scope="col">HSL</th>
                            <th class="head-table" scope="col">Số ngày làm việc</th>
                            <th class="head-table" scope="col">Tổng lương</th>
                            <th class="head-table" scope="col" style="min-width: 70px"></th>
                          </tr>
                        </thead>
                        <tbody>
                           @if (isset($nhanvien))
                                @foreach ($nhanvien as $v)
                                    <tr class="">
                                        <th class="h1" scope="row">{{$v->id}}</th>
                                        <th class="h1" scope="row">{{$v->HoTen}}</th>
                                        <th class="h1" scope="row">{{$v->HSL}}</th>
                                        <th class="h1" scope="row">{{$v->SoNgayLamViec}}</th>
                                        <th class="h1" scope="row">{{$v->TongTienLuong}}</th>
                                        <th class="h1" scope="row" style="min-width: 70px">
                                            <button class="i-save">
                                                <i class='bx bx-save'></i>
                                            </button>
                                        </th>
                                    </tr>
                                @endforeach
                           @else
                           <tr class="">
                                <th class="h1" scope="row">Không tìm thấy nhân viên</th>
                           </tr>
                           @endif
                        
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Link bootstrap --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- Link jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
    <script>
    const body = document.querySelector('body'), 
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            // modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        $('.btn-icon-rotate').click(function (){
            $('.input-search').val('');
        })
        console.log('ashfjahf')
        $('#luong-form').submit(function (){
            var m = $('#m').val();
            var y = $('#y').val();
            if(m.length > 2 || parseInt(m) > 12) {
                alert("Nhập sai tháng rồi bạn ơi");
                return false;
            }
            if(y.length > 4 || m <= Date().getFullYear()){
                alert("Nhập sai năm rồi bạn ơi");
                return false;
            }
            return true;
        })
    </script>
</body>

</html>
