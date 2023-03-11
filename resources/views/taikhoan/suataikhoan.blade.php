@extends('layouts.app')
@section('content')
<div class="stk-main">
    <div class="wrap">
        <div class="stk-title">
            <h1>Thêm mới tài khoản</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm left-inf">
                        <div class="label-name-tmpb">
                            <label for="">Mã nhân viên:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="" id="" placeholder="Nhập mã nhân viên">
                        <div class="label-name-tmpb">
                            <label for="">Tên nhân viên:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="" id="" placeholder="Nhập tên nhân viên">
                        <div class="label-name-tmpb">
                            <label for="">Email:</label>
                        </div>
                        <input class="inp-tmcv" type="email" name="" id="" placeholder="Nhập email">
                        <div class="label-name-tmpb">
                            <label for="">Mật khẩu:</label>
                        </div>
                        <div class="container-pw">
                            <input class="pw" type="password" placeholder="Nhập Mật Khẩu" required>
                            <span class="show-btn"><i class="fas fa-eye"></i></span>
                        </div>
                </div>

                <div class="btn-tmpb">
                    <button class="text-xacnhan js-buy-ticket">Xác nhận</button>
                </div>
            </div>
            
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
</div>
@endsection