@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="tmnv-main">
        <div class="wrap">
            <div class="tmnv-title">
                <h1>Cập nhật kỷ luật</h1>
            </div>
            <div class="container">
                <div class="row">
                    <form action="{{ route('kyluat.update', ['id' => $kyluat->id]) }}" method="post"
                        enctype="multipart/form-data" class="col-sm left-inf" id="update-kyluat">
                        @method('PUT')
                        @csrf
                        <div class="mnv">
                            <label for="">Mã nhân viên</label>
                        </div>
                        <input class="ip-mnv" type="text" name="manv" id="ma_nhanvien"
                            placeholder="Nhập mã nhân viên..." pattern="[0-9]+" value="{{ $kyluat->manv }}" readonly>
                        <div id="err_ajax" class="form-text text-danger text-danger_manv"></div>
                        <div class="tnv">
                            <label for="">Tên nhân viên:</label>
                        </div>
                        <input class="ip-tnv" type="text" name="tennv" id="ten_nhanvien" readonly
                            value="{{ $kyluat->nhanvien->tennv }}">

                        <div class="ngkt">
                            <label for="">Ngày kỷ luật:</label>
                        </div>
                        <input class="ip-ngkt" type="date" name="ngaykyluat" id=""
                            value="{{ $kyluat->ngaykyluat }}">
                        <div id="passwordHelp" class="form-text text-danger ngaykyluat-err"></div>
                        <div class="ld">
                            <label for="">Lý do:</label>
                        </div>
                        <input class="ip-ld" type="text" name="lydo" id="" placeholder="Nhập lý do..."
                            value="{{ $kyluat->lydo }}">
                        <div id="passwordHelp" class="form-text text-danger lydo-err"></div>
                        <div class="ctkt">
                            <label for="">Chi tiết kỷ luật:</label>
                        </div>
                        <input type="file" name="upfile" accept=".doc,.docx,.pdf,image/*" class="form-control"
                            style="width: 400px; border: 1px solid #333;" id="upfile"
                            value="{{ $kyluat->chitietkyluat }}">
                        <div id="passwordHelp" class="form-text text-danger upfile-err"></div>
                        <div class="btn-xacnhan-tmkt">
                            <button class="text-xacnhan js-buy-ticket" type="submit">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>
            <div class="modal-text-delete-2">
                <span class="icon-successfull-delete-2">
                    <img src="{{ asset('css/Img/image 36.png') }}" alt="">
                </span>
                <h2>Cập nhật thành công</h2>
            </div>
        </div>
    </div>>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');

        function showBuyTickets() {
            modal.classList.add('open')
        }

        function hideBuyTickets() {
            modal.classList.remove('open')
            window.location = '{{ route('kyluat.index') }}'
        }

        // for (const buyBtn of buyBtns) {
        //     buyBtn.addEventListener('click', showBuyTickets)
        // }

        modalClose.addEventListener('click', hideBuyTickets)

        modal.addEventListener('click', hideBuyTickets)

        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })
    </script>
    <script>
        $("#ma_nhanvien").blur(function(e) {
            console.log($("#ma_nhanvien").val())
            $('#ten_nhanvien').val('')
            $.ajax({
                url: "{{ route('kyluat.findNameNv') }}",
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
                        // $('#ten_nhanvien').val('Tên nhân viên không tồn tại.')
                        $('#err_ajax').text(data.msg)
                    } else
                        $("#ten_nhanvien").val(data.msg)
                }
            })
        });
    </script>
    <script type="text/javascript">
        function showErr(msg, $err) {
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
            $('#update-kyluat').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'PUT',
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        var error = document.querySelectorAll(".text-danger");
                        for (var i = 0; i < error.length; i++) {
                            error[i].innerHTML = "";
                        }
                        if (data.check == true) {
                            console.log(data)
                            modal.classList.add('open')
                        } else {
                            console.log(data.error);
                            showErr(data.error, '-err')
                        }
                    }
                });
            });
        });
    </script>
@endsection
