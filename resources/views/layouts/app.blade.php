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
                                <span class="text nav-text">Qu???n l?? nh??n vi??n</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('danhsachchucvu') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/chucvu.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Qu???n l?? ch???c v???</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('danhsachphongban') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/phongban.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Qu???n l?? ph??ng ban</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('danhsachkhoa') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/khoa.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Qu???n l?? khoa</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('khenthuong.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/khenthuong.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Qu???n l?? khen th?????ng</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('kyluat.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/kyluat.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Qu???n l?? k??? lu???t</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('tangluong.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/luong.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Qu???n l?? t??ng l????ng</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('hopdong.index') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/hopdong.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Qu???n l?? h???p ?????ng</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('danhsachtrangthai') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/icontrangthai.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Qu???n l?? tr???ng th??i</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('qlbaocaothongke') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/iconthongke.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Qu???n l?? b??o c??o</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('danhsachtaikhoan') }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/iconqltk.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Qu???n l?? t??i kho???n</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('canhan.index', ['id' => Auth::user()->manv]) }}">
                                <span class="icon-home">
                                    <img src="{{ asset('icon/thongtincanhan.png') }}" alt="">
                                </span>
                                <span class="text nav-text">Qu???n l?? th??ng tin c??i nh??n</span>
                            </a>
                        </li>
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
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')

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
    </div>
</body>

</html>
