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

    

</head>
<body>
    <div class="wrap-thongtincanhan">
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image-2">
                        <img src="{{ asset('css/Img/download.jpeg') }}" alt="">
                    </span>
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
                                <span class="icon-home">
                                    <img src="{{ asset('icon/nhanvien.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý nhân viên</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('canhan.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/chucvu.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý chức vụ</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('canhan.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/phongban.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý phòng ban</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('canhan.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/khoa.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý khoa</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('canhan.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/khenthuong.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý khen thưởng</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('canhan.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/kyluat.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý kỷ luật</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('canhan.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/luong.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý tăng lương</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('canhan.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/hopdong.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý hợp đồng</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('canhan.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/thongtincanhan.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý thông tin cái nhân</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="">
                        <a href="{{ route('login') }}">
                            <span class="icon-home">
                                <img src="{{ asset('icon/logout.png') }}" alt="">
                            </span>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </nav>

        <div class="dsnv-main">
            <div class="wrap">
                <div class="dsnv-title">
                    <h1>Danh sách nhân viên</h1>
                </div>
                
                {{-- <div class="list-dsl">
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
                </div> --}}
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
