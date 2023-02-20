<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="./css/style3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
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
                        <a href="{{route('nhanvien')}}">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">chấm công</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('thongtinnhanvien')}}">
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
        
            <div class="header">
                <h1>Chấm công nhân viên</h1>
            </div>
    
            <div class="container-inf">
                <div class="text-inf">
                    <h4>Mã nhân viên: 5</h4>
                    <h4>Họ tên: Nguyễn Văn A</h4>
                    <h4>Phòng ban: Phòng CNTT</h4>
                    <h4>Chức vụ: Giám Đốc</h4>
                </div>
            </div>
    
            <div class="btn">
                <button class="btn-timekeeping">Chấm công</button>
            </div>
    
            <div class="container-date">
                <form action="" class="form-date">
                    <label for="">Tháng</label>
                    <input type="text" class="input-1" placeholder="MM">
                    <label for="">Năm</label>
                    <input type="text" class="input-2"  placeholder="YYY">
                </form>
                
                <div class="icon">
                    <button class="btn-icon">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </div>
            </div>
    
            <div class="container-table">
                <table class="table table-bordered ">
                    <thead>
                      <tr class="table-primary">
                        <th class="head-table" scope="col">Ngày</th>
                        <th class="head-table" scope="col">Thời Gian Vào</th>
                        <th class="head-table" scope="col">Thời Gian Ra</th>
                        <th class="head-table" scope="col">Thời Gian Làm Việc</th>
                        <th class="head-table" scope="col">Tăng Ca</th>
                        <th class="head-table" scope="col">Trạng Thái</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th class="number-table" scope="row" type="date"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th class="number-table" scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th class="number-table" scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th class="number-table" scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
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