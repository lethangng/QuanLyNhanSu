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

    <title>{{ $title }}</title>

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
            <div class="home-wrap">
                <div class="text-header">
                    <h1>Thông tin cái nhân</h1>
                </div>
                <div class="container-infor">
                    <div class="container-content-1">
                        <div class="name_and_img">
                            <h3 class="text-content">{{ $canhan->tennv }}</h3>
                            <div class="image">
                                <img class="" src="{{ asset('uploads/' . $canhan->anhdaidien) }}" alt="">
                            </div>
                        </div>
                        <div class="container-form-1">
                            <div class="form-1">
                                <label class="label-1 " for="">Mã nhân viên:</label>
                                <input type="text" class="fname" value="{{ $canhan->id }}"readonly>

                                <label class="label-2 " for="">Chức vụ:</label>
                                <input type="text" class="fname" value="{{ $canhan->chucVu->tenchucvu }}" readonly>
                            </div>
                            <div class="form-2">
                                <label class="label-3" for="">Phòng ban:</label>
                                <input type="text" class="fname" value="{{ $canhan->phongBan->tenphongban }}"
                                    readonly>

                                <label class="label-4" for="">Khoa:</label>
                                <input type="text" class="fname" value="{{ $canhan->khoa->tenkhoa }}">
                            </div>

                            <div class="form-3">
                                <label class="label-5" for="">CCCD:</label>
                                <input type="text" class="fname" value="{{ $canhan->cccd }}">

                                <label class="label-6" for="">Ngày sinh:</label>
                                @php
                                    $ngaysinh = date('d-m-Y', strtotime($canhan->ngaysinh));
                                @endphp
                                <input type="text" class="fname" value="{{ $ngaysinh }}">
                            </div>

                            <div class="form-4">
                                <label class="label-7" for="">Giới tính:</label>
                                <input type="text" class="fname" value="{{ $canhan->gioitinh }}">

                                <label class="label-8" for="">Địa chỉ:</label>
                                <input type="text" class="fname" value="{{ $canhan->diachi }}">
                            </div>
                            <div class="form-5">
                                <label class="label-9" for="">Quê quán:</label>
                                <input type="text" class="fname" value="{{ $canhan->quequan }}">

                                <label class="label-10" for="">SĐT:</label>
                                <input type="text" class="fname" value="{{ $canhan->sdt }}">
                            </div>

                        </div>
                    </div>

                    <div class="container-content-2">
                        <div class="btn-info">
                            <!-- Button trigger modal -->
                            <button class="update-avt" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Cập nhập ảnh đại điện
                            </button>
                            {{-- <button class="see-salary js-buy-ticket">Xem bảng lương</button> --}}
                            {{-- <button class="btn-changePassword">Đổi mật khẩu</button> --}}
                            <!-- Button trigger modal -->
                            <button class="change-password" data-bs-toggle="modal" data-bs-target="#updatePassword">
                                Đổi mật khẩu
                            </button>
                        </div>
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
                                <label for="file" class="btn btn-primary text-wrap" style="height: 100px">Chọn ảnh để
                                    tải lên</label> --}}
                                {{-- <div class="row">
                                    <label for="" class="col">Hình đã chọn:</label>
                                    <p class="col">hình ảnh</p>
                                </div> --}}
                                <input id="photo" name="photo" type="file" accept="image/*"
                                    onchange="upload()">
                                <div id="passwordHelp" class="form-text text-danger d-none">Ảnh phải nhỏ hơn 1MB</div>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-danger" id="update">Cập nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{-- Xem lương --}}
            {{-- <div class="modal-salary js-modal ">
                <div class="modal-container-salary js-modal-container">
                    <div class="modal-close js-modal-close">
                        <i class="ti-close"></i>
                    </div>

                    <div class="header-text">
                        @php
                            $month = date('m', strtotime($canhan->luong->ThoiGian));
                        @endphp
                        <h2>Phiếu lương tháng {{ $month }}</h2>
                    </div>
                    <table>
                        <tr>
                            <th class="th1" colspan="2">Họ và tên: {{ $canhan->HoTen }}</th>
                            <th class="th1">Mã NV: {{ $canhan->Macanhan }}</th>
                        </tr>
                        <tr>
                            <th class="th1">Chức vụ: {{ $canhan->chucVu->TenChucVu }}</th>
                            <th class="th1">Phòng ban: {{ $canhan->phongBan->TenPhongBan }}</th>
                            <th class="th1">Lương cơ bản: {{ $canhan->chucVu->LuongCoBan }}</th>

                        </tr>
                        <tr>
                            <th class="th1" colspan="2">Tổng tiền thưởng: {{ $canhan->luong->TongTienThuong }}
                                VNĐ</th>
                            <th class="th1">Tổng tiền phạt: {{ $canhan->luong->TongTienPhat }} VNĐ</th>
                        </tr>
                        <tr>
                            <th class="th1" colspan="2">Tổng số ngày làm việc làm việc:
                                {{ $canhan->luong->SoNgayLamViec }}</th>
                            <th class="th1">Thành tiền: {{ $canhan->luong->TongTienLuong }} VNĐ</th>
                        </tr>
                        <tr>
                            <th class="th1"colspan="3">Tổng số tiền nhân lương của tháng {{ $month }}
                                là: {{ $canhan->luong->TongTienLuong }} VNĐ</th>
                        </tr>
                    </table>
                </div>
            </div> --}}


            {{-- Form đổi mật khẩu --}}
            <form action="{{ route('canhan.updatePassword') }}" method="post">
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
                                        name="MatKhauCu" value="{{ old('MatKhauCu') }}"
                                        placeholder="Nhập mật khẩu cũ...">
                                    @error('MatKhauCu')
                                        <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mật khẩu mới</label>
                                    <input type="text"
                                        class="form-control @error('MatKhauMoi') border border-danger border-3 @enderror"
                                        name="MatKhauMoi" value="{{ old('Mật khẩu mới') }}"
                                        placeholder="Nhập mật khẩu cũ...">
                                    @error('MatKhauMoi')
                                        <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-danger">Cập nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
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

        function upload() {
            var fuData = document.getElementById('photo');
            var update = document.getElementById('update');
            var size = fuData.files[0].size;
            console.log(size);

            if (size > 10 ** 6) {
                console.log(size);
                $('#passwordHelp').removeClass('d-none')
                update.disabled = true;
            } else {
                $('#passwordHelp').addClass('d-none')
                update.disabled = false;
                return true
            }
        }
    </script>

    {{-- xem lương --}}
    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');

        function showSalary() {
            modal.classList.add('open')
        }

        function hideSalary() {
            modal.classList.remove('open')
        }

        for (const buyBtn of buyBtns) {
            buyBtn.addEventListener('click', showSalary)
        }

        modalClose.addEventListener('click', hideSalary)

        modal.addEventListener('click', hideSalary)

        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })
    </script>
</body>

</html>
