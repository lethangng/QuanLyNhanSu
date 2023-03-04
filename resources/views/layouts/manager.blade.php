<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    {{-- <link rel="stylesheet" href="./css/style1.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    {{-- Link bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    {{-- Link select2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Link icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
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
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Quản lý tài khoản</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class=''></i>
                            <span class="text nav-text">Quản lý nhân viên</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class=''></i>
                            <span class="text nav-text">Quản lý khoa</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class=''></i>
                            <span class="text nav-text">Quản lý chức vụ</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class=''></i>
                            <span class="text nav-text">Quản lý phòng ban</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('khenthuong.index') }}">
                            <i class=''></i>
                            <span class="text nav-text">Quản lý khen thưởng</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('khenthuong.index') }}">
                            <i class=''></i>
                            <span class="text nav-text">Quản lý kỷ luật</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Chấm công</span>
                        </a>
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
    <section class="home">
        <div class="mx-5">
            @yield('content')
        </div>
    </section>
    {{-- Link bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Link jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Link select2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
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
    <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>

</html>
