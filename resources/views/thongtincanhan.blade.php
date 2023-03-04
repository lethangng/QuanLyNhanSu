@extends('layouts.app')
@section('content')
        <section class="home">
            <div class="home-wrap">
                <div class="text-header">
                    <h1>Thông tin cá nhân</h1>
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
                                <input type="text" class="fname" value="{{ $canhan->khoa->tenkhoa ?? '' }}">
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
                            <div class="form-6">
                                <label class="label-11" for="">Lương cơ bản:</label>
                                <input type="text" class="fname" value="">

                                <label class="label-12" for="">HSL:</label>
                                <input type="text" class="fname" value="">
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
            <form action="{{ route('canhan.addPhoto') }}" method="post" enctype="multipart/form-data"
                id="addphoto">
                @csrf
                <!-- Modal -->
                <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="exampleModal"
                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
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
                                <input id="photo" name="photo" type="file" accept="image/*">
                                <div id="passwordHelp" class="form-text text-danger error-text photo_err"></div>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-danger js-buy-ticket" id="update">Cập nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            {{-- Form đổi mật khẩu --}}
            <form action="{{ route('canhan.updatePassword') }}" method="post">
                @csrf
                <!-- Modal -->
                <div class="modal fade" id="updatePassword" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" id="modal-addphoto">
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

    {{-- Form cập nhật thành công --}}

    <div class="modal js-modal ">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

            <div class="Update-successful">
                <span class="icon-successfull">
                    <img src="{{ asset('css/Img/image 36.png') }}" alt="">
                </span>
                <div class="text-dmk">
                    <span>Cập nhật thành công</span>
                </div>

                <div class="footer-Update-successful">
                   <button class="confirm"> Xác nhận</button>
                </div>
            </div>
           
        </div>
    </div>

    {{-- Link bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    {{-- Link jquery --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            // modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        // function upload() {
        //     var fuData = document.getElementById('photo');
        //     var update = document.getElementById('update');
        //     var size = fuData.files[0].size;
        //     console.log(size);

        //     if (size > 10 ** 6) {
        //         console.log(size);
        //         $('#passwordHelp').removeClass('d-none')
        //         update.disabled = true;
        //     } else {
        //         $('#passwordHelp').addClass('d-none')
        //         update.disabled = false;
        //         return true
        //     }
        // }
    </script>
    {{-- <script>
        $("#addphoto").on('submit', function(e) {
            e.preventDefault();
            console.log($(this).serialize())
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                processData: false,
                success: function(data) {
                    // var jsonData = JSON.parse(data);
                    var error = document.querySelectorAll(".error-text");
                    error.innerHTML = "";
                    if (data.error_check == true) {
                        $('.photo_err').text(data.msg);
                    } else {
                        console.log(data.msg)
                        formforgot.classList.remove("open");
                        window.location.href = data.url;
                    }
                }
            });
        });
    </script> --}}
    <script type="text/javascript">
        const formaddphoto = document.querySelector('.modal');

        function printErrorMsg(msg, $err) {
            $.each(msg, function(key, value) {
                $('.' + key + $err).text(value);
            });
        }
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#addphoto').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        // this.reset();
                        var error = document.querySelectorAll(".error-text");
                        error.innerHTML = "";
                        if (data.check == true) {
                            window.location = $(this).attr('action')
                        } else {
                            printErrorMsg(data.error, '_err')
                            console.log(data);
                        }
                    }
                });
            });
        });
    </script>

    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');

        function showBuyTickets(){
            modal.classList.add('open')
        }

        function hideBuyTickets(){
            modal.classList.remove('open')
        }

        for (const buyBtn of buyBtns){
            buyBtn.addEventListener('click', showBuyTickets)
        }

        modalClose.addEventListener('click', hideBuyTickets)

        modal.addEventListener('click', hideBuyTickets)
        
        modalContainer.addEventListener('click', function(event)
        {
            event.stopPropagation()
        })
    </script>
@endsection