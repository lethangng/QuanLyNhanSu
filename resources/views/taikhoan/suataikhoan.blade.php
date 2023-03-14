@extends('layouts.app')
@section('content')
<div class="stk-main">
    <div class="wrap">
        <div class="stk-title">
            <h1>Sửa tài khoản</h1>
        </div>
        <div class="container">
            <div class="row">
                <form id='FormSubmit' action="" method="POST" >
                    @csrf
                    <div class="col-sm left-inf">
                        <div class="label-name-tmpb">
                            <label for="">Mã nhân viên:</label>
                        </div>
                        <input readonly class="inp-tmcv" type="text" name="id" value="{{ $data->id }}"   placeholder="Nhập mã nhân viên">
                        <div class="label-name-tmpb">
                            <label for="">Tên nhân viên:</label>
                        </div>
                        <input readonly class="inp-tmcv" type="text" name="email"  value="{{ $data->nhanvien->tennv }}" placeholder="Nhập tên nhân viên">
                        <div class="label-name-tmpb">
                            <label for="">Email:</label>
                        </div>
                        <input class="inp-tmcv" type="email" name="email"  value="{{ $data->email }}" placeholder="Nhập email">
                        <small class="text-danger error-text email_err"></small>
                        <div class="label-name-tmpb">
                            <label for="">Mật khẩu:</label>
                        </div>
                        <div class="container-pw">
                            <input class="pw" type="password" name='password' value="" placeholder="Nhập Mật Khẩu" required>
                            <span class="show-btn"><i class="fas fa-eye"></i></span>
                        </div>
                        <small class="text-danger error-text password_err"></small>
                    </div>
                    
                    <div class="btn-tmpb">
                        <button type="submit" class="text-xacnhan js-buy-ticket">Xác nhận</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
{{-- JS Hiển thị password --}}
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
                <h2>Sửa thành công</h2>
            </div>
        </div>
    </div>
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

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script>
        const buyBtns = document.querySelectorAll('.js-buy-ticket');
        const modal = document.querySelector('.js-modal');
        const modalContainer = document.querySelector('.js-modal-container')
        const modalClose = document.querySelector('.js-modal-close');

        $("#FormSubmit").on('submit', function(e) {
            console.log(1)
            e.preventDefault();
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
                    modal.classList.add('open')
                    var error = document.querySelectorAll(".error-text");
                    for (var i = 0; i < error.length; i++) {
                        error[i].innerHTML = "";
                    }
                    if (data.error_check == true) {
                        for (const buyBtn of buyBtns){
                            buyBtn.addEventListener('click', showBuyTickets)
                        }
                        setTimeout(function() { 
                            window.location.href = data.url;
                        }, 1000);
                    }  else {
                        console.log(data.msg)
                        printErrorMsg(data.error, '_err');
                    }
                }
            });
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

        

        modalClose.addEventListener('click', hideBuyTickets)

        modal.addEventListener('click', hideBuyTickets)
        
        modalContainer.addEventListener('click', function(event)
        {
            event.stopPropagation()
        })
    </script>
</div>
@endsection