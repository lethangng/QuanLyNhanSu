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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!----======== CSS ======== -->
    {{-- <link rel="stylesheet" href="./css/style1.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">

    <!----===== Boxicons CSS ===== -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('script')
</head>

<body>
    <div class="wrap">
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
                            <a href="{{ route('tangluong.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/luong.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý tăng lương</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('hopdong.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/hopdong.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý hợp đồng</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('danhsachtrangthai') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/icontrangthai.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý trạng thái</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('qlbaocaothongke') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/iconthongke.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý báo cáo</span>
                            </a>
                        </li>
                        {{--   --}}
                        @if (Auth::user()->checkRoleInUser(Auth::user()->manv))
                            <li class="nav-link">
                                <a href="{{ route('danhsachtaikhoan') }}">
                                    <span class="icon-home">
                                        <img src="{{ asset('icon/iconqltk.png') }}" alt="">
                                    </span>
                                    <span class="text nav-text">Quản lý tài khoản</span>
                                </a>
                            </li>
                        @endif

                        <li class="nav-link">
                            <a href="{{ route('canhan.index', ['id' => Auth::user()->manv]) }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/thongtincanhan.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Quản lý thông tin cái nhân</span>
                            </a>
                        </li>
                        <div class="bottom-content">
                            <li class="">
                                <a href="{{ route('logout') }}">
                                    <span class="icon-home">
                                        <img src="{{ asset('icon/logout.png') }}" alt="">
                                    </span>
                                    <span class="text nav-text">Logout</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')

        <script>
            const body = document.querySelector('body'),
                sidebar = body.querySelector('nav'),
                toggle = body.querySelector(".toggle"),
                modeText = body.querySelector(".mode-text");

            toggle.addEventListener("click", () => {
                sidebar.classList.toggle("close");
            })
        </script>
    </div>
</body>

</html>
