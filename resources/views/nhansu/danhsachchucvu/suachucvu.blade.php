@extends('layouts.app')
@section('content')
<div class="tmcv-main">
    <div class="wrap">
        <div class="tmcv-title">
            <h1>Sửa chức vụ</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm left-inf">
                        <div class="label-name">
                            <label for="">Mã chức vụ:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="" id="" placeholder="Nhập mã chức vụ">
                        <div class="label-name">
                            <label for="">Tên chức vụ:</label>
                        </div>
                        <input class="inp-tmcv" type="text" name="" id="" placeholder="Nhập tên chức vụ">
                </div>

                <div class="btn-tmcv">
                    <button class="text-xacnhan-tmcv js-buy-ticket">Xác nhận</button>
                </div>
            </div>
            
        </div>
    </div>
</div>
{{-- modal them chuc vu moi --}}
    <div class="modal-tmcv js-modal ">
        <div class="modal-container-tmcv js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

            <div class="Update-successful-tmcv">
                <span class="icon-successfull-tmcv">
                    <img src="{{ asset('css/Img/image 36.png') }}" alt="">
                </span>
                <div class="text-tmcv">
                    <span>Sửa thành công</span>
                </div>
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