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
                                <i class='bx bx-coin-stack icon'></i>
                                {{-- <i class='bx bx-home-alt icon'></i> --}}
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
                                <span class="text nav-text">Chấm công</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('canhan.index') }}">
                                <i class='bx bxs-user icon'></i>
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
                    <h1>Danh sách lương</h1>
                </div>
                <div class="component-dsl">
                    <form action="#">
                        <div class="container-input-search">
                            <input type="text" class="input-search" placeholder="Nhập tên nhân viên cần tìm">
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
                <div class="list-dsl">
                    <table class="table-dsl table-bordered">
                        <thead>
                          <tr class = "bg-info">
                            <th class="head-table" scope="col">Mã nhân viên</th>
                            <th class="head-table" scope="col">Họ tên</th>
                            <th class="head-table" scope="col">HSL</th>
                            <th class="head-table" scope="col">Lương cơ bản</th>
                            <th class="head-table" scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="">
                            <th class="h1" scope="row">1</th>
                            <th class="h1" scope="row">Vũ Trí Thành</th>
                            <th class="h1" scope="row">4.2</th>
                            <th class="h1" scope="row">1000000</th>
                            <th class="h1" scope="row">
                                <button class="i-edit">
                                    <i class='bx bx-edit'></i>
                                </button>
                                <button class="i-rotate">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </th>
                          </tr>
                          <tr>
                            <th class="h1" scope="row">2</th>
                            <th class="h1" scope="row">Nguyễn Văn A</th>
                            <th class="h1" scope="row">4.2</th>
                            <th class="h1" scope="row">1000000</th>
                            <th class="h1" scope="row">
                                <button class="i-edit">
                                    <i class='bx bx-edit'></i>
                                </button>
                                <button class="i-rotate">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </th>
                          </tr>
                          <tr>
                            <th class="h1" scope="row">2</th>
                            <th class="h1" scope="row">Nguyễn Văn b</th>
                            <th class="h1" scope="row">1.2</th>
                            <th class="h1" scope="row">1021100</th>
                            <th class="h1" scope="row">
                                <button class="i-edit">
                                    <i class='bx bx-edit'></i>
                                </button>
                                <button class="i-rotate">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </th>
                          </tr>
                          <tr>
                            <th class="h1" scope="row">2</th>
                            <th class="h1" scope="row">Nguyễn Văn C</th>
                            <th class="h1" scope="row">3.3</th>
                            <th class="h1" scope="row">1120000</th>
                            <th class="h1" scope="row">
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
