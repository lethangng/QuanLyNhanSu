<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./css/style1.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <!--<title>Dashboard Sidebar Menu</title>--> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="css/Img/tải xuống.jpeg" alt="">
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
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Quản lý tài khoản</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('quanlynhanvien')}}">
                            <i class='' ></i>
                            <span class="text nav-text">Quản lý nhân viên</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='' ></i>
                            <span class="text nav-text">Quản lý khoa</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='' ></i>
                            <span class="text nav-text">Quản lý chức vụ</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='' ></i>
                            <span class="text nav-text">Quản lý phòng ban</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='' ></i>
                            <span class="text nav-text">Quản lý khen thưởng</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">chấm công</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Thông tin cái nhân</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="{{route('login')}}">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>
    <section class="home">
        @yield('content');
    </section>
    <script>
        const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        // modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");

toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

    </script>
</body>
</html>