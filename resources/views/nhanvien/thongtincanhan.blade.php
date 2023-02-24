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
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                        <a href="{{ route('nhanvien') }}">
                            <i class='bx bx-home-alt icon'></i>
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
        <div class="text-header">
            <h1>Thông tin cái nhân</h1>
        </div>
        <div class="container">
            <div class="container-content-1">
                <div class="name_and_img">
                    <h3 class="text-content">{{ $caNhan->HoTen }}</h3>
                    <img class="image" src="{{ asset('uploads/' . $caNhan->AnhDaiDien) }}" alt="">
                </div>
                <div class="container-form-1 mt-5 row">
                    <div class="col-4 row">
                        <label class="label-1 form-label col-4" for="">Mã cá nhân:</label>
                        <input type="text" id="fname" class="form-control col" value="{{ $caNhan->MaCaNhan }}"
                            readonly>
                    </div>
                    <div class="col-4 row">
                        <label class="label-1 form-label col-4" for="">Chức vụ:</label>
                        <input type="text" id="fname" class="form-control col"
                            value="{{ $caNhan->chucVu->TenChucVu }}" readonly>
                    </div>

                    <div class="col-4 row">
                        <label class="label-2 col-5" for="">Phòng ban:</label>
                        <input type="text" id="fname" class="form-control col"
                            value="{{ $caNhan->phongBan->TenPhongBan }}" readonly>
                    </div>

                    <div class="form-3">
                        <label class="label-3" for="">Khoa:</label>
                        <input type="text" id="fname" style="width: 200px" value="{{ $caNhan->khoa->TenKhoa }}">
                    </div>
                </div>
            </div>

            <div class="container-content-3">
                <div class="container-form-4">
                    <form class="form-6">
                        <label for="">CCCD</label>
                        <input type="text" value="{{ $caNhan->CCCD }}">
                        <label class="label-8" for="">Ngày sinh:</label>
                        <input type="text" id="fname" value="{{ $caNhan->NgaySinh }}">
                        <label class="label-9" for="">Giới tính:</label>
                        <input type="text" id="fname" value="{{ $caNhan->GioiTinh }}">
                        <label class="label-10" for="">Địa chỉ:</label>
                        <input type="text" id="fname" value="{{ $caNhan->DiaChi }}">
                    </form>
                </div>
            </div>
            <div class="container-content-2">

                <div class="btn">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger col-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Cập nhập ảnh đại điện
                    </button>
                    <a class="btn-seen" href="{{ route('canhan.chiTietLuong') }}">Xem bảng lương</a>
                    {{-- <button class="btn-changePassword">Đổi mật khẩu</button> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger col-4" data-bs-toggle="modal"
                        data-bs-target="#updatePassword">
                        Đổi mật khẩu
                    </button>
                </div>
            </div>
        </div>
        {{-- Form cập nhập ảnh đại diện --}}
        <form action="{{ route('canhan.addPhoto') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cập nhập ảnh đại diện</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- <input class="btn-update" id="file" name="filePhoto" type="file"
                                accept="image/*" style="display: none">
                            <label for="file" class="btn btn-primary text-wrap"
                                style="height: 100px">Chọn ảnh để
                                tải lên</label> --}}
                            {{-- <div class="row">
                                <label for="" class="col">Hình đã chọn:</label>
                                <p class="col">hình ảnh</p>
                            </div> --}}
                            <input id="file" name="photo" type="file" accept="image/*">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Cập nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- Form đổi mật khẩu --}}
        <form action="{{ route('canhan.addPhoto') }}" method="post">
            @csrf
            <!-- Modal -->
            <div class="modal fade" id="updatePassword" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu cũ</label>
                                <input type="text"
                                    class="form-control @error('MatKhauCu') border border-danger border-3 @enderror"
                                    name="MatKhauCu" value="{{ old('MatKhauCu') }}">
                                @error('MatKhauCu')
                                    <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu mới</label>
                                <input type="text"
                                    class="form-control @error('MatKhauMoi') border border-danger border-3 @enderror"
                                    name="MatKhauMoi" value="{{ old('Mật khẩu mới') }}">
                                @error('MatKhauMoi')
                                    <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Cập nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    {{-- Link bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
