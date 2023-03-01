<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style8.css">
    <link rel="stylesheet" href="./css/style9.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
     <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="./css/Img/download.jpeg" alt="">
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
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Thông tin cái nhân</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>
    <section class="home">
        <div class="text"></div>
        <div class="container">
            <div class="header">
                <h1>Danh sách nhân viên</h1>
            </div>
    
            <div class="container-btn">
                <button class="btn-add">Thêm mới nhân viên</button>
            </div>
    
            <div class="container-status">
                <form action="">
                    <label for="" class="status">Trạng thái:</label>
                    <input name="" type="radio" value="" class="inp-stt" />Tất cả
                    <input name="" type="radio" value="" class="inp-stt" />Đang làm việc
                    <input name="" type="radio" value="" class="inp-stt" />Nghỉ việc
                </form>
            </div>
            <div class="container-search">
                <form action="">
                    <label for="" class="search">Tìm kiếm theo:</label>
                    <input name="" type="radio" value="" class="inp-stt" />Mã nhân viên
                    <input name="" type="radio" value="" class="inp-stt" />Tên nhân viên
                    <input name="" type="radio" value="" class="inp-stt" />Phòng ban
                </form>
                </form>
            </div>
    
            <div class="input-search">
                <input type="text" name="" id="inp-search">
                <button class="btn-search" ><i class='bx bx-search icon'></i></button>
                <button class="btn btn-danger" ><i class='bx bx-rotate-right'></i></button>
            </div>
    
            <div class="container-table">
                <table class="table table-bordered">
                    <thead>
                      <tr class = "bg-info">
                        <th class="header-table" scope="col">Mã giảng viên</th>
                        <th class="header-table" scope="col">Họ tên</th>
                        <th class="header-table" scope="col">Email</th>
                        <th class="header-table" scope="col">CMND</th>
                        <th class="header-table" scope="col">Giới tính</th>
                        <th class="header-table" scope="col">Chức vụ</th>
                        <th class="header-table" scope="col">Tên phòng ban</th>
                        <th class="header-table" scope="col">Khoa</th>
                        <th class="header-table" scope="col">Trạng thái</th>
                        <th class="header-table" scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                    <tbody>
			@isset($caNhan)
			 @foreach ($caNhan as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->HoTen }}</td>
                <td>{{ $item->email }}</td>
		<td>{{ $item->CCCD }}</td>
                <td>{{ $item->GioiTinh }}</td>
		<td>{{ $item->TenChucVu }}</td>
                <td>{{ $item->TenPhongBan }}</td>
                <td>{{ $item->TenKhoa }}</td>
                @if($item->TrangThai==1)
                <td>
                    <input type="checkbox" name="" value="" class="check-box" checked disabled="disabled">
                </td>
                @else
                <td>
                    <input type="checkbox" name="" value="" class="check-box" disabled="disabled">
                </td>
                @endif
                <td>
                    <button class="icon-edit">
                        <i class='bx bx-edit'></i>
                    </button>
                </td>
              </tr>
              @endforeach
			@endisset
 
			@empty($caNhan)
			@endempty

                     
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
