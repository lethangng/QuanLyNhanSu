@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="tmnv-main">
        <div class="wrap">
            <div class="tmnv-title">
                <h1>Cập nhập khen thưởng</h1>
            </div>
            <div class="container">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data" class="col-sm left-inf">
                        @method('PUT')
                        @csrf
                        <div class="tnv">
                            <label for="">Tên nhân viên:</label>
                        </div>
                        <input class="ip-tnv" type="text" name="tennv" id="ten_nhanvien" readonly
                            value="{{ $khenthuong->nhanvien->tennv }}">
                        <div class="mnv">
                            <label for="">Mã nhân viên</label>
                        </div>
                        <input class="ip-mnv" type="text" name="manv" id="ma_nhanvien"
                            placeholder="Nhập mã nhân viên..." pattern="[0-9]+" value="{{ $khenthuong->manv }}">
                        <div id="err_ajax" class="form-text text-danger text-danger_manv"></div>
                        <div class="ngkt">
                            <label for="">Ngày khen thưởng:</label>
                        </div>
                        <input class="ip-ngkt" type="date" name="ngaykhenthuong" id=""
                            value="{{ $khenthuong->ngaykhenthuong }}">
                        @error('ngaykhenthuong')
                            <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                        <div class="ld">
                            <label for="">Lý do:</label>
                        </div>
                        <input class="ip-ld" type="text" name="lydo" id="" placeholder="Nhập lý do..."
                            value="{{ $khenthuong->lydo }}">
                        @error('lydo')
                            <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                        <div class="ctkt">
                            <label for="">Chi tiết khen thưởng:</label>
                        </div>
                        <input type="file" name="upfile" accept=".doc,.docx,.pdf,image/*" class="form-control"
                            style="width: 400px; border: 1px solid #333;" required>
                        @error('upfile')
                            <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                        <div class="btn-xacnhan">
                            <button class="text-xacnhan js-buy-ticket" type="submit">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal js-modal ">
        <div class="modal-container js-modal-container"> --}}
    {{-- <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div> --}}

    {{-- <div class="Update-successful">
                <span class="icon-successfull">
                    <img src="{{ asset('css/Img/image 36.png') }}" alt="">
                </span>
                <div class="text-dmk">
                    <span>Thêm thành công</span>
                </div>
                <form action="{{ route('khenthuong.index') }}">
                    <div class="footer-Update-successful">
                        <button class="confirm"> Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script>
        // var maNv = $("#ma_nhanvien").attr('src');
        $("#ma_nhanvien").blur(function(e) {
            console.log($("#ma_nhanvien").val())
            $.ajax({
                url: '/ajax_tennv',
                method: "POST",
                data: {
                    'dataId': $("input[name='manv']").val()
                },
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                success: function(data) {
                    console.log(data.msg)
                    $('#err_ajax').text('')
                    if (data.check == true) {
                        $('#ten_nhanvien').val('Tên nhân viên không tồn tại.')
                        $('#err_ajax').text(data.msg)
                    } else
                        $("#ten_nhanvien").val(data.msg)
                }
            })
        });

        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');

        function showBuyTickets() {
            modal.classList.add('open')
        }

        function hideBuyTickets() {
            modal.classList.remove('open')
        }
        for (const buyBtn of buyBtns) {
            buyBtn.addEventListener('click', showBuyTickets)
        }
        modalClose.addEventListener('click', hideBuyTickets)
        modal.addEventListener('click', hideBuyTickets)

        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })
    </script>
@endsection
