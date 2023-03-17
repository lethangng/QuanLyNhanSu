@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
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
                        @php
                            if ($canhan->anhdaidien) {
                                $url = asset('uploads/images/' . $canhan->anhdaidien);
                            } else {
                                $url = asset('uploads/facebook.jpg');
                            }
                        @endphp
                        <div class="image">
                            <img class="" src="{{ $url }}" alt="">
                        </div>
                    </div>
                    <div class="container-form-1">
                        <div class="form-1">
                            <label class="label-1 " for="">Mã nhân viên:</label>
                            <input type="text" class="fname" value="{{ $canhan->id }}"readonly>

                            <label class="label-2 " for="">Chức vụ:</label>
                            <input type="text" class="fname" value="{{ $canhan->chucVu->tenchucvu ?? '' }}" readonly>
                        </div>
                        <div class="form-2">
                            <label class="label-3" for="">Phòng ban:</label>
                            <input type="text" class="fname" value="{{ $canhan->phongBan->tenphongban ?? '' }}"
                                readonly>

                            <label class="label-4" for="">Khoa:</label>
                            <input type="text" class="fname" value="{{ $canhan->khoa->tenkhoa ?? '' }}" readonly>
                        </div>

                        <div class="form-3">
                            <label class="label-5" for="">CCCD:</label>
                            <input type="text" class="fname" value="{{ $canhan->cccd }}" readonly>

                            <label class="label-6" for="">Ngày sinh:</label>
                            @php
                                $ngaysinh = date('d-m-Y', strtotime($canhan->ngaysinh));
                            @endphp
                            <input type="text" class="fname" value="{{ $ngaysinh }}" readonly>
                        </div>

                        <div class="form-4">
                            <label class="label-7" for="">Giới tính:</label>
                            <input type="text" class="fname" value="{{ $canhan->gioitinh }}" readonly>

                            <label class="label-8" for="">Địa chỉ:</label>
                            <input type="text" class="fname" value="{{ $canhan->diachi }}" readonly>
                        </div>
                        <div class="form-5">
                            <label class="label-9" for="">Quê quán:</label>
                            <input type="text" class="fname" value="{{ $canhan->quequan }}" readonly>

                            <label class="label-10" for="">SĐT:</label>
                            <input type="text" class="fname" value="{{ $canhan->sdt }}" readonly>
                        </div>
                        <div class="form-6">
                            <label class="label-11" for="">Bậc lương:</label>
                            <input type="text" class="fname" value="{{ $canhan->bacluong ?? '' }}" readonly>

                            <label class="label-12" for="">HSL:</label>
                            <input type="text" class="fname" value="{{ $canhan->hsl ?? '' }}" readonly>
                        </div>

                    </div>
                </div>

                <div class="container-content-2">
                    <div class="btn-info">
                        <!-- Button trigger modal -->
                        <button class="update-avt" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Cập nhập ảnh đại điện
                        </button>
                        @if (Auth::user()->manv == $id)
                            <!-- Button trigger modal -->
                            <button class="change-password" data-bs-toggle="modal" data-bs-target="#modalPassword">
                                Đổi mật khẩu
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Form cập nhập ảnh đại diện --}}
        <form action="{{ route('canhan.addPhoto', ['id' => $id]) }}" method="post" enctype="multipart/form-data"
            id="addphoto">
            @csrf
            <!-- Modal -->
            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="exampleModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cập nhập ảnh đại diện</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- <input class="btn-update" ijs-modald="file" name="filePhoto" type="file"
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
                            <button type="submit" class="btn btn-danger js-buy-ticket" id="update">Cập
                                nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        {{-- Form đổi mật khẩu --}}
        <form action="{{ route('canhan.updatePassword') }}" method="post" id="update-password">
            @csrf
            <!-- Modal -->
            <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                id="modalPassword">
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
                                <input type="password" class="form-control" name="matkhaucu"
                                    placeholder="Nhập mật khẩu cũ...">
                                <div id="passwordHelp" class="form-text text-danger error-text old-password">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu mới</label>
                                <input type="password" class="form-control" name="matkhaumoi"
                                    placeholder="Nhập mật khẩu mới..." id="new-password">
                                <div id="passwordHelp" class="form-text text-danger error-text new-password">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới..."
                                    id="re-new-password" name="nhaplai">
                                <div id="passwordHelp" class="form-text text-danger error-text re-new-password">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
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
    {{-- Link jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');
        const confirm = document.querySelector('.confirm');
        const modal_photo = document.querySelector('#exampleModal');

        function showBuyTickets() {
            modal.classList.add('open')
        }

        function hideBuyTickets() {
            modal.classList.remove('open')
            window.location = '{{ route('canhan.index', ['id' => $id]) }}'
        }
        // for (const buyBtn of buyBtns) {
        //     buyBtn.addEventListener('click', showBuyTickets)
        // }
        modalClose.addEventListener('click', hideBuyTickets)
        modal.addEventListener('click', hideBuyTickets)
        confirm.addEventListener('click', hideBuyTickets);

        // modalContainer.addEventListener('click', function(event) {
        //     event.stopPropagation()
        // })
    </script>

    {{-- Xu ly doi anh dai dien --}}
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
                            console.log(modal);
                            modal.classList.add('open')
                        } else {
                            printErrorMsg(data.error, '_err')
                            console.log(data);
                        }
                    }
                });
            });
        });
    </script>

    {{-- Xu ly doi mat khau --}}
    <script type="text/javascript">
        $(document).ready(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#update-password').submit(function(e) {
                e.preventDefault();
                if ($('#new-password').val() === '') {
                    $('.new-password').text("Mật khẩu mới bắt buộc phải nhập.")
                } else {
                    $('.new-password').text("")
                    if ($('.re-new-password').val() !== $('#new-password').val()) {
                        $('.re-new-password').text("Mật khẩu nhập lại không chính xác.")
                    }
                }
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        // this.reset();
                        var error = document.querySelectorAll(".error-text");
                        error.innerHTML = "";
                        if (data.check == true) {
                            console.log(data)
                            modal.classList.add('open')
                        } else {
                            $(".old-password").text(data.error);
                            console.log(data);
                        }
                    }
                });
            });
        });
    </script>
@endsection
