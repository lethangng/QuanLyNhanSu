<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="{{asset('./css/khoa.css')}}">
    <!----======== CSS ======== -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!----===== Boxicons CSS ===== -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!--<title>Dashboard Sidebar Menu</title>-->
=======
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

    <title>@yield('title')</title>

>>>>>>> aff57809f7f06c8935bc02f11880bb7100268992
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

<<<<<<< HEAD
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Quản lý tài khoản</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="thongtincanhan">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Thông tin cái nhân</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="{{route('login')}}">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>

    <section class="home">

        @yield('content')
    </section>



=======
            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="{{ route('danhsachnhanvien') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/nhanvien.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý nhân viên</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('danhsachchucvu') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/chucvu.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý chức vụ</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('danhsachphongban') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/phongban.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý phòng ban</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('danhsachkhoa') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/khoa.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý khoa</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('khenthuong.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/khenthuong.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý khen thưởng</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('kyluat.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/kyluat.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý kỷ luật</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('danhsachtangluong') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/luong.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý tăng lương</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#">
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
        @yield('content')
        /div>
>>>>>>> aff57809f7f06c8935bc02f11880bb7100268992

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
<<<<<<< HEAD
<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        // modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");

    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    })
    const modal = document.querySelector('.btn-add')
    const modalKhoa = document.querySelector('.modal-success');
    const modalKhoaContent = document.querySelector('.modal-success-content');

    modal.addEventListener("click", (e) => {
        modalKhoa.classList.add('open-modal')
        modalKhoaContent.classList.add('active')

    })
</script>

</html>
=======

</html>
>>>>>>> aff57809f7f06c8935bc02f11880bb7100268992
