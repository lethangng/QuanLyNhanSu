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
                <div class="ctl-title">
                    <h1>Chi tiết lương</h1>
                </div>
                <div class="table-container">
                    <div class="text-title">
                        <h1>Phiếu lương tháng 6</h1>
                    </div>
                    
                    <table class="ctl-table">
                        <tr>
                            <th class="th1" colspan="2">Họ và tên: Vũ Trí Thành</th>
                            <th class="th1" >Mã NV: 1</th>
                        </tr>
                        <tr>
                            <th class="th1">Chức vụ: Giám đốc</th>
                            <th class="th1">Phòng ban: Phòng tài chính</th>
                            <th class="th1">Lương cơ bản: 10000000</th>
                            
                        </tr>
                        <tr>
                            <th class="th1" colspan="2">Tổng tiền thưởng: 200000</th>
                            <th class="th1" >Tổng tiền phạt: 10000</th>
                        </tr>
                        <tr>
                            <th class="th1" colspan="2">Tổng số thời gian làm việc:180h</th>
                            <th class="th1" >Thành tiền: 130000000</th>
                        </tr>
                        <tr>
                            <th  class="th1"colspan="3" >Tổng số tiền nhân lương của tháng 6 là: 30000000</th>
                        </tr>
                    </table>
                </div>
                <div class="btn-salary">
                    <button class="salary">Xuất lương</button>
                </div>
            </div>
        </div>
    {{-- Link bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Link jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
