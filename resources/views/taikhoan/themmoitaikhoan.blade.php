@extends('layouts.app')
@section('content')
<div class="tmtk-main">
    <div class="wrap">
        <div class="tmtk-title">
            <h1>Thêm mới tài khoản</h1>
        </div>
        <div class="container">
            <form id='update' action="" method='POST' >
                @csrf
            <div class="row">
                <div class="col-sm left-inf">
                        <div class="label-name-tmpb">
                            <label for="">Mã nhân viên:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="manv" id='ma_nhanvien'  placeholder="Nhập mã nhân viên">
                        <div id="err_ajax" class="form-text text-danger text-danger_manv manv-err"></div>
                        <div class="label-name-tmpb">
                            <label for="">Tên nhân viên:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="tennv"id='ten_nhanvien'   placeholder="Nhập tên nhân viên" readonly>
                        <div class="label-name-tmpb">
                            <label for="">Email:</label>
                        </div>
                        <input class="inp-tmcv" type="email" name="email" placeholder="Nhập email">
                        <div id="err_ajax" class="form-text text-danger text-danger_manv email-err"></div>
                        <div class="label-name-tmpb">
                            <label for="">Mật khẩu:</label>
                        </div>
                        <div class="container-pw">
                            <input class="pw" type="password" name="password" placeholder="Nhập Mật Khẩu" required>
                            <div id="err_ajax" class="form-text text-danger text-danger_manv password-err"></div>
                            <span class="show-btn"><i class="fas fa-eye"></i></span>
                        </div>
                </div>

                <div class="btn-tmpb">
                    <button type="submit" class="text-xacnhan js-buy-ticket">Xác nhận</button>
                </div>
            </div>  
                </form>
            
        </div>
    </div>
</div>
{{-- JS Hiển thị password --}}
<script>
    const passField = document.querySelector(".pw");
    const showBtn = document.querySelector("span i");
    showBtn.onclick = (()=>{
    if(passField.type === "password"){
      passField.type = "text";
      showBtn.classList.add("hide-btn");
    }else{
      passField.type = "password";
      showBtn.classList.remove("hide-btn");
    }
  });
</script>
{{-- modal them chuc vu moi --}}
    <div class="modal-delete js-modal ">
        <div class="modal-container-delete js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>
    
            <div class="modal-text-delete-2">
                <span class="icon-successfull-delete-2">
                    <img src="{{ asset('css/Img/image 36.png') }}" alt="">
                </span>
                <h2>Thêm thành công</h2>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');

        $("#update").on('submit', function(e) {
            console.log(1)
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                processData: false,
                success: function(data) {
                    var error = document.querySelectorAll(".error-text");
                    for (var i = 0; i < error.length; i++) {
                        error[i].innerHTML = "";
                    }
                    if (data.errCheck == true) {
                        for (const buyBtn of buyBtns){
                            buyBtn.addEventListener('click', showBuyTickets)
                        }
                        setTimeout(function() { 
                            window.location.href = data.url;
                        }, 1000);
                    } else if(data.errCheck == false){
                        $('.email-err').text(data.msg)
                    }
                    else {
                        printErrorMsg(data.error, '-err');
                    }
                }
            });
        });


        $("#ma_nhanvien").blur(function(e) {
            $.ajax({
                url: '/danhsachtaikhoan/timten',
                method: "POST",
                data: {
                    'data': $("input[name='manv']").val()
                },
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                success: function(data) {
                    $('#err_ajax').text('')
                    if (data.check == true) {
                        $('#err_ajax').text(data.msg)
                    } else
                        $("#ten_nhanvien").val(data.msg)
                }
            })
        });

        function printErrorMsg(msg, $err) {
            $.each(msg, function(key, value) {
                $('.' + key + $err).text(value);
            });
        }

        function showBuyTickets(){
            modal.classList.add('open')
        }

        function hideBuyTickets(){
            modal.classList.remove('open')
        }

        // for (const buyBtn of buyBtns){
        //     buyBtn.addEventListener('click', showBuyTickets)
        // }

        modalClose.addEventListener('click', hideBuyTickets)

        modal.addEventListener('click', hideBuyTickets)
        
        modalContainer.addEventListener('click', function(event)
        {
            event.stopPropagation()
        })
    </script>
</div>
@endsection